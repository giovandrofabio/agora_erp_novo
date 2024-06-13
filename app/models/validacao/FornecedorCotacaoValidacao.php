<?php

namespace app\models\validacao;

use app\core\Validacao;
use app\models\service\FornecedorCotacaoService;
use app\models\service\Service;

class FornecedorCotacaoValidacao {
    public static function salvar($fornecedor_cotacao){

        $validacao = new Validacao();

        $validacao->setData("id_fornecedor", $fornecedor_cotacao->id_fornecedor);
        $validacao->setData("id_cotacao", $fornecedor_cotacao->id_cotacao);

        //fazendo a validação
        $validacao->getData("id_fornecedor")->isVazio();
        $validacao->getData("id_cotacao")->isVazio();

        $fornecedor = FornecedorCotacaoService::getFornecedorCotacao($fornecedor_cotacao->id_cotacao,$fornecedor_cotacao->id_fornecedor);
        if($fornecedor){
            $validacao->getData("id_fornecedor")->isUnico(1,"Este fornecedor já está nesta cotação");
        }

        return $validacao;
    }
}