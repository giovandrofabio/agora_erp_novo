<?php

namespace app\models\dao;

use app\core\Model;

class SolicitacaoDao extends Model {
    public function listaPorStatus($id_status){
        $sql = "SELECT s.*,p.produto, st.* FROM solicitacao s, produto p, status_solicitacao st WHERE
                s.id_produto = p.id_produto AND
                s.id_status_solicitacao = st.id_status_solicitacao AND 
                s.id_status_solicitacao = $id_status";
        return $this->select($this->db, $sql);
    }
}