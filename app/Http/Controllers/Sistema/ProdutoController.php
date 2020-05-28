<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Produto;
use App\Tamanho;
use App\Tipo;
use Intervention\Image\Image;

class ProdutoController extends Controller
{

    public function index()
    {
        $prods = Produto::where('ativo', 1)->paginate(7);
        $tamanhos = Tamanho::all();
        $tipos = Tipo::all();

        foreach ($prods as $prod) {
            //formatar em real
            $prod->preco = number_format($prod->preco, 2, ',', '.');
            $prod->preco = 'R$ '.$prod->preco;

            //Trocar ID por Nome do Tamanho
            foreach ($tamanhos as $tamanho)
                if ($prod->tamanho_id == $tamanho->id)
                    $prod->tamanho_id = $tamanho->nome;
            
            //Trocar ID por Nome do Tipo
            foreach ($tipos as $tipo)
                if ($prod->tipo_id == $tipo->id)
                    $prod->tipo_id = $tipo->nome;
        }

        return view('sistema/produto', compact('prods', 'tamanhos', 'tipos'));
    }

    public function store(Request $request)
    {
        //Verificar se produto é novidade
        $novidade = ($request->input('novidadeProduto') == "on") ? 1 : 0;

        //Adicionar imagem do produto
        if ($_FILES['imagemProduto']['name'] != '') {
            //adicionando imagem na pasta storage/upload_produtos e criando novo nome
            if(isset($_FILES['imagemProduto'])) {
                $ext = strtolower(substr($_FILES['imagemProduto']['name'], -4));
                $novo_nome_imagem = date("Y.m.d-H.i.s") . $ext;
                
                if ($novidade == 1) {

                    $dir = "./images/storage/upload_produtos/novidades/";

                    //Redimencionamento de imagem para ficar compativel com o carrossel na index
                    $imagem = $_FILES['imagemProduto']['tmp_name'];
                    $width = 200;
                    $height = 200;

                    list($width_orig, $height_orig) = getimagesize($imagem);

                    // Calculando a proporção
                    $ratio_orig = $width_orig/$height_orig;

                    if ($width/$height > $ratio_orig) {
                        $width = $height*$ratio_orig;
                    } else {
                        $height = $width/$ratio_orig;
                    }

                    // O resize propriamente dito. Na verdade, estamos gerando uma nova imagem.
                    $image_p = imagecreatetruecolor($width, $height);
                    imagesavealpha($image_p, true);
                    $cor_fundo = imagecolorallocatealpha($image_p, 0, 0, 0, 127);
                    imagefill($image_p, 0, 0, $cor_fundo);

                    switch ($ext) {
                        case '.jpg': 
                            $image = imagecreatefromjpeg($imagem);
                            imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                            imagejpeg($image_p, $dir.$novo_nome_imagem, 75); 
                        break;
                        
                        case '.png':
                            $image = imagecreatefrompng($imagem);
                            imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                            imagepng($image_p, $dir.$novo_nome_imagem, 0); 
                        break;

                        case '.gif':
                            $image = imagecreatefromgif($imagem);
                            imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                            imagegif($image_p, $dir.$novo_nome_imagem, 75); 
                        break;
                    }
                }

                //Salva imagem sem modificar o tamanho
                $dir = "./images/storage/upload_produtos/";
                move_uploaded_file($_FILES['imagemProduto']['tmp_name'], $dir.$novo_nome_imagem);

            }
        } else {
            $novo_nome_imagem = '';
        }
        

        //preparando valor para inserção no banco de dados
        $precoProduto = $request->input('precoProduto');
        $precoProduto = str_replace('.', '', $precoProduto);
        $precoProduto = str_replace(',', '.', $precoProduto);
        
        //verifica se é um novo produto ou se é uma alteração de produto ja existente
        if($request->input('idProduto') != '') {
            $this->update($request, $request->input('idProduto'), $precoProduto, $novo_nome_imagem);
        } else {
            $prod = new Produto();

            $prod->nome = $request->input('nomeProduto');
            $prod->preco = $precoProduto;
            $prod->descricao = $request->input('descricaoProduto');
            $prod->novidade = ($request->input('novidadeProduto') == "on") ? 1 : 0;
            $prod->genero = $request->get('generoProduto');
            $prod->tamanho_id = $request->get('tamanhoProduto');
            $prod->tipo_id = $request->get('tipoProduto');
            $prod->imagem = $novo_nome_imagem;
            $prod->ativo = 1;
    
            $prod->save();
        }

        return redirect('/sistema/produto');
    
    }

    public function edit($id)
    {
        $prod = Produto::find($id);

        $prod->preco = str_replace('.', ',', $prod->preco);

        if (isset($prod))
            return json_encode($prod);

        return response('Produto não encontrado', 404);
    }

    public function update(Request $request, $id, $precoProduto, $novo_nome_imagem)
    {
        $prod = Produto::find($id);

        if(isset($prod)) {
            $prod->nome = $request->input('nomeProduto');
            $prod->preco = $precoProduto;
            $prod->descricao = $request->input('descricaoProduto');
            $prod->novidade = ($request->input('novidadeProduto') == "on") ? 1 : 0;
            $prod->genero = $request->get('generoProduto');
            $prod->tamanho_id = $request->get('tamanhoProduto');
            $prod->tipo_id = $request->get('tipoProduto');
            $prod->ativo = 1;
            if($_FILES['imagemProduto']['name'] != '')
                $prod->imagem = $novo_nome_imagem;

            $prod->save();

        }
    }


    public function remove($id)
    {
        $prod = Produto::find($id);

        if(isset($prod)) {
            $prod->ativo = 0;
            $prod->save();
        }
    
        //return redirect('/sistema/produto');
    }

    public function validacao($campo, $valor) 
    {
        
        switch($campo) {
            case 'nomeProduto':
                if($valor == 'null') {
                    $mensagem = "O campo Nome do Produto deve ser preenchido";
                    return json_encode($mensagem);
                }

                break;
            case 'precoProduto':
                if($valor == 'null') {
                    $mensagem = "O campo Preço do Produto deve ser preenchido";
                    return json_encode($mensagem);
                }

                break;
            case 'descricaoProduto':
                if($valor == 'null') {
                    $mensagem = "O campo Descrição do Produto deve ser preenchido";
                    return json_encode($mensagem);
                }

                break;
        }
        
        
        
        if($campo == 'nomeProduto') {
            if($valor == 'null') {
                $mensagem = "O campo nomeProduto deve ser preenchido";
                return json_encode($mensagem);
            }
        }


    }
}
