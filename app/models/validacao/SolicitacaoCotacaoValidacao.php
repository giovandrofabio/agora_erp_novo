<?php

namespace app\models\validacao;

use app\core\Validacao;
use app\models\service\Service;

class SolicitacaoCotacaoValidacao {
    public static function salvar($solicitacao_cotacao){

        $validacao = new Validacao();

        $validacao->setData("id_solicitacao", $solicitacao_cotacao->id_solicitacao);
        $validacao->setData("id_cotacao", $solicitacao_cotacao->id_cotacao);

        //fazendo a validação
        $validacao->getData("id_solicitacao")->isVazio();
        $validacao->getData("id_cotacao")->isVazio();

        $solicitacao = Service::get("solicitacao","id_solicitacao",$solicitacao_cotacao->id_solicitacao);
        if($solicitacao->id_status_solicitacao != 1){
            $validacao->getData("id_solicitacao")->isUnico(1,"Esta solicitação já foi utilizada");
        }

        return $validacao;
    }
}