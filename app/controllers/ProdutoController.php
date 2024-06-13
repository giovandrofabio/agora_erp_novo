<?php

namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\ProdutoService;

class ProdutoController extends Controller
{

    private $tabela = "produto";
    private $campo = "id_produto";

    public function index()
    {
        $dados["lista"] = Service::lista($this->tabela);
        $dados["view"]  = "Produto/Index";
        $this->load("template", $dados);
    }

    public function create()
    {
        $dados["produto"]     = Flash::getForm();
        $dados["categorias"]  = Service::lista("categoria");
        $dados["unidades"]    = Service::lista("unidade");
        $dados["view"]        = "Produto/Create";
        $this->load("template", $dados);
    }

    public function edit($id)
    {
        $produto = Service::get($this->tabela, $this->campo, $id);
        if(!$produto) {
            $this->redirect(URL_BASE . "produto");
        }

        $dados["produto"]     = $produto;
        $dados["categorias"]  = Service::lista("categoria");
        $dados["unidades"]    = Service::lista("unidade");
        $dados["view"]        = "produto/create";
        $this->load("template", $dados);
    }

    public function salvar()
    {
        $produto = new \stdClass();

        if($_POST["id_produto"]){
            $produto->id_produto      = $_POST["id_produto"];
        }
        $produto->produto         = $_POST["produto"];
        $produto->id_categoria    = $_POST["id_categoria"];
        $produto->id_unidade      = $_POST["id_unidade"];
        $produto->preco           = $_POST["preco"];
        $produto->eh_produto      = $_POST["eh_produto"];
        $produto->eh_insumo       = $_POST["eh_insumo"];
        $produto->eh_promocao     = $_POST["eh_promocao"];
        $produto->eh_maisvendido  = $_POST["eh_maisvendido"];
        $produto->eh_lancamento   = $_POST["eh_lancamento"];
        $produto->id_categoria    = $_POST["id_categoria"];
            
        
        Flash::setForm($produto);
        if (produtoService::salvar($produto, $this->campo, $this->tabela)) {
            $this->redirect(URL_BASE . "produto");
        } else {
            if (!$produto->id_produto) {
                $this->redirect(URL_BASE . "produto/create");
            } else {
                $this->redirect(URL_BASE . "produto/edit/".$produto->id_produto);
            }
        }
    }

    public function excluir($id)
    {
        Service::excluir($this->tabela,$this->campo,$id);
        $this->redirect(URL_BASE . "produto");
    }

    public function buscar($q,$tipo=null)
    {
        $produtos =  ProdutoService::buscar($q,$tipo);
        echo json_encode($produtos);
    }

    public function filtro() {
        $filtro = new \stdClass();
        $filtro->campo = $_GET["campo"];
        $filtro->valor = $_GET["valor"];
        $dados["filtro"] = $filtro;
        $dados["lista"] = Service::getLike($this->tabela, $filtro->campo, $filtro->valor,true);
        $dados["view"] = "Produto/index";
        $this->load("template", $dados);
    }
}