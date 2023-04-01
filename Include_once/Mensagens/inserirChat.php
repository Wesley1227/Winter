<?php
include_once("../conexao.php");
include_once("../../Login/protect.php");
$nome = $_SESSION['user'];
$idUser = $_SESSION['idUser'];
$mensagem = $_POST['mensagem'];
$idAnuncio = $_GET['idAnuncio'];
$idDestinatario = $_GET['idUser'];
$idUser2 = $_GET['idUser'];
$idAnuncio = $_GET['idAnuncio'];

if ($idUser2 == null || $idUser2 == 0) {
    header("Location: javascript:history.back()");
} // Caso tente conversar com alguém que não existe, volta atrás


if ($idDestinatario == null || $idDestinatario == 0) {
    header("Location: " . $_SERVER['HTTP_REFERER'] . "");
} else {
    $insert = " idUser = '$idUser', idAnuncio = '$idAnuncio', idDestinatario='$idDestinatario', nome='$nome', mensagem='$mensagem'";
}
if (!empty($nome) && !empty($mensagem)) {
    $query = "INSERT INTO winter.chat SET " . $insert;
    if (mysqli_query($mysqli, $query)) {
        header("Location: " . $_SERVER['HTTP_REFERER'] . "");
    } else {
        echo mysqli_error($mysqli);
    }
}
//    $insert = " idUser = '$idUser', idAnuncio = '$idAnuncio', idDestinatario='$idDestinatario', nome='$nome', mensagem='$mensagem'";