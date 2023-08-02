
<?php
// error_reporting(0);
include_once('../Include_once/conexao.php');
$user = $_GET['user'];
$email = $_GET['email'];
$senha = $_GET['senha'];
$query = "INSERT INTO winter.user (user, email, senha, fotoPerfil) VALUES ('$user','$email','$senha','semFotoPerfil.png')";
if (mysqli_query($mysqli, $query)) {
} else {
  echo mysqli_error($mysqli);
}
$result = $con->query("SELECT * FROM winter.user WHERE email='$email' AND senha='$senha'")->fetchAll();
foreach ($result as $user) :
endforeach;

session_start();

$_SESSION['idUser'] = $user['idUser'];
$_SESSION['user'] = $user['user'];
$_SESSION['email'] = $user['email'];

header("Location: ../PHP/conta.php?idPag=4");