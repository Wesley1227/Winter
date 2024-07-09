<?php
include_once('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $user = $_POST['user'];
    $email = $_POST['email'];
    $nome = $_POST['nome'];
    $apelido = $_POST['apelido'];

    $query = "UPDATE user SET user = ?, email = ?, nome = ?, apelido = ? WHERE idUser = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ssssi", $user, $email, $nome, $apelido, $id);

    if ($stmt->execute()) {
        header("Location: users.php");
    } else {
        echo "Erro ao atualizar o usuário: " . $mysqli->error;
    }

    $stmt->close();
}
?>
