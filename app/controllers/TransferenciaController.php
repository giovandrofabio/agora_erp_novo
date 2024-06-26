<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\Service;
use app\models\service\TransferenciaService;

class TransferenciaController extends Controller
{

    private $tabela = "transferencia";
    private $campo = "id_transferencia";

    public function index()
    {
        $dados["lista"] = TransferenciaService::listaPorData(hoje());
        $dados["view"]  = "Transferencia/Create";
        $this->load("template", $dados);
    }

    public function create()
    {
        $dados["transferencia"] = Flash::getForm();
        $dados["view"]      = "Transferencia/Create";
        $this->load("template", $dados);
    }

    public function edit($id)
    {
        $transferencia = Service::get($this->tabela, $this->campo, $id);
        if(!$transferencia) {
            $this->redirect(URL_BASE . "transferencia");
        }
        $dados["lista"]       = Service::lista($this->tabela);
        $dados["transferencia"] = $transferencia;
        $dados["view"]        = "transferencia/create";
        $this->load("template", $dados);
    }

    public function inserir()
    {
        $transferencia = new \stdClass();
        if($_POST["id_transferencia"]){
            $transferencia->id_transferencia = $_POST["id_transferencia"];
        }
        $transferencia->id_produto             = $_POST["id_produto"];
        $transferencia->id_origem              = $_POST["id_origem"];
        $transferencia->id_destino             = $_POST["id_destino"];
        $transferencia->qtde_transferencia     = $_POST["qtde"];
        $transferencia->data_transferencia     = hoje();

        Flash::setForm($transferencia);
        if (TransferenciaService::salvar($transferencia, $this->campo, $this->tabela)) {
            $erro = -1;
            $msg  = Flash::getMsg();
        } else {
            $erro = 1;
            $msg  = Flash::getErro();
        }
        $lista = TransferenciaService::listaPorData(hoje());    
        echo json_encode(["erro"=> $erro, "msg"=>$msg, "lista"=>$lista]);
    }

    public function excluir($id)
    {
        Service::excluir($this->tabela,$this->campo,$id);
        $this->redirect(URL_BASE . "transferencia");
    }

    public function filtro() {
        $filtro = new \stdClass();
        $filtro->campo = $_GET["campo"];
        $filtro->valor = $_GET["valor"];
        $dados["filtro"] = $filtro;
        $dados["lista"] = Service::getLike($this->tabela, $filtro->campo, $filtro->valor,true);
        $dados["view"] = "Transferencia/index";
        $this->load("template", $dados);
    }
}