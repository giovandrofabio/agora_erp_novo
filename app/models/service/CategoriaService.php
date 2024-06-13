<?php
namespace app\models\service;

use app\util\UtilService;
use app\models\validacao\CategoriaValidacao;

class categoriaService {
    public static function salvar($categoria, $campo, $tabela){
        $validacao = CategoriaValidacao::salvar($categoria);
        return Service::salvar($categoria, $campo, $validacao->listaErros(),$tabela);
    }
}