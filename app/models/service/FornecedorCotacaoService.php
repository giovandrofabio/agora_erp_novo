<?php

namespace app\models\service;

use app\core\Flash;
use app\models\dao\FornecedorCotacaoDao;
use app\models\validacao\FornecedorCotacaoValidacao;

class FornecedorCotacaoService
{
    public static function salvar($fornecedorcotacao, $campo, $tabela)
    {
        $validacao = FornecedorCotacaoValidacao::salvar($fornecedorcotacao);
        return Service::salvar($fornecedorcotacao, $campo, $validacao->listaErros(), $tabela);
    }

    public static function listaPorCotacao($id_cotacao){
        $dao = new FornecedorCotacaoDao();
        return $dao->listaPorCotacao($id_cotacao);
    }

    public static function getFornecedorCotacao($id_fornecedor_cotacao, $id_fornecedor){
        $dao = new FornecedorCotacaoDao();
        return $dao->getFornecedorCotacao($id_fornecedor_cotacao, $id_fornecedor);
    }

    public static function excluir($id_fornecedor_cotacao, $id_fornecedor){
        $id = Service::excluir("fornecedor_cotacao","id_fornecedor_cotacao",$id_fornecedor_cotacao);
        if($id){
            Service::editar(["id_status_fornecedor"=>1, "id_fornecedor" => $id_fornecedor], "id_fornecedor","fornecedor");
            Flash::getMsg();
        }
    }
}