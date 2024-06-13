<?php

namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\LocalizacaoService;
use app\util\UtilService;

class LocalizacaoController extends Controller
{

    private $tabela = "localizacao";
    private $campo = "id_localizacao";

    public function index()
    {
        $dados["lista"] = Service::lista($this->tabela);
        $dados["view"]  = "Localizacao/Create";
        $this->load("template", $dados);
    }

    public function create()
    {
        $dados["localizacao"] = Flash::getForm();
        $dados["view"]      = "Localizacao/Create";
        $this->load("template", $dados);
    }

    public function edit($id)
    {
        $localizacao = Service::get($this->tabela, $this->campo, $id);
        if(!$localizacao) {
            $this->redirect(URL_BASE . "localizacao");
        }
        $dados["lista"]       = Service::lista($this->tabela);
        $dados["localizacao"] = $localizacao;
        $dados["view"]        = "localizacao/create";
        $this->load("template", $dados);
    }

    public function salvar()
    {
        $localizacao = new \stdClass();
        if($_POST["id_localizacao"]){
            $localizacao->id_localizacao = $_POST["id_localizacao"];
        }
        $localizacao->localizacao = $_POST["localizacao"];
        $localizacao->galpao      = $_POST["galpao"];

        Flash::setForm($localizacao);
        if (localizacaoService::salvar($localizacao, $this->campo, $this->tabela)) {
            $this->redirect(URL_BASE . "localizacao");
        } else {
            if (!$localizacao->id_localizacao) {
                $this->redirect(URL_BASE . "localizacao/create");
            } else {
                $this->redirect(URL_BASE . "localizacao/edit/".$localizacao->id_localizacao);
            }
        }
    }

    public function excluir($id)
    {
        Service::excluir($this->tabela,$this->campo,$id);
        $this->redirect(URL_BASE . "localizacao");
    }

    public function filtro() {
        $filtro = new \stdClass();
        $filtro->campo = $_GET["campo"];
        $filtro->valor = $_GET["valor"];
        $dados["filtro"] = $filtro;
        $dados["lista"] = Service::getLike($this->tabela, $filtro->campo, $filtro->valor,true);
        $dados["view"] = "Localizacao/index";
        $this->load("template", $dados);
    }
}