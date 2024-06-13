<?php
namespace app\models\service;

use app\util\UtilService;
use app\models\validacao\UnidadeValidacao;

class UnidadeService {
    public static function salvar($unidade, $campo, $tabela){
        $validacao = UnidadeValidacao::salvar($unidade);
        return Service::salvar($unidade, $campo, $validacao->listaErros(),$tabela);
    }
}