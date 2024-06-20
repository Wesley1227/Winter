<form action="../Include_once/inserirFiltros.php" method="GET">
    <?php

    if (isset($_SESSION['idUser']) != null) {
        $idUser = $_SESSION['idUser'];
    }

    $selectFiltros = $con->query("SELECT * FROM filtros WHERE idUser ='$idUser'")->fetchAll();
    foreach ($selectFiltros as $filtros) {
    }

    if (isset($filtros['pesquisa']) != null) {
        $pesquisa = $filtros['pesquisa'];
    } else {
        $pesquisa = "O que procuras?";
    }
    ?>
    <input type="text" id="search-bar" class="menu" for="pesquisa" name="pesquisa" placeholder="<?php echo $pesquisa ?>">


    <?php
    // $precoMinimo = $_GET['precoMin'];
    //$precoMinimo = $filtros['precoMin'];
    if (isset($filtros['precoMin']) == null) {
        $precoMinimo = "Min: ";
    } else {
        $precoMinimo = $filtros['precoMin'] . "€";
    }

    // if ($precoMinimo < 0) {
    //     $precoMinimo = 0;
    // }

    // $precoMaximo = $_GET['precoMax'];

    if (isset($filtros['precoMax']) != null) {
        $precoMaximo = $filtros['precoMax'] . "€";
    } else {
        //
        $precoMaximo = "Max: ";
    }

    // if ($precoMaximo < 0) {
    //     $precoMaximo = 0;
    // }

    // if ($precoMinimo > $precoMaximo) {
    //     $precoMaximo = $precoMinimo;
    // }
    ?>
    Preço:<br>
    <input type="number" min="0" id="search-bar" class="preco" name="precoMin" placeholder="<?php echo $precoMinimo ?>">
    <input type="number" min="0" max="10000000" id="search-bar" class="preco" name="precoMax" placeholder="<?php echo $precoMaximo ?>">

    <!-- <datalist class="dataList" id="sugestoesPreco">
                <option>10</option>
                <option>50</option>
                <option>100</option>
                <option>150</option>
                <option>200</option>
            </datalist>
            <datalist class="dataList" id="sugestoesPrecoMax">
                <option>100</option>
                <option>200</option>
                <option>300</option>
                <option>500</option>
                <option>1000</option>
            </datalist> -->
    <!-- <select name="" id="selectCategorias" class="dropdown-select">
                <option value="">Categoria</option>
                <option value="2">Novo</option>
                <option value="3">Semi-novo</option>
                <option value="4">Usado</option>
                <option value="5">Estragado</option>
            </select>

            <select name="" id="selectCategorias" class="dropdown-select">
                <option value="">Subcategoria</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>

            <select name="" id="selectCategorias" class="dropdown-select">
                <option value="">Sub-subcategoria</option>
                <option value="">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select> -->

    <?php

    if (isset($filtros['ordem']) == null || (isset($filtros['ordem']) == 0)) {
        $ordem = "Ordenar por:";
    }
    if (isset($filtros['ordem']) == 1) {
        $ordem = "Relevânica";
    }
    if (isset($filtros['ordem']) == 2) {
        $ordem = "Mais recente";
    }
    if (isset($filtros['ordem']) == 3) {
        $ordem = "Preço ascendente";
    }
    if (isset($filtros['ordem']) == 4) {
        $ordem = "Preço descendente";
    }

    // if (isset($filtros['ordem']) != null || $filtros['ordem'] != 0) {
    //     $ordem = $filtros['ordem'];
    // }
    ?>
    <select name="ordem" id="selectCategorias" class="dropdown-select">
        <option value=""><?php echo $ordem ?></option>
        <option value="1">Relevânica</option>
        <option value="2">Mais recente</option>
        <option value="3">Preço ascendente</option>
        <option value="4">Preço descendente</option>
    </select>

    <br>

    <a href="../Include_once/limparFiltros.php?idUser=<?= $idUser ?>">Limpar</a>
    <!-- onclick="abrirModalLogin()" -->
    <?php
    if ($_SESSION["idUser"] != null) { ?>
        <button type="submit" class="custom-btn" id="filtrar">Filtrar</button>
    <?php } else {
    ?><a onclick="abrirModalLogin()" class="custom-btn" id="filtrar">Logar primeiro</a>
    <?php }
    ?>

</form>