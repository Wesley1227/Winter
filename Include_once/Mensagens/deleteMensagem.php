<?php
include_once('../conexao.php');
include_once('../../Login/protect.php');
$idUser = $_SESSION['idUser'];
$idChat = $_GET['idChat'];
$mensagem = "Mensagem apagada";
// $result2 = $con->query("UPDATE chat SET mensagem ='$mensagem' WHERE idChat='$idChat'")->fetchAll();
$result2 = $con->query("DELETE FROM chat WHERE idChat='$idChat'")->fetchAll();
header("Location: " . $_SERVER['HTTP_REFERER'] . "");
// if($result2['mensagem'] = $mensagem){
//     $result2 = $con->query("DELETE FROM chat WHERE idChat='$idChat'")->fetchAll();
// }