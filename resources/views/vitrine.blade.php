@extends('layout.app', ["current" => "vitrine"])

@section('body')

<div class="bg-image" style="padding-bottom:15px; padding-top:15px;">
    <div class="container" style="background-color:#ffffff; max-width:1320px;">
        <div class="row" style="box-shadow:0 2px 2px rgba(0,0,0,0.5); padding-bottom:50px;">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2 class="fonte-site" >
                        CATEGORIAS
                    </h2>
                    <button type="button" class="collapsible fonte-site">Tamanho</button>
                    <div class="content">
                        <div style="margin-top:10px;">
                        @foreach($tamanhos as $tamanho)
                            <label class="label-tamanhos" title="{{$tamanho->nome}}">
                                <input type="checkbox" class="check-tamanhos" name="{{$tamanho->nome}}" value="{{$tamanho->Nome}}">{{$tamanho->nome}}
                            </label>
                        @endforeach
                        </div>
                    </div>
                    <button type="button" class="collapsible fonte-site">Gênero</button>
                    <div class="content fonte-site">
                        <div style="margin-top:10px;">
                            <label class="container-chekbox">Masculino
                                <input type="checkbox" id="chkMasculino" name="chkMasculino">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container-chekbox">Feminino
                                <input type="checkbox" id="chkFeminino" name="chkFeminino">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container-chekbox">Unissex
                                <input type="checkbox" id="chkUnissex" name="chkUnissex">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <button type="button" class="collapsible fonte-site">Faixa de Preço</button>
                    <div class="content fonte-site">
                        <div style="margin-top:10px;">
                            <label class="container-chekbox">até 29,99
                                <input type="checkbox" id="chkPreco1" name="chkPreco1">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container-chekbox">de 30,00 a 59,99
                                <input type="checkbox" id="chkPreco2" name="chkPreco2">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container-chekbox">de 60,00 a 99,99
                                <input type="checkbox" id="chkPreco3" name="chkPreco3">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container-chekbox">acima de 100,00
                                <input type="checkbox" id="chkPreco4" name="chkPreco4">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <button type="button" class="collapsible fonte-site">Tipo do Produto</button>
                    <div class="content fonte-site">
                        <div style="margin-top:10px;"> 
                        @foreach($tipos as $tipo)
                            <label class="container-chekbox">{{$tipo->nome}}
                                <input type="checkbox" id="chk{{$tipo->nome}}" name="chk{{$tipo->nome}}">
                                <span class="checkmark"></span>
                            </label>
                        @endforeach
                        </div>
                    </div>
                    <button type="button" class="collapsible fonte-site">Novidade</button>
                    <div class="content fonte-site">
                        <div style="margin-top:10px;">    
                            <label class="container-chekbox">Novidade
                                <input type="checkbox" id="chkNovidade" name="chkNovidade">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 prateleira">
            
            <div class="row">
                <div class="center">
                    {{ $prods->links() }}
                </div>
            </div>

            @foreach($prods as $prod)    
                <ul>
                    <li>
                        <div class="imagem-produto">
                            <figure>
                                <a href="" class="imagem-produto-link">
                                    <img src="../images/storage/upload_produtos/{{$prod->imagem}}">
                                </a>
                            </figure>
                        </div>
                        <div class="detalhes-produto fonte-site">
                            <a href="" class="detalhes-produto-nome">
                                <strong>{{$prod->nome}}</strong>
                            </a>
                            <div class="preco-detalhes-produto">
                                <a href="">
                                    <span>Valor: {{$prod->preco}}</span>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            @endforeach
            </div>
        </div>
    </div>
</div>

@endsection