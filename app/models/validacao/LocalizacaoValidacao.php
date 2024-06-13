<?php

namespace app\models\validacao;

use app\core\Validacao;
use app\models\service\Service;

class LocalizacaoValidacao {
    public static function salvar($localizacao){
        $validacao = new Validacao();

        $validacao->setData("localizacao", $localizacao->localizacao);

        //fazendo a validação
        $validacao->getData("localizacao")->isVazio();

        return $validacao;
    }
}