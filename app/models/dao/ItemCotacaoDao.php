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

}