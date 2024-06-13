<script type="text/javascript" src="<?php echo URL_BASE ?>/assets/js/js_ordem_compra.js"></script>
<div class="rows mx-0">
    <div class="col-9 central mb-3">

        <div class="rows">
            <div class="col-12">
                <div class="caixa">
                    <div class="p-2 py-1 bg-title text-light text-uppercase h4 mb-0 text-branco d-flex justify-content-space-between">
                        <span class="d-flex center-middle">
                            <i class="fas fa-search mr-1">
                            </i> Ordem de Compra: 6
                        </span>
                        <a href="<?php echo URL_BASE . "ordemcompra" ?>" class="btn btn-verde btn-pequeno float-right ">
                            <i class="fas fa-arrow-left mb-0">
                            </i> Voltar
                        </a>
                    </div>
                </div>
                <div class="py-4 px-4">
                    <div class="rows text-escuro">
                        <div class="col-3 px-1 d-flex">
                            <div class="px-3 py-4 border radius-4 width-100">
                                <i class="fas fa-users pequeno-font float-left mr-1 text-padrao">
                                </i>
                                <small>Nome do Fornecedor</small>
                                <h4 style="line-height:1rem"><?php echo $ordem_compra->nome ?> </h4>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <div class="px-3 py-4 border radius-4 width-100">
                                <i class="fas fa-calendar-alt pequeno-font float-left mr-1 text-padrao">
                                </i>
                                <small>Data Emissão</small>
                                <h4><?php echo databr($ordem_compra->data_emissao) ?></h4>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <div class="px-3 py-4 border radius-4 width-100">
                                <i class="far fa-clock pequeno-font float-left mr-1 text-padrao">
                                </i>
                                <small>Data Aprovação</small>
                                <h4><?php echo $ordem_compra->data_aprovacao ?></h4>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <div class="px-3 py-4 border radius-4 width-100">
                                <i class="fab fa-bitcoin pequeno-font float-left mr-1 text-padrao">
                                </i>
                                <small>Total</small>
                                <h4>R$ <span id="total_ordem_compra"><?php echo $ordem_compra->valor_total ?></span></h4>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <div class="px-3 py-4 border radius-4 width-100">
                                <i class="fas fa-map-marker-alt  pequeno-font float-left mr-1 text-padrao"></i>
                                <small>Status</small>
                                <h4><?php echo $ordem_compra->status_ordem_compra ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="rows">
            <div class="col-12">
                <div class="caixa mb-3 border mt-3">
                    <form action="" method="Post">
                        <div class="h5 bg-title2 d-inline-block width-100 py-1 px-3 text-branco text-uppercase">
                            <span class="d-inline-block">
                                <i class="fas fa-arrow-right">
                                </i> Itens do pedido
                            </span>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="border p-3 radius-4 pb-4">
                                <div class="rows">

                                    <div class="col-4 position-relative">
                                        <label class="text-label">Produto</label>
                                        <input type="text" id="produto" value="" class="form-campo">
                                    </div>

                                    <div class="col-2">
                                        <label class="text-label">Preço</label>
                                        <input type="text" id="preco" value="" class="form-campo">
                                    </div>

                                    <div class="col-1">
                                        <label class="text-label">Qtde</label>
                                        <input type="text" value="1" id="qtde" class="form-campo">
                                    </div>

                                    <div class="col-2 mt-1 pt-1">
                                        <input type="hidden" id="id_produto" name="id_produto">
                                        <input type="button" name="Submit" class="btn btn-verde width-100" value="Inserir" id="btnInserir">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>

                    <div class="col-12">
                        <div class="px-2">
                            <div class="tabela-responsiva pb-4 mt-3">
                                <table cellpadding="0" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th align="center">Item</th>
                                        <th align="left" width="290">Produto</th>
                                        <th align="center">Qtde</th>
                                        <th align="center">Valor</th>
                                        <th align="center">Subtotal</th>
                                        <th align="center">Excluir</th>
                                    </tr>
                                    </thead>
                                    <tbody id="lista_itens_ordem_compra">
                                    <?php
                                        $total = 0;
                                        foreach($lista as $item){
                                        $total += $item->subtotal;
                                    ?>
                                    <tr>
                                        <td align="center"><?php echo $item->id_item_ordem_compra ?></td>
                                        <td align="left" width="290"><?php echo $item->produto ?></td>
                                        <td align="center"><?php echo $item->qtde ?></td>
                                        <td align="center"><?php echo $item->valor ?></td>
                                        <td align="center"><?php echo $item->subtotal ?></td>
                                        <td align="center"><a href="javascript:;" onclick="return excluir_item_ordem_compra(this)" data-entidade="itemordemcompra" data-id="<?php echo $item->id_item_ordem_compra ?>" class="d-inline-block btn btn-outline-vermelho btn-pequeno">
                                                <i class="fas fa-trash-alt"></i></a></td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <td align="right" colspan="6"><b>Total:</b> <span class="text-verde minimo-font" id="total_entrada">R$ <?php echo $total ?></span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="caixa p-2">
                                <div class="caixa-rodape">
                                    <a href="<?php echo URL_BASE . "ordemcompra/excluir/".$ordem_compra->id_ordem_compra ?>" class="btn btn-vermelho btn-medio d-inline-block">Excluir</a>
                                    <a href="<?php echo URL_BASE . "ordemcompra/finalizar/".$ordem_compra->id_ordem_compra ?>" class="btn btn-verde btn-medio d-inline-block">Finalizar</a>
                                    <input type="hidden" id="id_ordem_compra" value="<?php echo $ordem_compra->id_ordem_compra ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>