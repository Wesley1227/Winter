<?php
include_once('../Include_once/conexao.php');

$email = $_POST['email'];
$senha = $_POST['senha'];

$result = $conn->query("SELECT * FROM user WHERE (email='$email' OR user='$email' OR nif='$email') AND senha='$senha'");

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    session_start();
    $_SESSION['idUser'] = $user['idUser'];
    $_SESSION['user'] = $user['user'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['fotoPerfil'] = $user['fotoPerfil'];
    $_SESSION['timestamp_login'] = time(); 

    echo "Login bem-sucedido!";
} else {
    echo "Senha incorreta.";
}
?>