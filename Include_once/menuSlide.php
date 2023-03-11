<div class="wui-side-menu open pinned" data-wui-theme="dark">
    <div class="wui-side-menu-header">
        <a href="#" class="wui-side-menu-trigger"><i class="fa fa-bars"> Filtros</i></a>
        <a href="#" class="wui-side-menu-pin-trigger"> </a>
    </div>

    <ul class="wui-side-menu-items">
        <form action="pesquisa.php" method="GET">
            <?php
            $pesquisa2 = $_GET['pesquisa'];
            if ($pesquisa2 == null) {
                $pesquisa2 = "O que procuras?";
            }
            $precoMinimo2 = $_GET['precoMin'];
            if ($precoMinimo2 == null) {
                $precoMinimo2 = "Min: ";
            } else {
                $precoMinimo2 = $precoMinimo2 . "€";
            }
            if ($precoMinimo2 < 0) {
                $precoMinimo2 = 0;
            }


            $precoMaximo2 = $_GET['precoMax'];
            if ($precoMaximo2 == null) {
                $precoMaximo2 = "Max: ";
            } else {
                $precoMaximo2 = $precoMaximo2 . "€";
            }
            if ($precoMaximo2 < 0) {
                $precoMaximo2 = 0;
            }
            // if ($precoMinimo2 > $precoMaximo2) {
            //     $precoMaximo2 = $precoMinimo;
            // }
            ?>
            <input type="text" id="search-bar" class="menu" for="pesquisa" name="pesquisa" placeholder="<?php echo $pesquisa2 ?>">

            Preço:<br>
            <input type="number" id="search-bar" class="preco" name="precoMin" placeholder="<?php echo $precoMinimo2 ?>">
            <input type="number" id="search-bar" class="preco" name="precoMax" placeholder="<?php echo $precoMaximo2 ?>">

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

            <a href="../PHP/pesquisa.php">Limpar</a>

            <button type="submit" class="custom-btn" id="filtrar">Filtrar</button>
        </form>
    </ul>
</div>

<div class="wui-content">
    <div class="wui-content-header">
        <a href="#" class="wui-side-menu-trigger" id="menuFechado"><i class="fa fa-bars"></i> Filtros</a> 
        <!-- Menu fechado -->