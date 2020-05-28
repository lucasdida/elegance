@extends('sistema/layouts.app')

@section('content')

<div class="bg-image" style="padding-bottom:5%; height:740px;">
    <div class="card border center" style="width:90%">
        <div class="card-body">
            <div class="form-row" style="padding-bottom:1%">
                <h5 class="card-title title-config fonte-site" style="font-size:40px; margin-left:10px">Produtos</h5>
                <button class="btn btn-sm btn-padrao btn-novo" style="position: absolute; right: 20px;" id="btn-novo">Novo Produto</button>
            </div>
    
            @if(count($prods) > 0)
            <table class="table table-striped table-hover fonte-site">
                <thead class="table-config">
                    <tr>
                        <th scope="col">Produto</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Tipo</th>
                        <th scope="col" style="text-align:center">Tamanho</th>
                        <th scope="col">Novidade</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prods as $prod)
                        <tr>
                            <td>{{$prod->nome}}</td>
                            <td>{{$prod->preco}}</td>
                            <td>{{$prod->tipo_id}}</td>
                            <td align=center>{{$prod->tamanho_id}}</td>
                            @if ($prod->novidade == 0)
                                <td></td>
                            @else
                                <td><img style="width:70px; padding-left:10px" src="../images/sistema/novidade.png"></td>
                            @endif
                            <td>
                                <span class="glyphicon glyphicon-pencil" onclick="editar({{$prod->id}})" aria-hidden="true"></span>
                                <span class="glyphicon glyphicon-remove" onclick="remover({{$prod->id}})" aria-hidden="true"></span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            @else 

            <table class="table table-striped table-hover fonte-site">
                <thead class="table-config" style="background-color:gray">
                    <tr>
                        <td align=center>Não há nenhum produto cadastrado ainda</td>
                    </tr>
                </thead>
            </table>
            
            @endif

            
            {{ $prods->links() }}
            
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-cadastro">
    <div class="modal-dialog" role="content">
        <div class="modal-content">

            <form class="form-horizontal" id="formProduto" action="/sistema/produto" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="titulo-cadastro">Novo Produto</h5>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="idProduto" name="idProduto" class="form-control">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nomeProduto" class="control-label">Nome do Produto</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="nomeProduto" id="nomeProduto" required="true" onblur="validarDados('nomeProduto', document.getElementById('nomeProduto').value);" placeholder="Nome do Produto">
                                <div class="invalid-feedback" id="erro_nomeProduto"></div>
                            </div>
                            
                        </div>
                        <div class="form-group col-md-6">
                            <label for="precoProduto" class="control-label">Preço do Produto</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="precoProduto" id="precoProduto" required="true" onblur="validarDados('precoProduto', document.getElementById('precoProduto').value);" placeholder="Preço do Produto">
                                <div class="invalid-feedback" id="erro_precoProduto"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">                    
                        <label for="descricaoProduto" class="control-label">Descrição do Produto</label>
                        <textarea class="form-control" name="descricaoProduto" id="descricaoProduto" required="true" onblur="validarDados('descricaoProduto', document.getElementById('descricaoProduto').value);" placeholder="Descrição do Produto" rows="3"></textarea>
                        <div class="invalid-feedback" id="erro_descricaoProduto"></div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <div class="funkyradio">
                                <div class="funkyradio-default">
                                    <input type="checkbox" name="novidadeProduto" id="novidadeProduto"/>
                                    <label for="novidadeProduto">Novidade</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label for="generoProduto">Gênero</label>
                                <select class="form-control" name="generoProduto" id="generoProduto">
                                    <option value="1">Feminino</option>
                                    <option value="2">Masculino</option>
                                    <option value="3">Unissex</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col=md-6">
                            <label for="tamanhoProduto">Tamanho</label>
                            <select class="form-control" name="tamanhoProduto" id="tamanhoProduto">
                                @foreach ($tamanhos as $tamanho)
                                <option value="{{$tamanho->id}}">{{$tamanho->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tipoProduto">Tipo do Produto</label>
                        <select class="form-control" name="tipoProduto" id="tipoProduto">
                            @foreach ($tipos as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->nome}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div id="boxImagemAtual">
                        <label for="imagemAtual">Imagem Atual</label>
                        <div class="card" style="margin-bottom:20px">
                            <div class="card-body">
                                <div id="imagemAtual"></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-file-container center">  
                            <input class="input-file" id="my-file" type="file" name="imagemProduto" required="true" accept="image/*">
                            <label tabindex="0" for="my-file" id="selecionarImagem" class="input-file-trigger">Selecionar Imagem...</label>
                        </div>
                        <p class="file-return"></p>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-padrao" id="btn-salvar-produto">Salvar</button>
                    <button type="cancel" class="btn btn-padrao" data-dismiss="modal">Cancelar</button>
                </div>
            
            </form>

        </div>
    </div>
</div>

@if(count($prods) > 0)
<div class="modal fade" tabindex="-1" role="dialog" id="modal-remover-produto">
    <div class="modal-dialog" role="content">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Remover Produto</h5>
            </div>

            <div class="modal-body">
                <input type="hidden" id="idRemoverProduto" name="idRemoverProduto" class="form-control">
            </div>
            <div class="form-group center" style="padding-bottom:20px">
                <label>Você deseja mesmo remover esse produto?</label>
            </div>
            <div class="form-group center" style="padding-bottom:20px">
                <div class="form-row">
                    <button class="btn btn-sm btn-padrao btn-novo" style="margin-right:90px" id="btn-remover">Remover</button>
                    <button type="cancel" class="btn btn-padrao" data-dismiss="modal">Cancelar</button>
                </div>
            </div>

        </div>
    </div>
</div>
@endif

<div class="modal fade" tabindex="-1" role="dialog" id="modal-confirmar-remocao">
    <div class="modal-dialog" role="content">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Produto removido com sucesso!</h5>
            </div>
        </div>
    </div>
</div>

@endsection