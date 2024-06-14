<div class="rows">
    <div class="col-12">
        <div class="caixa">
            <div class="p-2 py-1 bg-title text-light text-uppercase h4 mb-0 text-branco d-flex justify-content-space-between">
                <span class="d-flex center-middle"><i class="far fa-list-alt mr-1"></i> Lista de Cotação </span>
                <div>
                    <a href="<?php echo URL_BASE ."cotacao/create" ?>"  class="btn btn-verde mx-1 d-inline-block">
                        <i class="fas fa-plus-circle"></i> Adicionar novo</a>
                    <a href="" class="btn btn-laranja filtro mx-1 d-inline-block"><i class="fas fa-filter"></i> Filtrar</a>
                </div>
            </div>
            <div class="px-3">
                <form name="busca" action="" method="GET" >
                    <div class="mostraFiltro bg-padrao mt-2 p-2 radius-4">
                        <div class="rows">
                            <div class="col-2">
                                <label class="text-label d-block text-branco">Data 1</label>
                                <input type="date" name="data_inicial" value="2020-06-15" class="form-campo">
                            </div>
                            <div class="col-2">
                                <label class="text-label d-block text-branco">Data 2</label>
                                <input type="date" name="data_final" value="" class="form-campo">
                            </div>
                            <div class="col-3">
                                <label class="text-label d-block text-branco">Produto</label>
                                <select class="form-campo">
                                    <option value='38' >ABRASIVO CEBO AMARELO </option>
                                    <option value='38' >ABRASIVO CEBO AMARELO </option>
                                </select>
                            </div>
                            <div class="col-3">
                                <label class="text-label d-block text-branco">Status</label>
                                <select class="form-campo">
                                    <option>ooção</option>
                                </select>
                            </div>
                            <div class="col-2 mt-1 pt-1">
                                <input type="submit" value="Pesquisar" class="btn btn-roxo text-uppercase">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 mt-3">
        <div class="px-2">
            <div class="tabela-responsiva pb-4">
                <table cellpadding="0" cellspacing="0" id="dataTable" width="100%">
                    <thead>
                    <tr>
                        <th align="center">Id</th>
                        <th align="center">Data</th>
                        <th align="center">Status</th>
                        <th align="center">Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($lista as $cotacao) { ?>
                    <tr>
                        <td align="center"><?php echo $cotacao->id_cotacao ?></td>
                        <td align="center"><?php echo databr($cotacao->data_abertura) ?></td>
                        <td align="center"><span class="status status-azul"><?php echo $cotacao->status_cotacao ?></span></td>
                        <?php if($cotacao->id_status_cotacao == 1) { ?>
                            <td align="center">
                                <a href="<?php echo URL_BASE . "cotacao/create" ?>" class="d-inline-block btn btn-outline-roxo btn-pequeno">
                                    <i class="fas fa-edit"></i> Continuar
                                </a>
                            </td>
                        <?php } else { ?>
                            <td align="center">
                                <a href="<?php echo URL_BASE . "cotacao/comparar/". $cotacao->id_cotacao ?>" class="d-inline-block btn btn-outline-roxo btn-pequeno">
                                    <i class="fas fa-edit"></i> Cotar
                                </a>
                            </td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>