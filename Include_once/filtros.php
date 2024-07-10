<form action="../Include_once/inserirFiltros.php" method="GET">
    <?php
    $query = "SELECT * FROM categoria ORDER BY nome";
    $queryMarca = "SELECT marca FROM marca ORDER BY marca";
    $result = $conn->query($query);
    $resultadoMarca = $conn->query($queryMarca);
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
    <input type="text" id="search-bar" class="menu" for="pesquisa" name="pesquisa"
        placeholder="<?php echo $pesquisa ?>">


    <?php
    if (isset($filtros['precoMin']) == null) {
        $precoMinimo = "Min: ";
    } else {
        $precoMinimo = $filtros['precoMin'] . "€";
    }


    if (isset($filtros['precoMax']) != null) {
        $precoMaximo = $filtros['precoMax'] . "€";
    } else {
        $precoMaximo = "Max: ";
    }

    if ($precoMaximo < 0) {
        $precoMaximo = 0;
    }

    if ($precoMinimo > $precoMaximo) {
        $precoMinimo = $precoMaximo;
    }
    ?>
    Preço:<br>
    <input type="number" min="0" id="search-bar" class="preco" name="precoMin" placeholder="<?php echo $precoMinimo ?>">
    <input type="number" min="0" max="10000000" id="search-bar" class="preco" name="precoMax"
        placeholder="<?php echo $precoMaximo ?>">

    <?php
    if (isset($filtros['ordem'])) {
        $ordem_id = $filtros['ordem'];
        if ($ordem_id == 1) {
            $ordem = "Relevância";
        } else if ($ordem_id == 2) {
            $ordem = "Mais recente";
        } else if ($ordem_id == 3) {
            $ordem = "Preço mais baixo";
        } else if ($ordem_id == 4) {
            $ordem = "Preço mais alto";
        } else {
            $ordem = "Ordenar por:";
        }
    } else {
        $ordem = "Ordenar por:";
    }



    // if (isset($filtros['ordem']) != null || $filtros['ordem'] != 0) {
    // $ordem = $filtros['ordem'];
    // }
    ?>
    <select name="ordem" id="selectCategorias" class="dropdown-select">
        <option value=""><?php echo $ordem ?></option>
        <option value="1">Relevânica</option>
        <option value="2">Mais recente</option>
        <option value="3">Preço mais baixo</option>
        <option value="4">Preço mais alto</option>
    </select>
    <select name="categoria" id="selectCategorias" onchange="FetchSubCategoria(this.value)" class="dropdown-select">
        <option value="">Categoria</option>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<option value=' . $row['id'] . '>' . $row['nome'] . '</option>';
            }
        } ?>
    </select><br><br>
    <select name="subCategoria" id="subCategoria" style="width: 90%" onchange="FetchSubSubCategoria(this.value)"
        class="dropdown-select">
        <option value="">Subcategoria</option>
    </select><br><br>

    <select name="subSubCategoria" id="subSubCategoria" style="width: 90%" class="dropdown-select">
        <option value="">Sub-Subcategoria</option>
    </select><br>
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
<!-- Inclua o JavaScript do Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    // Ativar Select2 nos selects
    $(document).ready(function () {
        $('select').select2();
    });
</script>
<script>


    // Scrip para mostar subCategorias quando o user escolher a categoria desejada.
    function FetchSubCategoria(id) {
        $('#subCategoria').html('');
        $('#subSubCategoria').html('<option>Selecione subSubCategoria</option>');
        $.ajax({
            type: 'post',
            url: '../Include_once/sub_categorias.php',
            data: {
                idCategoria: id
            },
            success: function (data) {
                $('#subCategoria').html(data);
            }
        })
    }
    // Scrip para mostar subSubCategorias quando o user escolher a subCategoria desejada.
    function FetchSubSubCategoria(id) {
        $('#subSubCategoria').html('');
        $.ajax({
            type: 'post',
            url: '../Include_once/sub_categorias.php',
            data: {
                idSubCategoria: id
            },
            success: function (data) {
                $('#subSubCategoria').html(data);
            }
        })
    }
</script>