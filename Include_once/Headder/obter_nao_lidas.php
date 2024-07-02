<?php
include_once('conexao.php');
session_start();

$idUser = isset($_SESSION['idUser']) ? $_SESSION['idUser'] : 0;
$naoLidas = $con->query("SELECT COUNT(idDestinatario) as count FROM chat WHERE idDestinatario = $idUser AND visualizacao = 1")->fetch()["count"];
echo $naoLidas;
?>
