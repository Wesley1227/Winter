<div id="atualizar">
    <?php
    if (isset($_SESSION['idUser']) == null) {
        $idUser = "0";
    } else {
        $idUser = $_SESSION['idUser'];
    }
    $naoLidas = $con->query("SELECT COUNT(idDestinatario) count FROM chat WHERE idDestinatario= $idUser AND visualizacao = 1")->fetch()["count"];
    if (isset($naoLidas) == null) {
        $naoLidas = "0";
    }
    ?>
</div>