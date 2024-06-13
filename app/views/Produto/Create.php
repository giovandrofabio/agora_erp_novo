<div class="p-2 bg-title text-light text-uppercase h5 mb-0 text-branco d-flex justify-content-space-between">
    <span><i class="fas fa-plus-circle"></i> Cadastrar unidade</span>
    <a href="<?php echo URL_BASE ."produto" ?>" class="btn btn-verde btn-pequeno"><i class="fas fa-arrow-left"></i> Voltar</a>
</div>
<div class="p-1">
    <?php 
        $this->verMsg();
        $this->verErro();
        $imagem = isset($produto->imagem) ? $produto->imagem : "semproduto.png"
    ?>
</div>
<form action="<?php echo URL_BASE . "produto/salvar" ?>" method="Post" enctype="multipart/form-data">
    <div class="rows p-4">
    <div class="col-4">
        <div class="py-1 px-2 mt-3 border text-center  campo-upload">
            <label for="arquivo">
                <img src="<?php echo URL_IMAGEM . $imagem ?>" class="img-fluido opaco" id="imgUp">
                <span>Inserir produto</span>
            </label>
            <input type="file" name="arquivo" id="arquivo" onchange="pegaArquivo(this.files)">
        </div>
    </div>
    <div class="col-8 px-2">
        <div class="rows">

            <div class="col-8 mb-3">
                <label class="text-label">Titulo do produto</label>
                <input type="text" value="<?php echo isset($produto->produto) ? $produto->produto : null ?>"
                    name="produto" placeholder="Digite aqui..." class="form-campo">
            </div>

            <div class="col-4 mb-3">
                <label class="text-label">Código Barra</label>
                <input type="text" name="codigo_barra"
                    value="<?php echo isset($produto->codigo_barra) ? $produto->codigo_barra : null ?>"
                    placeholder="Digite aqui..." class="form-campo">
            </div>

            <div class="col-4 mb-3">
                <label class="text-label">Categoria</label>
                <select class="form-campo" name="id_categoria">
                    <option value="">Selecione</option>
                    <?php
                    foreach ($categorias as $categoria) {
                        $selecionado = ($categoria->id_categoria == $produto->id_categoria) ? "selected" : "";
                        echo "<option value='$categoria->id_categoria' $selecionado>$categoria->categoria</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="col-4 mb-3">
                <label class="text-label">Unidade</label>
                <select class="form-campo" name="id_unidade">
                    <option value="">Selecione</option>
                    <?php
                    foreach ($unidades as $unidade) {
                        $selecionado = ($unidade->id_unidade == $produto->id_unidade) ? "selected" : "";
                        echo "<option value='$unidade->id_unidade' $selecionado>$unidade->unidade</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="col-4 mb-3">
                <label class="text-label">Preço</label>
                <input type="text" name="preco" value="<?php echo isset($produto->preco) ? $produto->preco : null ?>"
                    placeholder="Digite aqui..." class="form-campo">
            </div>

            <div class="col-3 mb-3">
                <label class="text-label">Produto</label>
                <select class="form-campo" name="eh_produto">
                    <option value="">Selecione</option>
                    <option value="S" <?php echo (isset($produto->eh_produto) == "S") ? "selected" : null ?>>Sim</option>
                    <option value="N" <?php echo (isset($produto->eh_produto) == "N") ? "selected" : null ?>>Não</option>
                </select>
            </div>

            <div class="col-3 mb-3">
                <label class="text-label">Insumo</label>
                <select class="form-campo" name="eh_insumo">
                    <option value="">Selecione</option>
                    <option value="S" <?php echo (isset($produto->eh_insumo) == "S") ? "selected" : "" ?>>Sim</option>
                    <option value="N" <?php echo (isset($produto->eh_insumo) == "N") ? "selected" : "" ?>>Não</option>
                </select>
            </div>

            <div class="col-3 mb-3">
                <label class="text-label">Promoção</label>
                <select class="form-campo" name="eh_promocao">
                    <option value="">Selecione</option>
                    <option value="S" <?php echo (isset($produto->eh_promocao) == "S") ? "selected" : "" ?>>Sim</option>
                    <option value="N" <?php echo (isset($produto->eh_promocao) == "N") ? "selected" : "" ?>>Não</option>
                </select>
            </div>

            <div class="col-3 mb-3">
                <label class="text-label">Mais vendido</label>
                <select class="form-campo" name="eh_maisvendido">
                    <option value="">Selecione</option>
                    <option value="S" <?php echo (isset($produto->eh_maisvendido) == "S") ? "selected" : "" ?>>Sim</option>
                    <option value="N" <?php echo (isset($produto->eh_maisvendido) == "N") ? "selected" : "" ?>>Não</option>
                </select>
            </div>

            <div class="col-3 mb-3">
                <label class="text-label">Lançamento</label>
                <select class="form-campo" name="eh_lancamento">
                    <option value="">Selecione</option>    
                    <option value="S" <?php echo (isset($produto->eh_lancamento) == "S") ? "selected" : "" ?>>Sim</option>
                    <option value="N" <?php echo (isset($produto->eh_lancamento) == "N") ? "selected" : "" ?>>Não</option>
                </select>
            </div>

            <div class="col-3 mb-3">
                <label class="text-label">Custo Atual</label>
                <input type="text" name="custo_atual"
                    value="<?php echo isset($produto->custo_atual) ? $produto->custo_atual : null ?>"
                    placeholder="Digite aqui..." class="form-campo">
            </div>

            <div class="col-3 mb-3">
                <label class="text-label">Custo Médio</label>
                <input type="text" name="custo_medio"
                    value="<?php echo isset($produto->custo_medio) ? $produto->custo_medio : null ?>"
                    placeholder="Digite aqui..." class="form-campo">
            </div>

            <div class="col-3 mb-3">
                <label class="text-label">Custo Produção</label>
                <input type="text" name="custo_producao"
                    value="<?php echo isset($produto->custo_producao) ? $produto->custo_producao : null ?>"
                    placeholder="Digite aqui..." class="form-campo">
            </div>

            <div class="col-4 mb-3">
                <label class="text-label">Estoque Inicial</label>
                <input type="text" name="estoque_inicial"
                    value="<?php echo isset($produto->estoque_inicial) ? $produto->estoque_inicial : null ?>"
                    placeholder="Digite aqui..." class="form-campo">
            </div>

            <div class="col-4 mb-3">
                <label class="text-label">Estoque Mínimo</label>
                <input type="text" name="estoque_minimo"
                    value="<?php echo isset($produto->estoque_minimo) ? $produto->estoque_minimo : null ?>"
                    placeholder="Digite aqui..." class="form-campo">
            </div>

            <div class="col-4 mb-3">
                <label class="text-label">Estoque Máximo</label>
                <input type="text" name="estoque_maximo"
                    value="<?php echo isset($produto->estoque_maximo) ? $produto->estoque_maximo : null ?>"
                    placeholder="Digite aqui..." class="form-campo">
            </div>

            <div class="col-4 mb-3">
                <label class="text-label">Estoque Atual</label>
                <input type="text" name="estoque_atual"
                    value="<?php echo isset($produto->estoque_atual) ? $produto->estoque_atual : null ?>"
                    placeholder="Digite aqui..." class="form-campo">
            </div>

            <div class="col-4 mb-3">
                <label class="text-label">Estoque Reservado</label>
                <input type="text" name="estoque_reservado"
                    value="<?php echo isset($produto->estoque_reservado) ? $produto->estoque_reservado : null ?>"
                    placeholder="Digite aqui..." class="form-campo">
            </div>

            <div class="col-4 mb-3">
                <label class="text-label">Estoque Real</label>
                <input type="text" name="estoque_real"
                    value="<?php echo isset($produto->estoque_real) ? $produto->estoque_real : null ?>"
                    placeholder="Digite aqui..." class="form-campo">
            </div>

            <div class="col-12 mt-2">
                <input type="hidden" name="id_produto" value="<?php echo isset($produto->id_produto) ? $produto->id_produto: null ?>">
                <input type="submit" value="Salvar alterações" class="btn btn-laranja btn-medio d-block m-auto">
            </div>
        </div>
    </div>
    </div>
</form>