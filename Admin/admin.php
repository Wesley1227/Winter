<?php include_once 'conexao.php';
$titulo = "Admin";
$pagina = "Winter - " . $titulo;
include_once '../Include_once/head.php';
$resultadoSub = $conn->query($querySub);
?>

<body>
    <br><br>

    <!-- //////////////////// MARCAS \\\\\\\\\\\\\\\\\\ -->
    <form action="../Admin/inserirMarca.php" method="POST">
        <label for="marca">Marca:</label>
        <input name="marca" type="text"></input>
        <button type="submit">Inserir</button>
    </form><br>


    <!-- //////////////////// SUBCATEGORIAS \\\\\\\\\\\\\\\\\\ -->
    <form action="../Admin/inserirSubCategoria.php" method="POST">
        <label for="nada">Subcategoria:</label>
        <input name="nome" type="text"></input>
        <select name="idCategoria">
            <option value="">Categoria</option>
            <option value="1">Informática</option>
            <option value="2">Mobilidade</option>
            <option value="3">Agricultura</option>
            <option value="4">Vestuário</option>
            <option value="5">Móveis</option>
            <option value="6">Imóveis</option>
            <option value="7">Empregos</option>
            <option value="8">Serviços</option>
            <option value="9">Veículos</option>
            <option value="10">Animais</option>
            <option value="11">Desporto</option>
            <option value="12">Outros</option>
        </select>
        <button type="submit">Inserir</button>
    </form><br>


    <!-- //////////////////// SUB-SUBCATEGORIAS \\\\\\\\\\\\\\\\\\ -->
    <form action="../Admin/inserirSubSubCategoria.php" method="POST">
        <label for="nada">Sub-subcategoria:</label>
        <input name="nome" type="text"></input>
        <select name="idSubCategoria">
            <option value="">Subcategoria</option>
            <?php
            if ($resultadoSub->num_rows > 0) {
                while ($row = $resultadoSub->fetch_assoc()) {
                    echo '<option value=' . $row['id'] . '>' . $row['nome'] . '</option>';
                }
            } ?>
        </select>
        <button type="submit">Inserir</button>
    </form>


</body>

</html>