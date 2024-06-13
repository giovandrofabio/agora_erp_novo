$(function(){
    $("#btnInserir").on("click", function(){
        var id_produto      = $("#id_produto").val();
        var id_origem       = $("#id_origem").val();
        var id_destino      = $("#id_destino").val();
        var qtde            = $("#qtde").val();

        $.ajax({
            url: base_url + "transferencia/inserir",
            type: "POST",
            dataType: "json",
            data:{
                id_produto : id_produto,
                id_origem  : id_origem,
                id_destino : id_destino,
                qtde       : qtde
            },
            success: function (data){
                if(data.erro > 0){
                    alert(data.msg[0]);
                }
                lista_transferencias(data.lista);
                // console.log(data);
                // if(data.erro=="-1"){
                //     alert(data.msg.msg);    
                // } else {
                //     var txt ="";
                //     var i;
                //     for(i=0; i<data.msg.length; i++){
                //        txt += data.msg[i] + "\n"; 
                //     }
                //     alert(txt);  
                // }
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
            $("#id_origem").html(html);
            $("#id_destino").html(html);
        }
    });
} 

function lista_transferencias(data){    
    html = "<tr>";
    var total_transferencia = 0.00;
    for(var i in data){ 
        total_transferencia += parseFloat(data[i].subtotal_transferencia);
        var j = parseInt(i)+1;
        html += '<td align="left">' + data[i].id_transferencia  + '</td>' + 	
            '<td align="left">' + data[i].data_transferencia + '</td>' + 
            '<td align="left">' + data[i].produto + '</td>' +
            '<td align="left">' + data[i].origem + '</td>' +
            '<td align="left">' + data[i].destino + '</td>' +
            '<td align="left">' + data[i].qtde_transferencia + '</td></tr>';
     }
     $("#lista_transferencias").html(html);
    
}