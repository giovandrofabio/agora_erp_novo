<div class="rows">
    <div class="col-12">
        <div class="caixa mb-3">
            <div class="p-2 py-1 bg-title text-light text-uppercase h4 mb-0 text-branco d-flex justify-content-space-between">
                <span class="d-flex center-middle mr-1"><i class="fas fa-arrow-right"></i> COTAÇÕES POR FORNECEDORES </span>
                <a href="" class="btn btn-verde float-right px-5 h5 mb-0"><i class="fas fa-check"></i> Aprovar Todos</a>
            </div>
            <?php foreach ($lista as $solicitacao) { ?>
            <div class="rows px-2  compra_ativo " id="class_ativo_3"  >
                <div class="col-9 mb-3">
                    <div class="tabela-responsiva sm mt-3 tborder">
                        <table cellpadding="0" cellspacing="0" class="mb-0 table-bordered alt" width="100%">
                            <thead>
                            <tr>
                                <th align="center"  width="40">Id</th>
                                <th align="left">Produto</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="status-date">

                                <td align="center"><?php echo $solicitacao->id_solicitacao ?></td>
                                <td align="left">
                                    <strong class="d-block"><?php echo $solicitacao->produto ?></strong>
                                    <small class="datas">Data: <?php echo databr($solicitacao->data_solicitacao) ?></small>
                                    <small class="datas">Data entrega: //</small>
                                    <small class="datas">Status: <?php echo $solicitacao->status_solicitacao ?></small>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <table cellpadding="0" cellspacing="0" class="px-4 py-3" width="100%">
                                        <thead>
                                        <tr>

                                            <th align="center"  width="20">Id</th>
                                            <th align="left">Fornecedor</th>
                                            <th align="center">Qtde</th>
                                            <th align="center">Valor</th>
                                            <th align="center">Status</th>
                                            <th align="center">Ação</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="status-bg">
                                            <td align="center">3</td>
                                            <td align="left">maneol </td>
                                            <td align="center">1</td>
                                            <td align="center">1.00</td>
                                            <td align="center">Aguardando Aprovação</td>
                                            <td align="center">
                                                <a href="javascript:;" onclick="aprovar_item_cotacao(this,3)" class="btn btn-pequeno d-inline-block btn-verde">Aprovar</a>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-3 mt-3 d-flex mb-3 aprovar">
                    <div class="caixa-clara width-100  bg-title3 border radius-4">
                        <span class="bg-title h5 p-1 text-center">FORNECEDOR RECOMENDADO</span>
                        <div class="px-3 py-2">
                            <div class="border-bottom pb-3 mb-3">
                                <small class="d-block">Fornecedores Recomendados:</small>
                                <span class="d-block h5 text-uppercase" id="forn_3">maneol </span>
                                <small class="d-block">Menor valor:</small>
                                <strong class="d-block h3 text-uppercase mb-0" id="preco_3">R$ 1,00</strong>
                            </div>
                            <div id="butAprova_3" >
                                <a href="javascript:;" onclick="aprovar_menor_preco(3,3)" class="btn btn-verde h5">Aprovar</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="rows px-2">
                <div class="col-9 mb-3">
                    <div class="tabela-responsiva sm mt-3 tborder">
                        <table cellpadding="0" cellspacing="0" class="mb-0 table-bordered alt" width="100%">
                            <thead>
                            <tr>
                                <th align="center"  width="40">Id</th>
                                <th align="left">Produto</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="status-date">
                                <td align="center">4</td>
                                <td align="left">
                                    <strong class="d-block">SELO DE SEGURANÇA</strong>
                                    <small class="datas">Data: 04/06/2020</small>
                                    <small class="datas">Data entrega: //</small>
                                    <small class="datas">Status: Em Cotação de Preço</small>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <table cellpadding="0" cellspacing="0" class="px-4 py-3" width="100%">
                                        <thead>
                                        <tr>
                                            <th align="center"  width="20">Id</th>
                                            <th align="left">Fornecedor</th>
                                            <th align="center">Qtde</th>
                                            <th align="center">Valor</th>
                                            <th align="center">Status</th>
                                            <th align="center">Ação</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="status-bg">
                                            <td align="center">4</td>
                                            <td align="left">maneol </td>
                                            <td align="center">1</td>
                                            <td align="center">1.00</td>
                                            <td align="center">Aguardando Aprovação</td>
                                            <td align="center">
                                                <a href="javascript:;" onclick="aprovar_item_cotacao(this,4)" class="btn btn-pequeno d-inline-block btn-verde">Aprovar</a>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-3 mt-3 d-flex mb-3 aprovar">
                    <div class="caixa-clara width-100  bg-title3 border radius-4">
                        <span class="bg-title h5 p-1 text-center">FORNECEDOR RECOMENDADO</span>
                        <div class="px-3 py-2">
                            <div class="border-bottom pb-3 mb-3">
                                <small class="d-block">Fornecedores Recomendados:</small>
                                <span class="d-block h5 text-uppercase" id="forn_4">maneol </span>
                                <small class="d-block">Menor valor:</small>
                                <strong class="d-block h3 text-uppercase mb-0" id="preco_4">R$ 1,00</strong>
                            </div>
                            <div id="butAprova_4">
                                <a href="javascript:;" onclick="aprovar_menor_preco(4,4)" class="btn btn-verde h5">Aprovar</a>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>

    </div>

</div>