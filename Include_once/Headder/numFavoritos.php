<div id="atualizar">
    <?php
    if (isset($_SESSION['idUser']) == null) {
        $idUser = "0";
    } else {
        $idUser = $_SESSION['idUser'];
    }
    $numFavoritos = $con->query("SELECT COUNT(idUser) count FROM anunciosFavoritos WHERE idUser= $idUser")->fetch()["count"];
    if ($numFavoritos == null) {
        $numFavoritos = "0";
    }
    ?>
</div>