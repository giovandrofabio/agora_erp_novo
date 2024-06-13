<?php
namespace app\models\service;

use app\util\UtilService;
use app\models\validacao\ContatoValidacao;

class ContatoService {
    public static function salvar($contato, $campo, $tabela){
        $validacao = ContatoValidacao::salvar($contato);
        return Service::salvar($contato, $campo, $validacao->listaErros(),$tabela);
    }
}