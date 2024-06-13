<?php

namespace app\models\validacao;

use app\core\Validacao;
use app\models\service\Service;

class ItemCotacaoValidacao {
    public static function salvar($item_cotacao){
        $validacao = new Validacao();

        $validacao->setData("item_cotacao", $item_cotacao->item_cotacao);

        //fazendo a validação
        $validacao->getData("item_cotacao")->isVazio();

        return $validacao;
    }
}