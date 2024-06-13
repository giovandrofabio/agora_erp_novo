<div class="p-2 py-1 bg-title text-light text-uppercase h4 mb-0 text-branco d-flex justify-content-space-between">
    <span class="d-flex center-middle"><i class="far fa-list-alt mr-1"></i> Fazer Cotação </span>
</div>
<div class="conteudo-fluido">
    <!--    <form action="" method="Post">-->
    <div class="rows">
        <div class="col-6">
            <div class="caixa mb-3 border mt-3">
                <div class="h5 bg-title2 d-inline-block width-100 py-1 px-3 text-branco text-uppercase">
                    <span class="d-inline-block"><i class="fas fa-arrow-right"></i> Solicitações </span>
                </div>
                <form name="frmSolicitacao" id="frmSolicitacao"
                      action="<?php echo URL_BASE . "solicitacaocotacao/inserir" ?>" method="POST">
                    <div class="col-12 mb-3">
                        <label class="text-label">Solicitação</label>
                        <div class="rows">
                            <div class="col-9">
                                <select class="form-campo" name="id_solicitacao" id="id_solicitacao">
                                    <option value="">Escolha uma Opção</option>
                                    <?php foreach ($solicitacoes as $solicitacao) {
                                        echo "<option value='$solicitacao->id_solicitacao'>$solicitacao->produto</option>";
                                    } ?>
                                </select>
                            </div>
                            <div class="col-3">
                                <input type="hidden" name="id_cotacao" value="<?php echo $cotacao->id_cotacao ?>">
                                <input type="submit" class="btn btn-roxo width-100" value="Inserir"
                                       id="btnInserirSolicitacao">
                            </div>
                        </div>
                    </div>
                </form>
                <div class="p-1">
                    <?php
                    //                            $this->verMsg();
                    $this->verErro();
                    ?>
                </div>
                <div class="tabela-responsiva sm tborder tborder pb-3">
                    <div class="rolagem-tabela">
                        <table cellpadding="0" cellspacing="0" class="mb-0 table-bordered">
                            <thead>
                            <tr>
                                <th align="center">id</th>
                                <th align="left">Produto</th>
                                <th align="center">Qtde</th>
                                <th align="center">Ação</th>
                            </tr>
                            </thead>
                            <tbody id="lista_solicitacao">
                            <?php foreach ($solicitacoes_cotacao as $s) { ?>
                                <tr>
                                    <td align="center"><?php echo $s->id_solicitacao_cotacao ?></td>
                                    <td align="left">
                                        <strong class="d-block"><?php echo $s->produto ?></strong>
                                        <small class="datas">Data: <?php echo databr($s->data_solicitacao) ?></small>
                                        <small class="datas">Data entrega: 05/06/2020</small>
                                    </td>
                                    <td align="center">10</td>
                                    <td align="center">
                                        <a href="<?php echo URL_BASE . "solicitacaocotacao/excluir/" . $s->id_solicitacao_cotacao . "/" . $s->id_solicitacao . "/" . $s->id_cotacao ?>"
                                           class="link-vermelho">
                                            <i class="fas fa-trash-alt h5 mb-0"></i>
                                            <!-- Excluir-->
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="caixa mb-3 border mt-3">
                <div class="h5 bg-title d-inline-block width-100 py-1 px-3 text-branco text-uppercase">
                    <span class="d-inline-block"><i class="fas fa-arrow-right"></i> Fornecedores </span>
                </div>
                <form name="frmFornecedor" id="frmFornecedor" action="<?php echo URL_BASE . "fornecedorcotacao/inserir" ?>" method="POST">
                    <div class="col-12 mb-3">
                        <label class="text-label d-block">Fornecedores</label>
                        <div class="rows">
                            <div class="col-9">
                                <select class="form-campo" name="id_fornecedor" id="id_fornecedor">
                                    <option value="">Escolha uma Opção</option>
                                    <?php foreach ($fornecedores as $fornecedor) {
                                        echo "<option value='$fornecedor->id_contato'>$fornecedor->nome</option>";
                                    } ?>
                                </select>
                            </div>
                            <div class="col-3">
                                <input type="hidden" name="id_cotacao" value="<?php echo $cotacao->id_cotacao ?>">
                                <input type="submit" class="btn btn-roxo width-100" value="Inserir" id="btnInserirFornecedor">
                            </div>
                        </div>
                    </div>
                </form>

                <div class="tabela-responsiva sm tborder pb-3">
                    <div class="rolagem-tabela">
                        <table cellpadding="0" cellspacing="0" class="mb-0 table-bordered">
                            <thead>
                            <tr>
                                <th align="center">ID</th>
                                <th align="center">Nome</th>
                                <th align="center">Email</th>
                                <th align="center">Fone</th>
                                <th align="center">Ação</th>

                            </tr>
                            </thead>
                            <tbody id="lista_fornecedor">
                            <?php foreach ($fornecedores_cotacao as $f) { ?>
                                <tr>
                                    <td align="center"><?php echo $f->id_fornecedor_cotacao ?></td>
                                    <td align="left"><strong class="d-block"><?php echo $f->nome ?></strong></td>
                                    <td align="center"><?php echo $f->email ?></td>
                                    <td align="center"><?php echo $f->fone ?></td>
                                    <td align="center">
                                        <a href="<?php echo URL_BASE . "fornecedorcotacao/excluir/" . $f->id_fornecedor_cotacao . "/" . $f->id_cotacao ?>" class="link-vermelho">
                                            <i class="fas fa-trash-alt h5 mb-0"></i>
                                            <!-- Excluir-->
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="position-fixed" style="right:10px;bottom:10px;">
            <a href="<?php echo URL_BASE ."cotacao/finalizar/" . $cotacao->id_cotacao ?>" class="btn btn-verde m-auto h4" value="Finalizar Cotação">Finalizar Cotação</a>
        </div>


    </div>
    <!--    </form>-->
</div>