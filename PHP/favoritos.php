<?php
include_once '../Include_once/conexao.php';
$titulo = "Favoritos";
$pagina = "Winter - " . $titulo;
include_once '../Include_once/head.php';
$idPag = $_GET['idPag'];
if ($idPag == null) {
    $idPag = 1;
}
?>

<body>
    <div class="menuFavoritos">
        <a href="favoritos.php?idPag=1"><button class="custom-btn" id="perfilBTN">Anúncios</button></a>
        <a href="favoritos.php?idPag=2"><button class="custom-btn" id="perfilBTN">Pesquisas</button></a>
    </div>
    <?php
    if ($idPag == 1) {
        include_once('../Include_once/favoritos/anuncios.php');
    }
    if ($idPag == 2) {
        include_once('../Include_once/favoritos/pesquisas.php');
    }
    ?>
















</body>
<?php include_once '../Include_once/footer.php'; ?>

</html>