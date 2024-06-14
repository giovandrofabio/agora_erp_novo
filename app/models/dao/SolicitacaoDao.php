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

    public function listaPorCotacao($id_cotacao){
        $sql = "SELECT 
                    p.produto, 
                    st.*, 
                    s.* 
                FROM solicitacao_cotacao sc,
                     solicitacao s, 
                     status_solicitacao st, 
                     produto p 
                WHERE
                    sc.id_solicitacao = s.id_solicitacao 
                AND  
                    s.id_produto = p.id_produto 
                AND
                    s.id_status_solicitacao = st.id_status_solicitacao 
                AND 
                    sc.id_cotacao = $id_cotacao";
        return $this->select($this->db, $sql);
    }
}