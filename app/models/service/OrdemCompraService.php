<?php
namespace app\models\service;

use app\models\dao\OrdemCompraDao;
use app\models\validacao\CategoriaValidacao;

class OrdemCompraService {
    public static function salvar($ordem_compra, $campo, $tabela){
        $validacao = CategoriaValidacao::salvar($ordem_compra);
        return Service::salvar($ordem_compra, $campo, $validacao->listaErros(),$tabela);
    }

    public static function getOrdemCompra($id_ordem){
        $dao = new OrdemCompraDao();
        return $dao->getOrdemCompra($id_ordem);
    }

    public static function getOrdemCompraAberta(){
        $dao = new OrdemCompraDao();
        return $dao->getOrdemCompraAberta();
    }

    public static function lista(){
        $dao = new OrdemCompraDao();
        return $dao->lista();
    }

    public static function atualizaTotal($id_ordem_compra){
        $soma = Service::getSoma("item_ordem_compra", "subtotal","id_ordem_compra",$id_ordem_compra);
        Service::editar(["valor_total"=>$soma, "id_ordem_compra"=>$id_ordem_compra],"id_ordem_compra","ordem_compra");
    }
}