<div id="atualizar">
    <?php
    session_start();
    include_once '../conexao.php';
    $idUser = $_SESSION['idUser'];
    if ($idUser == null) {
        $idUser = "0";
    }
    $naoLidas = $con->query("SELECT COUNT(idDestinatario) count FROM chat WHERE idDestinatario= $idUser AND visualizacao = 1")->fetch()["count"];
    if ($naoLidas == null) {
        $naoLidas = "0";
    }
    ?>
</div>




