<div class="rows">
    <div class="col-12">
        <div class="caixa">
            <div class="p-2 py-1 bg-title text-light text-uppercase h4 mb-0 text-branco d-flex justify-content-space-between">
                <span class="d-flex center-middle">
                    <i class="far fa-list-alt mr-1"></i> Lista de contato
                </span>
                <div>
                    <a href="<?php echo URL_BASE . "contato/create" ?>" class="btn btn-verde mx-1 d-inline-block">
                        <i class="fas fa-plus-circle"></i> Adicionar novo
                    </a>
                    <a href="" class="btn btn-laranja filtro mx-1 d-inline-block">
                        <i class="fas fa-filter"></i> Filtrar
                    </a>
                </div>
            </div>
            <form name="busca" action="" method="GET">
                <div class="px-2 pt-2">
                    <div class="mostraFiltro bg-padrao mt-2 p-2 radius-4">
                        <div class="rows">
                            <div class="col-8">
                                <label class="text-label d-block text-branco">Nome </label>
                                <input type="text" name="categoria" value="" class="form-campo">
                            </div>
                            <div class="col-2" style="margin-top: 2px">
                                <label class="text-label d-block text-branco">Ativo </label>
                                <select name="ativo" class="form-campo">
                                    <option value="S">Sim</option>
                                    <option value="N">Não</option>
                                </select>
                            </div>
                            <div class="col-2 mt-1 pt-1 d-flex align-items-end">
                                <input type="submit" value="Pesquisar" class="btn btn-roxo text-uppercase">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12">
        <div class="px-2">
            <div class="p-1">
               <?php $this->verMsg() ?>
            </div>
            <div class="tabela-responsiva pb-4 mt-3">
                <table cellpadding="0" cellspacing="0" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th align="center">Id</th>
                            <th align="center">Nome</th>
                            <th align="center">Email</th>
                            <th align="center">Fone</th>
                            <th align="center" colspan="3">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($lista as $contato){
                        ?>
                        <tr>
                            <td align="center"><?php echo $contato->id_contato ?></td>
                            <td align="center" ><?php echo $contato->nome ?></td>
                            <td align="center"><?php echo $contato->email ?></td>
                            <td align="center"><?php echo $contato->fone ?></td>
                            <td align="center">
                                <a href="<?php echo URL_BASE ."contato/edit/" . $contato->id_contato ?>"
                                    class="d-inline-block btn btn-outline-roxo btn-pequeno"><i class="fas fa-edit"></i>
                                    Editar</a> </td>
                            <td align="center">
                                <a href="javascript:;" onclick="return excluir(this)" data-entidade="contato" data-id="<?php echo $contato->id_contato ?>" class="d-inline-block btn btn-outline-vermelho btn-pequeno">
                                <i class="fas fa-trash-alt"></i> Excluir</a> 
                            </td>
                        </tr>
                        <?php } ?>  
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>