<?php

namespace app\models\dao;

use app\core\Model;

class ItemCotacaoDao extends Model{

    public function getItemCotacaoFornecedorCotacao($id_cotacao, $id_fornecedor, $id_solicitacao){
        $sql = "SELECT * FROM item_cotacao 
                WHERE
                    id_fornecedor  = $id_fornecedor
                AND 
                    id_solicitacao = $id_solicitacao
                AND 
                    id_cotacao     = $id_cotacao";
        return $this->select($this->db,$sql, false);
    }

    public function listaFornecedorSolicitacaoCotacao($id_cotacao, $id_solicitacao){
        $sql = "SELECT c.nome, co.*, sc.*,p.produto FROM item_cotacao co, contato c, status_item_cotacao sc, produto p
                WHERE
                    co.id_fornecedor = c.id_contato 
                AND
                    co.id_status_item_cotacao = sc.id_status_item_cotacao
                AND
                    co.id_produto = p.id_produto  
                AND 
                    id_solicitacao = $id_solicitacao
                AND 
                    id_cotacao     = $id_cotacao";
        return $this->select($this->db,$sql);
    }

}