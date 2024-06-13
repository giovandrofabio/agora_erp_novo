<?php

namespace app\models\validacao;

use app\core\Validacao;
use app\models\service\ProdutoLocalizacaoService;
use app\models\service\Service;

class ProdutoLocalizacaoValidacao {
    public static function salvar($produto_localizacao){
        $validacao = new Validacao();

        $validacao->setData("id_localizacao", $produto_localizacao->id_localizacao);
        $validacao->setData("id_produto", $produto_localizacao->id_produto);

        //fazendo a validação
        $validacao->getData("id_localizacao")->isVazio();
        $validacao->getData("id_produto")->isVazio();

        if(!$produto_localizacao->id_produto_localizacao){
            $tem = ProdutoLocalizacaoService::getProdutoLocalizacao($produto_localizacao->id_produto, $produto_localizacao->id_localizacao);
            if ($tem){
               $validacao->getData("id_localizacao")->isUnico(1,"Já existe um produto com este local"); 
            }
        }

        return $validacao;
    }
}