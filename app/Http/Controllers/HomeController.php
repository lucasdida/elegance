<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class HomeController extends Controller
{
    public function index()
    {
        $prods = Produto::all()->where('ativo', 1)->where('novidade', 1);

        foreach ($prods as $prod) {
            //formatar em real
            $prod->preco = number_format($prod->preco, 2, ',', '.');
            $prod->preco = 'R$ '.$prod->preco;
        }

        

        return view('index', compact('prods'));
    }
}



