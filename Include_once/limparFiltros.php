<?php
include_once('conexao.php');
$idUser = $_GET['idUser'];
$deletFiltros = $con->query("DELETE FROM filtros WHERE idUser ='$idUser'")->fetchAll();
header('Location: ../PHP/anuncios.php');
