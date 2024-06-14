<div class="rows">
    <div class="col-12">
        <div class="caixa">
            <div class="p-2 py-1 bg-title text-light text-uppercase h4 mb-0 text-branco d-flex justify-content-space-between">
                <span class="d-flex center-middle">
                    <i class="far fa-list-alt mr-1"></i> Lista de solicitação
                </span>
                <div>
                    <a a href="javascript:;" onclick="abrirModal('#janela1')" class="btn btn-verde mx-1 d-inline-block"><i
                                class="fas fa-plus-circle"></i> Adicionar novo
                    </a>
                    <a href="" class="btn btn-laranja filtro mx-1 d-inline-block">
                        <i class="fas fa-filter"></i> Filtrar
                    </a>
                </div>
            </div>
            <div class="px-3">
                <form name="busca" action="" method="GET">
                    <div class="mostraFiltro bg-padrao mt-2 p-2 radius-4">
                        <div class="rows">
                            <div class="col-2">
                                <label class="text-label d-block text-branco">Data Início</label>
                                <input type="date" name="data_inicial" value="2020-06-15" class="form-campo">
                            </div>
                            <div class="col-2">
                                <label class="text-label d-block text-branco">Data Fim</label>
                                <input type="date" name="data_final" value="" class="form-campo">
                            </div>
                            <div class="col-3">
                                <label class="text-label d-block text-branco">Produto</label>
                                <select class="form-campo">
                                    <option value='38'>ABRASIVO CEBO AMARELO</option>
                                    <option value='38'>ABRASIVO CEBO AMARELO</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <label class="text-label d-block text-branco">Status</label>
                                <select class="form-campo">
                                    <option>opção</option>
                                </select>
                            </div>
                            <div class="col-2 mt-1 pt-1 d-flex align-items-end">
                                <input type="submit" value="Pesquisar" class="btn btn-roxo text-uppercase">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<form name="frmCotar" id="frmCotar" action="<?php echo URL_BASE . "cotacao/em_massa" ?>" method="post">
    <div class="col-12 my-3">
        <div class="px-3 d-flex text-end">
            <button class="btn btn-azul text-branco" type="submit"><i class="fas fa-arrow-alt-circle-right"></i>
                Fazer cotação
            </button>
        </div>
    </div>
    <div class="col-12 mt-3">
        <div class="px-2">
            <div class="p-1">
                <?php
                $this->verMsg();
                $this->verErro();
                ?>
            </div>
            <div class="tabela-responsiva pb-4">
                <table cellpadding="0" cellspacing="0" id="dataTable" width="100%">
                    <thead>
                    <tr>
                        <th><input type='checkbox' name='tudo' id="example-select-all"/></th>
                        <th align="center">Id</th>
                        <th align="left">Produto</th>
                        <th align="center">Data Solicitação</th>
                        <th align="center">Status</th>
                        <th align="center">Qtde</th>
                        <th align="center">Editar</th>
                        <th align="center">Excluir</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($lista as $solicitacao) {
                        ?>
                        <tr>
                            <td align="center"><input type="checkbox" name="idSolicitacao[]"
                                                      value="<?php echo $solicitacao->id_solicitacao ?>"></td>
                            <td align="center"><?php echo $solicitacao->id_solicitacao ?></td>
                            <td align="left"><?php echo $solicitacao->produto ?></td>
                            <td align="center"><?php echo databr($solicitacao->data_solicitacao) ?></td>
                            <td align="center">
                                <span class="status status-amarelo"><?php echo $solicitacao->status_solicitacao ?></span>
                            </td>
                            <td align="center"><?php echo $solicitacao->qtde ?></td>
                            <td align="center">
                                <a href="cotacao.html" class="d-inline-block btn btn-outline-roxo btn-pequeno">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                            </td>
                            <td align="center">
                                <a href="" class="d-inline-block btn btn-outline-vermelho btn-pequeno">
                                    <i class="fas fa-trash-alt"></i> Excluir
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>

<!--TELA DE MODAL-->
<div class="window formulario" id="janela1">
    <div class="p-4 width-100 d-inline-block">
        <form action="<?php echo URL_BASE . "solicitacao/salvar" ?>" method="POST">
            <div class="rows">
                <div class="col-9">
                    <label class="d-block pb-1">Selecionar Produto</label>
                    <select class="form-campo" name="id_produto">
                        <option>Selecione uma Opção</option>
                        <?php
                        foreach ($insumos as $insumo) {
                            echo "<option value='$insumo->id_produto'>$insumo->produto</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col-3">
                    <span class="d-block pb-1">Qtde</span>
                    <input type="text" name="qtde" class="form-campo campo-form">
                </div>

                <div class="col-12 mt-3">
                    <input type="submit" class="btn btn-verde m-auto d-block" value="cadastrar">
                </div>
            </div>
        </form>
        <a href="#" class="fechar">x</a>
    </div>
</div>
<div id="mascara"></div>
<!--FIM DO MODAL-->