<?php
include_once('../Include_once/conexao.php');
$email = $_POST['email'];
$senha = $_POST['senha'];
$result = $con->query("SELECT * FROM user WHERE email='$email' AND senha='$senha' OR user='$email' AND senha='$senha'")->fetchAll();
foreach ($result as $user) :
  session_start();
  $_SESSION['idUser'] = $user['idUser'];
  $_SESSION['user'] = $user['user'];
  $_SESSION['email'] = $user['email'];
  $_SESSION['fotoPerfil'] = $user['fotoPerfil'];
  $_SESSION['timestamp_login'] = time(); // Armazena o timestamp do login

endforeach;
if ($result == null) {
  // header("Location: ../login/login.php"); 
  echo "<script>alert('Login incorreto!');</script>";
} else {
  header("Location: ../PHP/index.php");
  
}
