<?php

namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\ContatoService;
use app\util\UtilService;

class ContatoController extends Controller
{

    private $tabela = "contato";
    private $campo = "id_contato";

    public function index()
    {
        $dados["lista"] = Service::lista($this->tabela);
        $dados["view"]  = "Contato/Index";
        $this->load("template", $dados);
    }

    public function create()
    {
        $dados["contato"] = Flash::getForm();
        $dados["view"]      = "Contato/Create";
        $this->load("template", $dados);
    }

    public function edit($id)
    {
        $contato = Service::get($this->tabela, $this->campo, $id);
        if(!$contato) {
            $this->redirect(URL_BASE . "contato");
        }

        // i($contato);
        $dados["contato"] = $contato;
        $dados["view"]      = "contato/create";
        $this->load("template", $dados);
    }

    public function salvar()
    {
        $contato = new \stdClass();

        if($_POST["id_contato"]){
            $contato->id_contato = $_POST["id_contato"];
        }
        $contato->nome             = $_POST["nome"];
        $contato->eh_cliente       = $_POST["eh_cliente"];
        $contato->eh_fornecedor    = $_POST["eh_fornecedor"];
        $contato->eh_transportador = $_POST["eh_transportador"];
        $contato->nome_fantasia    = $_POST["nome_fantasia"];
        $contato->cpf              = ($_POST["cpf"]) ? tira_mascara($_POST["cpf"]) : null;
        $contato->cnpj             = $_POST["cnpj"];
        $contato->data_cadastro    = $_POST["data_cadastro"];
        $contato->ativo            = $_POST["ativo"];
        $contato->fone             = $_POST["fone"];
        $contato->celular          = $_POST["celular"];
        $contato->email            = $_POST["email"];
        $contato->senha            = $_POST["senha"];
        $contato->cep              = isset($_POST["cep"]);
        $contato->logradouro       = $_POST["logradouro"];
        $contato->numero           = $_POST["numero"];
        $contato->uf               = $_POST["uf"];
        $contato->cidade           = $_POST["cidade"];
        $contato->complemento      = $_POST["complemento"];
        $contato->bairro           = $_POST["bairro"];
        $contato->ie               = $_POST["ie"];
        $contato->rg               = $_POST["rg"];

        // i($contato);        
        Flash::setForm($contato);
        if (contatoService::salvar($contato, $this->campo, $this->tabela)) {
            $this->redirect(URL_BASE . "contato");
        } else {
            if (!$contato->id_contato) {
                $this->redirect(URL_BASE . "contato/create");
            } else {
                $this->redirect(URL_BASE . "contato/edit/".$contato->id_contato);
            }
        }
    }

    public function excluir($id)
    {
        Service::excluir($this->tabela,$this->campo,$id);
        $this->redirect(URL_BASE . "contato");
    }

    public function filtro() {
        $filtro = new \stdClass();
        $filtro->campo = $_GET["campo"];
        $filtro->valor = $_GET["valor"];
        $dados["filtro"] = $filtro;
        $dados["lista"] = Service::getLike($this->tabela, $filtro->campo, $filtro->valor,true);
        $dados["view"] = "Contato/index";
        $this->load("template", $dados);
    }
}