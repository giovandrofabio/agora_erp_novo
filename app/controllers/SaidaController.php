<?php

namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\SaidaService;
use app\util\UtilService;

class SaidaController extends Controller
{

    private $tabela = "saida";
    private $campo = "id_saida";

    public function index()
    {
        $dados["lista"] = SaidaService::listaPorData(hoje());
        $dados["view"]  = "Saida/Create";
        $this->load("template", $dados);
    }

    public function create()
    {
        $dados["saida"] = Flash::getForm();
        $dados["view"]      = "Saida/Create";
        $this->load("template", $dados);
    }

    public function edit($id)
    {
        $saida = Service::get($this->tabela, $this->campo, $id);
        if(!$saida) {
            $this->redirect(URL_BASE . "saida");
        }
        $dados["lista"]       = Service::lista($this->tabela);
        $dados["saida"] = $saida;
        $dados["view"]        = "saida/create";
        $this->load("template", $dados);
    }

    public function inserir()
    {
        $saida = new \stdClass();
        if($_POST["id_saida"]){
            $saida->id_saida = $_POST["id_saida"];
        }
        $saida->id_produto       = $_POST["id_produto"];
        $saida->id_localizacao   = $_POST["id_localizacao"];
        $saida->qtde_saida     = $_POST["qtde"];
        $saida->valor_saida    = $_POST["preco"];
        $saida->subtotal_saida = $saida->qtde_saida * $saida->valor_saida;
        $saida->data_saida     = hoje();
        $saida->hora_saida     = agora();

        Flash::setForm($saida);
        if (SaidaService::salvar($saida, $this->campo, $this->tabela)) {
            $erro = -1;
            $msg  = Flash::getMsg();
        } else {
            $erro = 1;
            $msg  = Flash::getErro();
        }
        $lista = SaidaService::listaPorData(hoje());    
        echo json_encode(["erro"=> $erro, "msg"=>$msg, "lista"=>$lista]);
    }

    public function excluir($id)
    {
        Service::excluir($this->tabela,$this->campo,$id);
        $this->redirect(URL_BASE . "saida");
    }

    public function filtro() {
        $filtro = new \stdClass();
        $filtro->campo = $_GET["campo"];
        $filtro->valor = $_GET["valor"];
        $dados["filtro"] = $filtro;
        $dados["lista"] = Service::getLike($this->tabela, $filtro->campo, $filtro->valor,true);
        $dados["view"] = "Saida/index";
        $this->load("template", $dados);
    }
}