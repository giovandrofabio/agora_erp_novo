<?php

namespace app\models\validacao;

use app\core\Validacao;
use app\models\service\Service;

class CategoriaValidacao {
    public static function salvar($categoria){
        $validacao = new Validacao();

        $validacao->setData("categoria", $categoria->categoria);

        //fazendo a validação
        $validacao->getData("categoria")->isVazio();

        return $validacao;
    }
}