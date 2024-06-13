<div class="col menu-lateral position-relative">

    <nav class="menuprincipal" id="principal">
        <ul class="menu-ul icones">
            <li><a href="index.html"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="#menu_cadastro"><i class="icon fas fa-file"></i> Cadastro <span>+</span></a></li>
            <li><a href="#menu_estoque"><i class="icon fas fa-cubes"></i> Estoque <span>+</span></a></li>
            <li><a href="#menu_compras"><i class="icon fas fa-cart-plus"></i> Compras <span>+</span></a></li>
            <li><a href="#menu_producao"><i class="fas fa-tools"></i> Produção <span>+</span></a></li>
            <li><a href="#menu_financeiro"><i class="icon fas fa-hand-holding-usd"></i> Financeiro
            <span>+</span></a></li>
        </ul>
    </nav>

    <!-- MENU CADASTRO -->
    <nav class="menuprincipal" id="menu_cadastro">
        <ul class="menu-lista">
            <li class="icones"><a href="" title="Recolher menu"><i class="fas fa-arrow-left ativo"></i></a></li>
            <h1 class="tt px-2"><b><i class="far fa-fw fa-file"></i> Cadastros</b></h1>
            <div id="accordion">
                <h3>Categoria</h3>
                <ul>
                    <li><a href="<?php echo URL_BASE . "categoria" ?>"> Listar todos</a></li>
                    <li><a href="<?php echo URL_BASE . "categoria/create" ?>"> Cadastrar Novo</a></li>
                </ul>
                <h3>Unidade</h3>
                <ul>
                    <li><a href="<?php echo URL_BASE . "unidade" ?>">Lista todos</a></li>
                    <li><a href="<?php echo URL_BASE . "unidade/create" ?>"> Cadastrar novo</a></li>
                </ul>
                <h3>Produto</h3>
                <ul>
                    <li><a href="<?php echo URL_BASE . "produto" ?>">Lista todos</a></li>
                    <li><a href="<?php echo URL_BASE . "produto/create" ?>"> Cadastrar novo</a></li>
                </ul>

                <h3>Contato</h3>
                <ul>
                    <li><a href="<?php echo URL_BASE . "contato" ?>">Lista todos</a></li>
                    <li><a href="<?php echo URL_BASE . "contato/create" ?>"> Cadastrar novo</a></li>
                </ul>
                <h3>Usuário</h3>
                <ul>
                    <li><a href="lst_usuario.html">Lista</a></li>
                    <li><a href="lst_tabela.html"> Tabela</a></li>
                    <li><a href="lst_acoes.html"> Ações</a></li>
                </ul>
                <h3>Diversos</h3>
                <ul>
                    <li><a href="frm_status_entraga.html">Status entrega </a></li>
                    <li><a href="frm_status_cotacao.html">Status cotação </a></li>
                    <li><a href="frm_status_entraga.html">Status item cotação </a></li>
                    <li><a href="frm_status_ordem_compra.html">Status ordem de compra </a></li>
                    <li><a href="frm_status_producao.html">Status ordem de produção </a></li>
                    <li><a href="frm_status_pedido.html">Status pedidos</a></li>
                </ul>
            </div>
        </ul>
    </nav>

    <!-- MENU ESTOQUE -->
    <nav class="menuprincipal" id="menu_estoque">
        <ul class="menu-lista">
            <li class="icones"><a href="" title="Recolher menu"><i class="fas fa-arrow-left ativo"></i></a></li>
            <h1 class="tt px-2"><b><i class="fas fa-cubes"></i> Estoque</b></h1>

            <small><b>Movimentações</b></small>
            <li><a href="<?php echo URL_BASE . "tipomovimento" ?>">Tipo de Movimento</a></li>
            <li><a href="<?php echo URL_BASE . "localizacao" ?>">Localização</a></li>
            <li><a href="<?php echo URL_BASE . "produtolocalizacao" ?>">Produto/Localização</a></li>
            <li><a href="<?php echo URL_BASE . "entrada" ?>">Entradas avulsas</a></li>
            <li><a href="<?php echo URL_BASE . "saida" ?>">Saídas Avulsas</a></li>
            <li><a href="<?php echo URL_BASE . "transferencia" ?>">Transferência de Estoque</a></li>
            <li><a href="<?php echo URL_BASE . "movimento" ?>">Ficha Razão</a></li>
            <li><a href="saida_avulsa.html">Balanço</a></li>

            <!-- <small><b>Saídas</b></small>
            <small><b>Pedidos</b></small>
            <li><a href="pedidos.html">Pedidos</a></li>
            <small><b>Movimentações</b></small>
            <li><a href="historico_movimento.html">Historico de movimento</a></li>
            <li><a href="extrato_produto.html">Extrado produto</a></li> -->
        </ul>
    </nav>



    <!-- MENU COMPRAS -->
    <nav class="menuprincipal" id="menu_compras">
        <ul class="menu-lista">
            <li class="icones"><a href="" title="Recolher menu"><i class="fas fa-arrow-left ativo"></i></a></li>
            <h1 class="tt px-2"><b><i class="fas fa-cart-plus"></i> Compras</b></h1>
            <li><a href="<?php echo URL_BASE . "solicitacao" ?>"> Solicitação</a></li>
            <li><a href="<?php echo URL_BASE . "cotacao" ?>"> Cotação</a></li>
            <li><a href="<?php echo URL_BASE . "ordemcompra" ?>"> Ordem de compra</a></li>
        </ul>
    </nav>



    <!-- MENU PRODUÇÃO -->
    <nav class="menuprincipal" id="menu_producao">
        <ul class="menu-lista">
            <li class="icones"><a href="" title="Recolher menu"><i class="fas fa-arrow-left ativo"></i></a></li>
            <h1 class="tt px-2"><b><i class="fas fa-cubes"></i> Produções</b></h1>

            <li><a href="lst_engenharia.html">Produtos</a></li>
            <li><a href="lst_insumos.html">Insumos</a></li>
            <li><a href="lst_ordemproduto.html">Ordem de produção</a></li>

        </ul>
    </nav>

    <!-- MENU FANACEIRO CONTABIL -->
    <nav class="menuprincipal" id="menu_financeiro">
        <ul class="menu-lista">
            <li class="icones"><a href="" title="Recolher menu"><i class="fas fa-arrow-left ativo"></i></a></li>
            <h1 class="tt px-2"><b><i class="fas fa-hand-holding-usd"></i> Financeiro</b></h1>

            <small><b>Financeiro</b></small>
            <li><a href="lst_ordemcompra.html" class="nav-link text-light"> Ordem de compra</a></li>
            <li><a href="pedidos.html" class="nav-link text-light"> Pedidos</a></li>
            <li><a href="contasreceber.html" class="nav-link text-light"> Contas a receber</a></li>
            <li><a href="contasapagar.html" class="nav-link text-light"> Contas a pagar</a></li>
            <li><a href="lst_despesas.html" class="nav-link text-light"> Despesas</a></li>

            <small><b>Contábil</b></small>
            <li><a href="planodecontas.html" class="nav-link text-light"> Plano de contas</a> </li>
            <li><a href="fluxocaixa.html" class="nav-link text-light"> Fluxo de caixas</a></li>
            <li><a href="livrodiario.html" class="nav-link text-light"> livro diário</a></li>
        </ul>
    </nav>

</div>