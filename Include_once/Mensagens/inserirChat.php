<?php
include_once("../conexao.php");
include_once("../../Login/protect.php");
$idUser = $_SESSION['idUser']; // USER LOGADO
$nome = $_SESSION['user']; // NOME DO USER LOGADO
$mensagem = $_GET['mensagem']; // MENSAGEM ENVIADA
$idAnuncio = $_GET['idAnuncio']; // O ANÚNCIO 
$idDestinatario = $_GET['idUser']; // DESTINATÁRIO QUE RECEBERÁ A MENSAGEM
$lido = "1"; // 1 = MENSAGEM LIDA


if ($idUser2 == null || $idUser2 == 0) {
    header("Location: javascript:history.back()");
} // Caso tente conversar com alguém que não existe, volta atrás


if ($idDestinatario == null || $idDestinatario == 0) {
    // header("Location: " . $_SERVER['HTTP_REFERER'] . "");
} else {
    $insert = " idUser = '$idUser', idAnuncio = '$idAnuncio', idDestinatario='$idDestinatario', nome='$nome', mensagem='$mensagem'";
}
if (!empty($nome) && !empty($mensagem)) {
    $query = "INSERT INTO winter.chat SET " . $insert;
        $conn->query($query);
        // header("Location: " . $_SERVER['HTTP_REFERER'] . "");
    } 
    else {
        echo "Erro ao inserir: ";
    }


//    $insert = " idUser = '$idUser', idAnuncio = '$idAnuncio', idDestinatario='$idDestinatario', nome='$nome', mensagem='$mensagem'";
