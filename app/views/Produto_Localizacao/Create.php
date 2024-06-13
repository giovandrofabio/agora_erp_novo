<div class="rows">
    <div class="col-12">
        <div class="caixa">
            <div
                class="p-2 py-1 bg-title text-light text-uppercase h4 mb-0 text-branco d-flex justify-content-space-between">
                <span class="d-flex center-middle"><i class="far fa-list-alt mr-1"></i> Localização </span>

            </div>

            <!-- Mensagem  -->
            <div class="p-1">
            <?php 
                $this->verMsg();
                $this->verErro();
            ?>
            </div>

            <!-- Formulario  -->
            <form action="<?php echo URL_BASE . "produtolocalizacao/salvar" ?>" method="POST">
                <div class="px-2 pt-2">
                    <div class="bg-padrao border radius-4 mt-2 p-3 radius-4">
                        <div class="rows">

                            <!-- Produto  -->
                            <div class="col-3">
                                <label class="text-label d-block text-branco">Produto</label>
                                <select class="form-campo" name="id_produto">
                                <option value="">Selecione uma Opção</option>
                                <?php
                                    foreach ($produtos as $produto) {
                                        // $selecionado = ($produto->id_produto == $produto->id_categoria) ? "selected" : "";
                                        echo "<option value='$produto->id_produto'>$produto->produto</option>";
                                    }
                                ?>
                                </select>
                            </div>

                            <!-- Localização  -->
                            <div class="col-3">
                                <label class="text-label d-block text-branco">Localização</label>
                                <select class="form-campo" name="id_localizacao">
                                <option value="">Selecione uma Opção</option>
                                <?php
                                    foreach ($locais as $local) {
                                        // $selecionado = ($produto->id_produto == $produto->id_categoria) ? "selected" : "";
                                        echo "<option value='$local->id_localizacao'>$local->localizacao</option>";
                                    }
                                ?>
                                </select>
                            </div>

                            <div class="col-2">
                                <label class="text-label d-block text-branco">Em massa</label>
                                <select class="form-campo" name="em_massa">
                                    <option value="N">Não</option>
                                    <option value="S">Sim</option>
                                </select>
                            </div>

                            <div class="col-2">
                                <label class="text-label d-block text-branco">Tipo</label>
                                <select class="form-campo" name="tipo">
                                    <option value="">Todos</option>
                                    <option value="P">Produtos</option>
                                    <option value="I">Insumos</option>
                                </select>
                            </div>

                            <!-- Botão  -->
                            <div class="col-2 mt-1 pt-1">
                                <input type="hidden" name="id_produto_localizacao" value="<?php echo isset($produtolocalizacao->id_produto_localizacao) ? $produtolocalizacao->id_produto_localizacao : null ?>">
                                <input type="submit" value="Inserir" class="btn btn-verde text-uppercase width-100">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12 mt-3">
        <div class="px-2">
            <div class="tabela-responsiva pb-4">
                <table cellpadding="0" cellspacing="0" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th align="center" width="5%">Id</th>
                            <th align="center">Produto</th>
                            <th align="center">Localização</th>
                            <th align="center">Estoque</th>
                            <th align="center" width="70">Editar</th>
                            <th align="center" width="70">Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($lista as $localizacao){ 
                        ?>
                        <tr>
                            <td align="center"><?php echo $localizacao->id_produto_localizacao ?></td>
                            <td align="center"><?php echo $localizacao->produto ?></td>
                            <td align="center"><?php echo $localizacao->localizacao ?></td>
                            <td align="center"><?php echo $localizacao->estoque ?></td>
                            <td align="center">
                                <a href="<?php echo URL_BASE ."localizacao/edit/" . $localizacao->id_localizacao_produto ?>" class="d-inline-block btn btn-outline-roxo btn-pequeno">
                                    <i class="fas fa-edit"></i> Editar</a> 
                            </td>
                            <td align="center">
                                <a href="javascript:;" onclick="return excluir(this)" data-entidade="produtolocalizacao" data-id="<?php echo $localizacao->id_produto_localizacao ?>" class="d-inline-block btn btn-outline-vermelho btn-pequeno">
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