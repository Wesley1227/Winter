<?php
include_once('conexao.php');
include_once('../Login/protect.php');

$idUser = $_SESSION['idUser'];
$pesquisa = $_GET['pesquisa'];
$precoMin = $_GET['precoMin'];
$precoMax = $_GET['precoMax'];
$ordem = $_GET['ordem'];
if (!isset($idUser) || $idUser == null) {
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
  }
$selectFiltros = $con->query("SELECT * FROM filtros WHERE idUser ='$idUser'")->fetchAll();
foreach ($selectFiltros as $filtros) {
}
if ($pesquisa ==  null) {
    $pesquisa = $filtros['pesquisa'];
} else {
    $pesquisa = $_GET['pesquisa'];
}

if ($precoMin ==  null) {
    $precoMin = $filtros['precoMin'];
} else {
    $precoMin = $_GET['precoMin'];
}
if ($precoMax ==  null) {
    $precoMax = $filtros['precoMax'];
} else {
    $precoMax = $_GET['precoMax'];
}
if ($ordem ==  null) {
    $ordem = $filtros['ordem'];
} else {
    $ordem = $_GET['ordem'];
}

if ($filtros['idUser'] == $idUser) {
    $queryFiltros = "UPDATE filtros SET pesquisa = '$pesquisa', precoMin = '$precoMin',precoMax = '$precoMax',ordem = '$ordem' WHERE idUser = $idUser";
} else {
    $queryFiltros = "INSERT INTO filtros (idUser,pesquisa,precoMin,precoMax,ordem) 
    VALUES('$idUser','$pesquisa','$precoMin','$precoMax','$ordem')";
}

$insertFiltros = $con->query($queryFiltros)->fetchAll();
header('Location: ../PHP/pesquisa.php');
