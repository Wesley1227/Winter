<?php
include_once('conexao.php');

$id = $_GET['id'];
$query = "DELETE FROM user WHERE idUser = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: users.php");
} else {
    echo "Erro ao deletar o usuário: " . $mysqli->error;
}

$stmt->close();
?>
