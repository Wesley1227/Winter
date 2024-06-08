<?php
include_once('../Include_once/conexao.php');
$email = $_POST['email'];
$senha = $_POST['senha'];

$result = $conn->query("SELECT * FROM user WHERE (email='$email' OR user='$email') AND senha='$senha'");

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    session_start();
    $_SESSION['idUser'] = $user['idUser'];
    $_SESSION['user'] = $user['user'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['fotoPerfil'] = $user['fotoPerfil'];
    $_SESSION['timestamp_login'] = time(); // Armazena o timestamp do login

    echo "Login bem-sucedido!";
    header("Location: ".$_SERVER['HTTP_REFERER']."");
} else {

  header("Location: ".$_SERVER['HTTP_REFERER']."&LoginIncorreto");
}










// if ($result == null) {
//   // header("Location: ../login/login.php"); 
//   
//   
  
// } else {
//   
  
// }
