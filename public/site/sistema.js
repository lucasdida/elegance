$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

$(document).ready(function() {
    $('#precoProduto').mask('#.##0,00', {reverse: true});
});


$('#btn-novo').on('click', function() {
    $('#erro_nomeProduto').html('');
    $('#erro_precoProduto').html('');
    $('#erro_descricaoProduto').html('');
    $('#nomeProduto').removeClass('is-invalid');
    $('#precoProduto').removeClass('is-invalid');
    $('#descricaoProduto').removeClass('is-invalid');
    
    $('#nomeProduto').val('');
    $('#precoProduto').val('');
    $('#descricaoProduto').val('');
    $('#generoProduto').val(1).change();
    $('#tamanhoProduto').val(1).change();
    $('#tipoProduto').val(1).change();
    $('#novidadeProduto').prop('checked', false);
    $('#selecionarImagem').html('Selecionar Imagem...')
    $('#my-file').attr('required', true);
    $('#titulo-cadastro').html('Novo Produto');

    $('#modal-cadastro').modal('show');
    $('#boxImagemAtual').hide();
});

$('#btn-remover').on('click', function() {
    
    var id = $('#idRemoverProduto').val();

    $.ajax
    ({ 
        url: '/sistema/produto/remover/'+id,
        type: 'POST',
        success: function(data) {
            $('#modal-remover-produto').modal('hide');
            $('#modal-confirmar-remocao').modal('show');
            setTimeout(function(){
                location.reload();
              },1000);
        },
        error: function (erro) {
            alert('Falha na remoção do produto, tente novamente mais tarde');
        }
    });

      
});

function remover(id) {
    $('#idRemoverProduto').val(id);
    $('#modal-remover-produto').modal('show');
}

function editar(id) {
    $.getJSON('/sistema/produto/editar/' + id, function(data) {
        console.log(data);
        $('#erro_nomeProduto').html('');
        $('#erro_precoProduto').html('');
        $('#erro_descricaoProduto').html('');
        $('#nomeProduto').removeClass('is-invalid');
        $('#precoProduto').removeClass('is-invalid');
        $('#descricaoProduto').removeClass('is-invalid');
        $('#my-file').attr('required', false);
        $('#titulo-cadastro').html('Alterar Produto');

        $('#idProduto').val(data.id);
        $('#nomeProduto').val(data.nome);
        $('#precoProduto').val(data.preco);
        $('#descricaoProduto').val(data.descricao);
        if (data.novidade == 1)
            $('#novidadeProduto').prop('checked', true);
        else
            $('#novidadeProduto').prop('checked', false);
        $('#modal-cadastro').modal('show');
        $('#generoProduto').val(data.genero).change();
        $('#tamanhoProduto').val(data.tamanho_id).change();
        $('#tipoProduto').val(data.tipo_id).change();
        $('#imagemAtual').html('<img id="imagemProdutoAtual" style="width:420px" src="../images/storage/upload_produtos/' + data.imagem + '"/>');
        $('#selecionarImagem').html('Alterar Imagem...')
        $('#boxImagemAtual').show();
    });
}

var req;

function validarDados(campo, valor) {

    valor = $('#'+campo).val();
    if (valor == '') { 
        valor = null;

        $.getJSON('/sistema/produto/validar/' + campo + "&" + valor, function(mensagem) {
            $('#erro_'+campo).html(mensagem);
            $('#'+campo).addClass('is-invalid');
            
        });
    } else {
        $('#erro_'+campo).html('');
        $('#'+campo).removeClass('is-invalid');
    }

}

/* ---------- INPUT FILE ---------- */
document.querySelector("html").classList.add('js');

var fileInput  = document.querySelector( ".input-file" ),  
    button     = document.querySelector( ".input-file-trigger" ),
    the_return = document.querySelector(".file-return");
      
button.addEventListener( "keydown", function( event ) {  
    if ( event.keyCode == 13 || event.keyCode == 32 ) {  
        fileInput.focus();  
    }  
});
button.addEventListener( "click", function( event ) {
   fileInput.focus();
   return false;
});  
fileInput.addEventListener( "change", function( event ) {  
    the_return.innerHTML = this.value;  
});  

