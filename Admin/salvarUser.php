<?php
include_once('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['user'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nome = $_POST['nome'];
    $apelido = $_POST['apelido'];

    $query = "INSERT INTO user (user, email, senha, nome, apelido) VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("sssss", $user, $email, $senha, $nome, $apelido);

    if ($stmt->execute()) {
        header("Location: users.php");
    } else {
        echo "Erro ao salvar o usuário: " . $mysqli->error;
    }

    $stmt->close();
}
