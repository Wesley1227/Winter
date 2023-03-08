<div class="wui-side-menu open pinned" data-wui-theme="dark">
    <div class="wui-side-menu-header">
        <a href="#" class="wui-side-menu-trigger"><i class="fa fa-bars"> Filtros</i></a>
        <a href="#" class="wui-side-menu-pin-trigger"> </a>
    </div>

    <ul class="wui-side-menu-items">
        <form action="pesquisa.php" method="get">
            <input type="text" id="search-bar" class="menu" for="pesquisa" name="pesquisa" placeholder="O que procuras?">

            Preço:<br>
            <input type="number" id="search-bar" class="preco" name="precoMin" placeholder="Mín:">
            <input type="number" id="search-bar" class="preco" name="precoMax" placeholder="Max:">

            <select name="" id="selectCategorias" class="dropdown-select">
                <option value="">Categoria</option>
                <option value="2">Novo</option>
                <option value="3">Semi-novo</option>
                <option value="4">Usado</option>
                <option value="5">Estragado</option>
            </select>

            <select name="" id="selectCategorias" class="dropdown-select">
                <option value="">Subcategoria</option>
                <option value="opcao1">Vender</option>
                <option value="2">Trocar</option>
                <option value="3">Doar</option>
                <option value="4">Comprar</option>
            </select>

            <select name="" id="selectCategorias" class="dropdown-select">
                <option value="">Sub-subcategoria</option>
                <option value="opcao1">Vender</option>
                <option value="2">Trocar</option>
                <option value="3">Doar</option>
                <option value="4">Comprar</option>
            </select><br><br>

            <a href="">Limpar</a>


            <button type="submit" class="custom-btn" id="filtrar">Filtrar</button>
        </form>
    </ul>
</div>

<div class="wui-content">
    <div class="wui-content-header">
        <a href="#" class="wui-side-menu-trigger" id="menuFechado"><i class="fa fa-bars"></i> Filtros</a> <!-- Menu fechado -->