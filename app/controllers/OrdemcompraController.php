<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\ItemOrdemCompraService;
use app\models\service\Ordem_CompraService;
use app\models\service\OrdemCompraService;
use app\models\service\Service;

class ordemcompraController extends Controller
{

    private $tabela = "ordem_compra";
    private $campo = "id_ordem_compra";

    public function index()
    {
        $dados["lista"]        = OrdemCompraService::lista();
        $dados["fornecedores"] = Service::get("contato", "eh_fornecedor","S",true);
        $dados["view"]         = "Ordem_Compra/Index";
        $this->load("template", $dados);
    }

    public function create($id_ordem_compra) {
        $ordemcompra = OrdemCompraService::getOrdemCompra($id_ordem_compra);
        if(!$ordemcompra){
            $this->redirect(URL_BASE . "ordem_compra");
        }
        $dados["ordem_compra"] = $ordemcompra;
        $dados["lista"]        = ItemOrdemCompraService::listaItensOrdemCompra($id_ordem_compra);
        $dados["view"]         = "Ordem_Compra/Create";
        $this->load("template", $dados);
    }

    public function novo() {
        $id_fornecedor = $_POST["id_fornecedor"];
        $ordemcompra = OrdemCompraService::getOrdemCompraAberta();
        if(!$ordemcompra){
            $id_ordem_compra = Service::inserir(["id_fornecedor"=>$id_fornecedor,"avulsa"=>"S","id_status_ordem_compra"=>1,
                "finalizada"=>"N","data_emissao"=>hoje()],"ordem_compra");
            $ordemcompra = OrdemCompraService::getOrdemCompra($id_ordem_compra);
        }
        $this->redirect(URL_BASE . "ordemcompra/create/" . $ordemcompra->id_ordem_compra);
    }

    public function edit($id)
    {
        $ordem_compra = Service::get($this->tabela, $this->campo, $id);
        if(!$ordem_compra) {
            $this->redirect(URL_BASE . "ordem_compra");
        }

        $dados["ordem_compra"] = $ordem_compra;
        $dados["view"]      = "Ordem_Compra/create";
        $this->load("template", $dados);
    }

    public function salvar()
    {
        $ordem_compra = new \stdClass();
        if($_POST["id_ordem_compra"]){
            $ordem_compra->id_ordem_compra = $_POST["id_ordem_compra"];
        }
        $ordem_compra->ordem_compra = $_POST["ordem_compra"];

        Flash::setForm($ordem_compra);
        if (ordemCompraService::salvar($ordem_compra, $this->campo, $this->tabela)) {
            $this->redirect(URL_BASE . "Ordem_Compra");
        } else {
            if (!$ordem_compra->id_ordem_compra) {
                $this->redirect(URL_BASE . "Ordem_Compra/create");
            } else {
                $this->redirect(URL_BASE . "Ordem_Compra/edit/".$ordem_compra->id_ordem_compra);
            }
        }
    }

    public function finalizar($id_ordem_compra)
    {
        Service::editar(["finalizada" =>"S","id_status_ordem_compra"=>2,"id_ordem_compra"=>$id_ordem_compra],"id_ordem_compra","ordem_compra");
        $this->redirect(URL_BASE . "ordemcompra");
    }

    public function aprovar($id_ordem_compra)
    {
        $ordemcompra = OrdemCompraService::getOrdemCompra($id_ordem_compra);
        if(!$ordemcompra){
            $this->redirect(URL_BASE . "ordem_compra");
        }
        $dados["ordem_compra"] = $ordemcompra;
        $dados["lista"]        = ItemOrdemCompraService::listaItensOrdemCompra($id_ordem_compra);
        $dados["view"]         = "Ordem_Compra/Aprovar";
        $this->load("template", $dados);
    }

    public function excluir($id)
    {
        Service::excluir($this->tabela,$this->campo,$id);
        $this->redirect(URL_BASE . "ordemcompra");
    }

    public function filtro() {
        $filtro = new \stdClass();
        $filtro->campo = $_GET["campo"];
        $filtro->valor = $_GET["valor"];
        $dados["filtro"] = $filtro;
        $dados["lista"] = Service::getLike($this->tabela, $filtro->campo, $filtro->valor,true);
        $dados["view"] = "Ordem_Compra/index";
        $this->load("template", $dados);
    }
}