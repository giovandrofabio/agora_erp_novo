$(function(){
    $("#btnInserir").on("click", function(){
        var id_produto      = $("#id_produto").val();
        var id_localizacao  = $("#id_localizacao").val();
        var qtde            = $("#qtde").val();
        var preco           = $("#preco").val();


        $.ajax({
            url: base_url + "saida/inserir",
            type: "POST",
            dataType: "json",
            data:{
                id_produto: id_produto,
                id_localizacao: id_localizacao,
                qtde: qtde,
                preco: preco
            },
            success: function (data){
                lista_saidas(data.lista);
            }
        });
    }) ;
 
   $("#produto").on("keyup", function(){
       var q  = $(this).val();
       if(q ==""){
          $(".listaProdutos").hide();
          return;  
       }
       $.ajax({
           url: base_url + "produto/buscar/" + q,
           type: "GET",
           dataType: "json",
           data:{},
           success: function (data){
              $("#produto").after('<div class="listaProdutos"></div>');
              html = "";
                 for (i = 0; i < data.length; i++) {		  
                    html +='<div class="si"><a href="javascript:;" onclick="selecionarProduto(this)"'
                    + 'data-id="' + data[i].id_produto +
                    '" data-preco="' + data[i].preco + 
                    '" data-nome="' + data[i].produto +'">' +
                    data[i].produto + " - R$ " + data[i].preco + '</a></div>';
                 }
                 $(".listaProdutos").html(html);
                 $(".listaProdutos").show();
           }
       });
   }) ;
});

function selecionarProduto(obj){
    var id   = $(obj).attr("data-id");
    var nome = $(obj).attr("data-nome");
    var preco= $(obj).attr("data-preco");

    $(".listaProdutos").hide();
    $("#produto").val(nome);
    $("#preco").val(preco);
    $("#qtde").val(1);
    $("#qtde").focus();
    $("#id_produto").val(id);

    listarLocalizacao(id);
}

function listarLocalizacao(id){
    $.ajax({
        url: base_url + "produtolocalizacao/listaPorProduto/" + id,
        type: "GET",
        dataType: "json",
        data:{},
        success: function (data){
            html = "";
            for (i = 0; i < data.length; i++) {
                html +="<option value='"+ data[i].id_localizacao +"'>" + data[i].localizacao + "</option>";
            }
            $("#id_localizacao").html(html);
        }
    });
} 

function lista_saidas(data){    
    html = "<tr>";
    var total_saida = 0.00;
    for(var i in data){ 
        total_saida += parseFloat(data[i].subtotal_saida);
        var j = parseInt(i)+1;
        html += '<td align="left">' + data[i].id_saida  + '</td>' + 	
            '<td align="left">' + data[i].data_saida + '</td>' + 
            '<td align="left">' + data[i].produto + '</td>' + 
            '<td align="left">' + data[i].qtde_saida + '</td>' + 
            '<td align="left">' + data[i].valor_saida + '</td>' + 
            '<td align="left">' + data[i].subtotal_saida + '</td></tr>';
     }
     
     html += '<tr><td align="right" colspan="6" ><b>Total:</b> R$ '+ total_saida + '</span></td> </tr>'
     $("#lista_saidas").html(html);
    
}