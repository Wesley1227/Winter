<?php
// Teste
include_once('conexao.php');

session_start();

$idUser = $_SESSION['idUser'];
$idChat = $_POST['idChat']; 

// Marcar mensagem como lida
$query = "UPDATE chat SET visualizacao = 1 WHERE idChat = ? AND idDestinatario = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('ii', $idChat, $idUser);
$stmt->execute();
