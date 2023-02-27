<?php
include_once("../Include_once/conexao.php");
include_once("../Login/protect.php");
$nome = $_SESSION['user'];
$idUser = $_SESSION['idUser'];
$mensagem = $_POST['mensagem'];
$idAnuncio = $_GET['idAnuncio'];
$idDestinatario = $_GET['idDestinatario'];
if (!empty($nome) && !empty($mensagem)) {
    $query = "INSERT INTO winter.chat SET idUser = '$idUser', idDestinatario = '$idDestinatario', idAnuncio = '$idAnuncio', nome='$nome', mensagem='$mensagem'";
    if (mysqli_query($mysqli, $query)) {
        //  header("Location: ../Chat/chat.php");
         header("Location: ".$_SERVER['HTTP_REFERER']."&&chat=1");
    } else {
        echo mysqli_error($mysqli);
    }
}
?>