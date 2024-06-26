<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\Service;
use app\models\service\CotacaoService;
use app\models\service\SolicitacaoCotacaoService;
use app\models\service\SolicitacaoService;

class SolicitacaocotacaoController extends Controller
{

    private $tabela = "solicitacao_cotacao";
    private $campo  = "id_solicitacao_cotacao";

    public function inserir()
    {
        $solicitacao_cotacao = new \stdClass();
        $solicitacao_cotacao->id_solicitacao = $_POST["id_solicitacao"];
        $solicitacao_cotacao->id_cotacao     = $_POST["id_cotacao"];

        SolicitacaoCotacaoService::salvar($solicitacao_cotacao, $this->campo, $this->tabela);
        $this->redirect(URL_BASE . "cotacao/cotar/" . $solicitacao_cotacao->id_cotacao);
    }

    public function excluir($id_solicitacao_cotacao, $id_solicitacao, $id_cotacao){
        SolicitacaoCotacaoService::excluir($id_solicitacao_cotacao, $id_solicitacao);
        $this->redirect(URL_BASE . "cotacao/cotar/" . $id_cotacao);
    }
}