<script type="text/javascript" src="<?php echo URL_BASE ?>/assets/js/js_transferencia.js"></script>
<div class="p-2 py-1 bg-title text-light text-uppercase h4 mb-0 text-branco d-flex justify-content-space-between">
    <span class="d-flex center-middle"><i class="fas fa-arrow-right mr-1"></i> Transferência de Estoque </span>
    <div>
        <a href="" class="btn btn-laranja filtro mx-1 d-inline-block"><i class="fas fa-filter"></i> Filtrar</a>
    </div>
</div>
<form action="" method="Post">
    <div class="rows">

        <div class="col-12 mb-3">
            <form name="busca" action="" method="post">
                <div class="px-3">
                    <div class="mostraFiltro bg-padrao mt-2 p-2 radius-4">
                        <div class="rows">
                            <div class="col-3">
                                <label class="text-label d-block text-branco">Data 1</label>
                                <input type="date" name="categoria" value="" class="form-campo">
                            </div>
                            <div class="col-3">
                                <label class="text-label d-block text-branco">Data 2</label>
                                <input type="date" name="categoria" value="" class="form-campo">
                            </div>
                            <div class="col-4">
                                <label class="text-label d-block text-branco">Produto</label>
                                <select class="form-campo">
                                    <option>Opção</option>
                                    <option>Opção</option>
                                    <option>Opção</option>
                                </select>
                            </div>
                            <div class="col-2 mt-1 pt-1">
                                <input type="submit" value="Pesquisar" class="btn btn-roxo text-uppercase">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>


        <div class="col-12">
            <div class="caixa mb-3 border mt-3">
                <div class="h5 bg-title2 d-inline-block width-100 py-1 px-3 text-branco text-uppercase">
                    <span class="d-inline-block"><i class="fas fa-arrow-right"></i> Itens do pedido </span>
                </div>
                <div class="col-12 mb-3">
                    <div class="border p-3 radius-4 pb-4">
                        <div class="rows">
                            <div class="col-3 position-relative">
                                <label class="text-label">Produto</label>
                                <input type="text" id="produto" value="" class="form-campo">
                            </div>

                            <div class="col-3 ">
                                <label class="text-label">Origem</label>
                                <select class="form-campo" name="id_origem" id="id_origem"></select>
                            </div>

                            <div class="col-3 ">
                                <label class="text-label">Destino</label>
                                <select class="form-campo" name="id_destino" id="id_destino"></select>
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
                <div class="col-12">
                    <div class="px-2">
                        <div class="tabela-responsiva pb-4 mt-3">
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th align="center">ID</th>
                                        <th align="center">Data</th>
                                        <th align="left" width="290">Produto</th>
                                        <th align="center">Origem</th>
                                        <th align="center">Destino</th>
                                        <th align="center">Qtde</th>
                                    </tr>
                                </thead>
                                <tbody id="lista_transferencias">
                                    <?php 
                                        $total = 0;
                                        foreach($lista as $transferencia){ 
                                            $total += $transferencia->subtotal_transferencia;    
                                    ?>
                                    <tr>
                                        <td align="center"><?php echo $transferencia->id_transferencia ?></td>
                                        <td align="center"><?php echo $transferencia->data_transferencia ?></td>
                                        <td align="left" width="290"><?php echo $transferencia->produto ?></td>
                                        <td align="center"><?php echo $transferencia->origem ?></td>
                                        <td align="center"><?php echo $transferencia->destino ?></td>
                                        <td align="center"><?php echo $transferencia->qtde_transferencia ?></td>
                                    </tr>
                                    <?php } ?>   
                                    <tr>
                                        <td align="right" colspan="6"><b>Total:</b> <span class="text-verde minimo-font"
                                                id="total_transferencia"><?php echo $total ?></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>