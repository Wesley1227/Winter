<?php
include_once 'conexao.php';
$titulo = "Inserções";
$pagina = "Winter - " . $titulo;
include_once '../Include_once/head.php';
$idPag = isset($_GET['idPag']) ? $_GET['idPag'] : 1;
?>

<body>
    <div class="menuHistorico">
        <a href="insercoes.php?idPag=1"><button style="width: 100%;" class="custom-btn <?php if ($idPag == 1) echo 'active'; ?>">Marcas</button></a>
        <a href="insercoes.php?idPag=2"><button style="width: 100%;" class="custom-btn <?php if ($idPag == 2) echo 'active'; ?>">Categorias</button></a>
        <a href="insercoes.php?idPag=2"><button style="width: 100%;" class="custom-btn <?php if ($idPag == 3) echo 'active'; ?>">Outro</button></a>
    </div>

    <?php
    if ($idPag == 1) {
        include_once('marca.php');
    } elseif ($idPag == 2) {
        include_once('categorias.php');
    }
    ?>

</body>

</html>