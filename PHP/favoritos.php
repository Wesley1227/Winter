<?php
include_once '../Include_once/conexao.php';
$titulo = "Favoritos";
$pagina = "Winter - " . $titulo;
$logo = "../img/logo.png";

error_reporting(0);
$idPag = $_GET['idPag'];
if ($idPag == null) {
    $idPag = 1;
}
// if ($idPag == 2) {
//     $logo = "../img/logo.png";
// }
include_once '../Include_once/head.php'; ?>

<body>

    <div class="menuFavoritos">
        <?php if ($idPag == 1) {
            $pagAnuncios = "background-color: #504F4F;";
        } else {
            $pagPesquisas = "background-color: #504F4F;";
        } ?>
        <a href="favoritos.php?idPag=1"><button style="<?= $pagAnuncios ?>" class="custom-btn" id="perfilBTN">Anúncios</button></a>
        <a href="favoritos.php?idPag=2"><button style="<?= $pagPesquisas ?>" class="custom-btn" id="perfilBTN">Pesquisas</button></a>
    </div>
    <?php
    if ($idPag == 1) { ?>
        <form action="anuncio.php" method="POST">
            <div class="anuncios">
                <?php include_once('../Include_once/favoritos/anuncios.php'); ?>
            </div>
        </form> <?php
            }
            $resultCOUNT = $con->query("SELECT COUNT(idUser) AS count FROM anunciosFavoritos WHERE idUser ='$idUserSESSION'");
            $countRow = $resultCOUNT->fetch();
            $quantidade = $countRow["count"];
            if ($quantidade == null && $idPag == 1) {
                ?> <div class="semFavoritos"> Vazio </div>
    <?php
            }
            if ($idPag == 2) {

                include_once('../Include_once/favoritos/pesquisas.php');
            }
    ?>
















</body>
<?php include_once '../Include_once/footer.php'; ?>

</html>