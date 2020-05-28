@extends('layout.app', ["current" => "home"])

@section('body')

<main class="l-main">
        <div class="banner">
            <img src="images/fundos/elegancebranco.png" class="img-responsive" style="width:100%">
        </div>
</main>

<nav class="navbar navbar-config justify-content-center" style="box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;">
    <span class="navbar-brand mb-0 h1 navbar-text-config fonte-site" style="font-size:30px;">Novidades da Loja</span>
</nav>

<div class="container">
	<div class="row">
		<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
            <div class="MultiCarousel-inner">


                @foreach ($prods as $prod)

                <div class="item">
                    <div class="pad15">
                        <div class="ca-icon">
                            <img src="images/storage/upload_produtos/novidades/{{$prod->imagem}}">
                        </div>
                        <h3 class="fonte-carrossel">{{$prod->nome}}</h3>
                        <div class="box-valor">
                            <h4 class="fonte-carrossel">{{$prod->preco}}</h4>
                        </div>
                    </div>
                </div>

                @endforeach



                <!--@php

                    $i = 0;

                    while($i<=10) {
                    
                        echo '<div class="item">
                                <div class="pad15">
                                    <div class="ca-icon">
                                        <img src="images/roupas/vermelho.jpg">
                                    </div>
                                    <h3 class="fonte-carrossel">Vestido Vermelho</h3>
                                    <div class="box-valor">
                                        <h4 class="fonte-carrossel">R$ 2.000,00</h4>
                                    </div>
                               </div>
                            </div>';
                        
                        $i++;
                    
                    }

                @endphp

                -->
            </div>
            <button class="btn leftLst" style="background-color:#212121; color:white"><</button>
            <button class="btn rightLst" style="background-color:#212121; color:white">></button>
        </div>
	</div>
</div>


@endsection