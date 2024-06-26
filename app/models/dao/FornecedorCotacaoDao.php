<?php

namespace app\models\dao;

use app\core\Model;

class FornecedorCotacaoDao extends Model {
    public function listaPorCotacao($id_cotacao){
        $sql = "SELECT 
                    fc.*,
                    c.nome,
                    c.email,
                    c.fone 
                FROM 
                    fornecedor_cotacao fc, 
                    contato c
                WHERE 
                    fc.id_fornecedor = c.id_contato 
                AND 
                    fc.id_cotacao = $id_cotacao ";
        return $this->select($this->db, $sql);
    }

    public function getFornecedorCotacao($id_cotacao, $id_fornecedor){
        $sql = "SELECT 
                    fc.*,
                    c.nome,
                    c.email,
                    c.fone
                FROM 
                    fornecedor_cotacao fc, 
                    contato c
                WHERE 
                    fc.id_fornecedor = c.id_contato 
                AND 
                    fc.id_cotacao = $id_cotacao
                AND 
                    fc.id_fornecedor = $id_fornecedor";
        return $this->select($this->db, $sql, false);
    }
}