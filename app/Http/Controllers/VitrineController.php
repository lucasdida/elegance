<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tamanho;
use App\Tipo;
use App\Produto;

class VitrineController extends Controller
{
    public function index() 
    {
        $prods = Produto::where('ativo', 1)->paginate(9);
        $tamanhos = Tamanho::all();
        $tipos = Tipo::all();

        foreach ($prods as $prod) {
            //formatar em real
            $prod->preco = number_format($prod->preco, 2, ',', '.');
            $prod->preco = 'R$ '.$prod->preco;
        }

        return view('vitrine', compact('tamanhos', 'tipos', 'prods'));
    }  
}
