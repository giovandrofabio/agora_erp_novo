$(function () {
    $("#btnInserir").on("click", function () {
        var id_produto = $("#id_produto").val();
        var id_ordem_compra = $("#id_ordem_compra").val();
        var qtde = $("#qtde").val();
        var preco = $("#preco").val();
        $.ajax({
            url: base_url + "itemordemcompra/inserir",
            type: "POST",
            dataType: "json",
            data: {
                id_produto: id_produto,
                id_ordem_compra: id_ordem_compra,
                qtde: qtde,
                preco: preco
            },
            success: function (data) {
                lista_ordem_compras(data.lista);
                limpar();
            }
        });
    });

    $("#produto").on("keyup", function () {
        var q = $(this).val();
        if (q === "") {
            $(".listaProdutos").hide();
            return;
        }
        $.ajax({
            url: base_url + "produto/buscar/" + q + "/insumo",
            type: "GET",
            dataType: "json",
            data: {},
            success: function (data) {
                $("#produto").after('<div class="listaProdutos"></div>');
                var html = "";
                for (i = 0; i < data.length; i++) {
                    html += '<div class="si"><a href="javascript:;" onclick="selecionarProduto(this)"'
                        + ' data-id="' + data[i].id_produto +
                        '" data-preco="' + data[i].preco +
                        '" data-nome="' + data[i].produto + '">' +
                        data[i].produto + " - R$ " + data[i].preco + '</a></div>';
                }
                $(".listaProdutos").html(html);
                $(".listaProdutos").show();
            }
        });
    });
});

function selecionarProduto(obj) {
    var id = $(obj).attr("data-id");
    var nome = $(obj).attr("data-nome");
    var preco = $(obj).attr("data-preco");
    $(".listaProdutos").hide();
    $("#produto").val(nome);
    $("#preco").val(preco);
    $("#qtde").val(1);
    $("#qtde").focus();
    $("#id_produto").val(id);

    listarLocalizacao(id);
}

function listarLocalizacao(id) {
    $.ajax({
        url: base_url + "produtolocalizacao/listaPorProduto/" + id,
        type: "GET",
        dataType: "json",
        data: {},
        success: function (data) {
            var html = "";
            for (i = 0; i < data.length; i++) {
                html += "<option value='" + data[i].id_localizacao + "'>" + data[i].localizacao + "</option>";
            }
            $("#id_localizacao").html(html);
        }
    });
}

function lista_ordem_compras(data) {
    var html = "<tr>";
    var total_ordem_compra = 0.00;
    for (var i in data) {
        total_ordem_compra += parseFloat(data[i].subtotal);
        var j = parseInt(i) + 1;
        html += '<td align="left">' + data[i].id_item_ordem_compra + '</td>' +
            '<td align="left">' + data[i].produto + '</td>' +
            '<td align="left">' + data[i].qtde + '</td>' +
            '<td align="left">' + data[i].valor + '</td>' +
            '<td align="left">' + data[i].subtotal + '</td>' +
            '<td align="center"><a href="javascript:;" onclick="return excluir_item_ordem_compra(this)" data-entidade="itemordemcompra" data-id="' + data[i].id_item_ordem_compra + '" class="d-inline-block btn btn-outline-vermelho btn-pequeno"><i class="fas fa-trash-alt"></i></a></td>' +
            '</tr>';
    }

    html += '<tr><td align="right" colspan="6"><b>Total:</b> R$ ' + total_ordem_compra + '</span></td></tr>'
    $("#lista_itens_ordem_compra").html(html);
    $("#total_ordem_compra").html(total_ordem_compra);
}

function excluir_item_ordem_compra(obj) {
    var entidade = $(obj).attr('data-entidade');
    var id = $(obj).attr('data-id');
    if (confirm('Deseja realmente excluir?')) {
        $.ajax({
            url: base_url + entidade + "/excluir/" + id + "/" + $("#id_ordem_compra").val(),
            type: "GET",
            dataType: "json",
            data: {},
            success: function (data) {
                lista_ordem_compras(data);
            }
        });
    }
}

function limpar() {
    $("#produto").val("");
    $("#preco").val("");
    $("#qtde").val(1);
    $("#produto").focus();
    $("#id_produto").val("");
}