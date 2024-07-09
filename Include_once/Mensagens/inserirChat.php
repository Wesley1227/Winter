<?php
include_once("../conexao.php");
include_once("../../Login/protect.php");

$idUser = $_SESSION['idUser']; // USER LOGADO
$nome = $_SESSION['user']; // NOME DO USER LOGADO
$mensagem = $_GET['mensagem']; // MENSAGEM ENVIADA
$idAnuncio = $_GET['idAnuncio']; // O ANÚNCIO 
$idDestinatario = $_GET['idUser']; // DESTINATÁRIO QUE RECEBERÁ A MENSAGEM
$lido = "1"; // 1 = MENSAGEM LIDA

if ($idDestinatario == null || $idDestinatario == 0 || $idUser == null || $idUser == 0) {
    header("Location: " . $_SERVER['HTTP_REFERER'] . "");
}

if ($idDestinatario == null || $idDestinatario == 0) {
    // header("Location: " . $_SERVER['HTTP_REFERER'] . "");
} else {
    $insert = " idUser = '$idUser', idAnuncio = '$idAnuncio', idDestinatario='$idDestinatario', nome='$nome', mensagem='$mensagem'";
}

if (!empty($nome) && !empty($mensagem) && !empty($idUser)) {
    $query = "INSERT INTO winter.chat SET " . $insert;
    if (mysqli_query($mysqli, $query)) {
        // Adiciona XP para o usuário logado
        adicionarXP($idUser, 50);

        header("Location: " . $_SERVER['HTTP_REFERER'] . "&&chat=1");
    } else {
        echo mysqli_error($mysqli);
    }
}

// Função para adicionar XP
function adicionarXP($userId, $xp) {
    global $mysqli;
    $query = "UPDATE winter.user SET xp = xp + $xp WHERE idUser = $userId";
    mysqli_query($mysqli, $query);
}
?>
