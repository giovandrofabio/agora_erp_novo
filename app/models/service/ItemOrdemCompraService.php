<?php

namespace app\models\service;

use app\models\dao\ItemOrdeCompraDao;
use app\models\validacao\ItemOrdemCompraValidacao;

class ItemOrdemCompraService
{
    public static function salvar($item_ordem_compra, $campo, $tabela)
    {
        $validacao = ItemOrdemCompraValidacao::salvar($item_ordem_compra);
        return Service::salvar($item_ordem_compra, $campo, $validacao->listaErros(), $tabela);
    }

    public static function listaItensOrdemCompra($id_ordem_compra)
    {
        $dao = new ItemOrdeCompraDao();
        return $dao->listaItensOrdemCompra($id_ordem_compra);
    }
}