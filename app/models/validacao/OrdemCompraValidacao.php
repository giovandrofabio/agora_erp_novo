<?php

namespace app\models\validacao;

use app\core\Validacao;
use app\models\service\Service;

class OrdemCompraValidacao {
    public static function salvar($ordem_compra){
        $validacao = new Validacao();

        $validacao->setData("id_fornecedor", $ordem_compra->id_fornecedor);

        //fazendo a validação
        $validacao->getData("id_fornecedor")->isVazio();

        return $validacao;
    }
}