<div class="p-2 bg-title text-light text-uppercase h5 mb-0 text-branco d-flex justify-content-space-between">
    <span><i class="fas fa-plus-circle" aria-hidden="true"></i> Cadastrar contato</span>
    <a href="<?php echo URL_BASE . "contato" ?>" class="btn btn-verde btn-pequeno"><i class="fas fa-arrow-left"
            aria-hidden="true"></i>
        Voltar</a>
</div>
<div class="p-1">
    <?php
    $this->verMsg();
    $this->verErro();
    ?>
</div>
<form action="<?php echo URL_BASE . "contato/salvar" ?>" method="Post">
    <div id="tab">
        <ul>
            <li><a href="#tab-1">Dados gerais</a></li>
            <li><a href="#tab-2">Endereço</a></li>
            <li><a href="#tab-3">Informações adicionais</a></li>
        </ul>
        <div id="tab-1">
            <div class="p-2">
                <span class="d-block mt-4 mb-4 h4 border-bottom text-uppercase">Informações básicas</span>
                <div class="rows">
                    <div class="col-12 mb-4">
                        <span class="h5 d-block text-upp">Marque os tipos desejados:</span>
                        <div class="rows itens-check px-3">

                            <!--Contato-->
                            <div>
                                <input type="checkbox" name="eh_cliente" class="form-control tipo" id="contato" value="S" <?php echo ($contato->eh_cliente == "S") ? "checked" : null ?>>
                                <label class="p-2 mr-1" for="contato">
                                    <i class="fas fa-user"></i> Contato
                                </label>
                            </div>

                            <!--Fornecedor-->
                            <div>
                                <input type="checkbox" name="eh_fornecedor" class="form-control tipo" id="fornecedor" value="S" <?php echo ($contato->eh_fornecedor == "S") ? "checked" : null ?>>
                                <label class="p-2 mr-1" for="fornecedor">
                                    <i class="fas fa-cart-arrow-down"></i> Fornecedor
                                </label>
                            </div>

                            <!--Transportador-->
                            <div>
                                <input type="checkbox" name="eh_transportador" class="form-control tipo" id="transportador" value="S" <?php echo ($contato->eh_transportador == "S") ? "checked" : null ?>>
                                <label class="p-2" for="transportador">
                                    <i class="fas fa-truck"></i> Transportador
                                </label>
                            </div>
                        </div>
                    </div>

                    <!--Nome-->
                    <div class="col-6 mb-3">
                        <label class="text-label">Nome</label>
                        <input type="text" name="nome" value="<?php echo isset($contato->nome) ? $contato->nome : null ?>" placeholder="Digite aqui..." class="form-campo">
                    </div>

                    <!--Nome Fantasia-->
                    <div class="col-6 mb-3">
                        <label class="text-label">Nome Fantasia</label>
                        <input type="text" name="nome_fantasia" value="<?php echo isset($contato->nome_fantasia) ? $contato->nome_fantasia : null ?>" class="form-campo">
                    </div>

                    <!--CPF-->
                    <div class="col-3 mb-3">
                        <label class="text-label">CPF</label>
                        <input type="text" name="cpf" value="<?php echo isset($contato->cpf) ? $contato->cpf : null ?>"  placeholder="Digite aqui..." class="form-campo mascara-cpf">
                    </div>

                    <!--RG-->
                    <div class="col-3 mb-3">
                        <label class="text-label">RG</label>
                        <input type="text" name="rg" value="<?php echo isset($contato->rg) ? $contato->rg : null ?>" placeholder="Digite aqui..." class="form-campo">
                    </div>


                    <!--CNPJ-->
                    <div class="col-3 mb-3">
                        <label class="text-label">CNPJ</label>
                        <input type="text" name="cnpj" value="<?php echo isset($contato->cnpj) ? $contato->cnpj : null ?>" placeholder="Digite aqui..." class="form-campo mascara-cnpj">
                    </div>

                    <!--IE-->
                    <div class="col-3 mb-3">
                        <label class="text-label">IE</label>
                        <input type="text" name="ie" value="<?php echo isset($contato->ie) ? $contato->ie : null ?>" placeholder="Digite aqui..." class="form-campo">
                    </div>

                    <!--Fone-->
                    <div class="col-3 mb-3">
                        <label class="text-label">Fone:</label>
                        <input type="text" name="fone" value="<?php echo isset($contato->fone) ? $contato->fone : null ?>" placeholder="Digite aqui..." class="form-campo mascara-fone">
                    </div>

                    <!--Celular-->
                    <div class="col-3 mb-3">
                        <label class="text-label">Celular:</label>
                        <input type="text" name="celular" value="<?php echo isset($contato->celular) ? $contato->celular : null ?>" placeholder="Digite aqui..." class="form-campo mascara-celular">
                    </div>

                    <!--Email-->
                    <div class="col-4 mb-3">
                        <label class="text-label">E-mail</label>
                        <input type="text" name="email" value="<?php echo isset($contato->email) ? $contato->email : null ?>" placeholder="Digite aqui..." class="form-campo">
                    </div>

                    <!--Senha-->
                    <div class="col-2 mb-3">
                        <label class="text-label">Senha</label>
                        <input type="password" name="senha" value="<?php echo isset($contato->senha) ? $contato->senha : null ?>" placeholder="Digite aqui..." class="form-campo">
                    </div>

                    <!--Data Cadastro-->
                    <div class="col-3 mb-3">
                        <label class="text-label">Data Cadastro</label>
                        <input type="date" name="data_cadastro" value="<?php echo isset($contato->data_cadastro) ? $contato->data_cadastro : null ?>"
                            placeholder="Digite aqui..." class="form-campo">
                    </div>

                    <!-- <div class="col-1 mb-3">
                        <label class="text-label">DDD:</label>
                        <input type="text" name="ddd" value="" placeholder="Digite aqui..." class="form-campo">
                    </div> -->

                    <!--Ativo-->
                    <div class="col-2">
                        <label class="text-label">Ativo</label>
                        <select class="form-campo" name="ativo">
                            <option value="S" <?php echo (isset($contato->ativo) == "S") ? "selected" : "" ?>>Sim</option>
                            <option value="N" <?php echo (isset($contato->ativo) == "N") ? "selected" : "" ?>>Não</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div id="tab-2">
            <div class="p-2">
                <span class="d-block mt-4 h4 border-bottom text-uppercase">Endereço</span>
                <div class="rows">

                    <!--CEP-->
                    <div class="col-2 mb-3">
                        <label class="text-label">CEP</label>
                        <div class="input-grupo">
                            <input type="text" value="<?php echo isset($contato->cep) ? $contato->cep : null ?>" name="cep" id="cep" placeholder="Digite aqui..."
                                class="form-campo mascara-cep busca_cep">

                        </div>
                    </div>

                    <!--Logradouro-->
                    <div class="col-6 mb-3">
                        <label class="text-label">Logradouro</label>
                        <input type="text" name="logradouro" id="logradouro" value="<?php echo isset($contato->logradouro) ? $contato->logradouro : null ?>"
                            placeholder="Digite aqui..." class="form-campo rua">
                    </div>

                    <!--Complemento-->
                    <div class="col-4 mb-3">
                        <label class="text-label">Complemento</label>
                        <input type="text" name="complemento" id="complemento" value="<?php echo isset($contato->complemento) ? $contato->complemento : null ?>"
                            placeholder="Digite aqui..." class="form-campo">
                    </div>

                    <!--Numero-->
                    <div class="col-1 mb-4">
                        <label class="text-label">Numero</label>
                        <input type="text" name="numero" id="numero" value="<?php echo isset($contato->numero) ? $contato->numero : null ?>"
                            placeholder="Digite aqui..." class="form-campo">
                    </div>

                    <!--Bairro-->
                    <div class="col-6 mb-3">
                        <label class="text-label">Bairro</label>
                        <input type="text" name="bairro" id="bairro" value="<?php echo isset($contato->bairro) ? $contato->bairro : null ?>"
                            placeholder="Digite aqui..." class="form-campo bairro">
                    </div>

                    <!--UF-->
                    <div class="col-1 mb-2">
                        <label class="text-label">UF</label>
                        <input type="text" name="uf" id="uf" value="<?php echo isset($contato->uf) ? $contato->uf : null ?>" placeholder="Digite aqui..."
                            class="form-campo estado">
                    </div>

                    <!--Cidade-->
                    <div class="col-4 mb-2">
                        <label class="text-label">Cidade</label>
                        <input type="text" name="cidade" id="cidade" value="<?php echo isset($contato->cidade) ? $contato->cidade : null ?>"
                            placeholder="Digite aqui..." class="form-campo cidade">
                    </div>
                </div>
            </div>
        </div>

        <div id="tab-3">
            <div class="p-2">
                <span class="d-block mt-4 h4 border-bottom text-uppercase">Informações Adicionais</span>
                <div class="rows">

                    <!--Insc. Estadual-->
                    <div class="col-4 mb-3">
                        <label class="text-label">Insc. Estadual</label>
                        <input type="text" name="ie" value="" placeholder="Digite aqui..." class="form-campo">
                    </div>

                    <!--Insc. Municipal-->
                    <div class="col-4 mb-3">
                        <label class="text-label">Insc. Municipal</label>
                        <input type="text" name="im" value="" placeholder="Digite aqui..." class="form-campo">
                    </div>

                    <!--Suframa-->
                    <div class="col-4 mb-3">
                        <label class="text-label">Suframa</label>
                        <input type="text" name="suframa" value="" placeholder="Digite aqui..." class="form-campo">
                    </div>

                    <!--RG-->
                    <div class="col-4 mb-3">
                        <label class="text-label">RG</label>
                        <input type="text" name="rg" value="" placeholder="Digite aqui..." class="form-campo">
                    </div>

                    <!--Cód. Estrangeiro-->
                    <div class="col-4 mb-3">
                        <label class="text-label">Cód. Estrangeiro</label>
                        <input type="text" name="cod_estrangeiro" value="" placeholder="Digite aqui..."
                            class="form-campo">
                    </div>

                    <!--IE Subst. Trib-->
                    <div class="col-4 mb-3">
                        <label class="text-label">IE Subst. Trib.</label>
                        <input type="text" name="ie_subt_trib" value="" placeholder="Digite aqui..." class="form-campo">
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-12 text-center pb-4">
        <input type="hidden" name="id_contato" value="<?php echo (isset($contato->id_contato)) ? $contato->id_contato : null ?>">
        <input type="submit" value="Salvar" class="btn btn-laranja m-auto">
    </div>
</form>