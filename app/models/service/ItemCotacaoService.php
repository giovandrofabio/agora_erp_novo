<?php
namespace app\models\service;

use app\models\dao\ItemCotacaoDao;
use app\models\validacao\ItemCotacaoValidacao;

class ItemCotacaoService {
    public static function salvar($item_cotacao, $campo, $tabela){
        $validacao = ItemCotacaoValidacao::salvar($item_cotacao);
        return Service::salvar($item_cotacao, $campo, $validacao->listaErros(),$tabela);
    }

    public static function getItemCotacaoFornecedorCotacao($id_cotacao, $id_fornecedor, $id_solicitacao){
        $dao = new ItemCotacaoDao();
        return $dao->getItemCotacaoFornecedorCotacao($id_cotacao, $id_fornecedor, $id_solicitacao);
    }
}