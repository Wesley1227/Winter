<?php include_once '../Include_once/conexao.php';
include_once '../Login/protect.php';
$idUser = $_SESSION['idUser'];
$idDenunciado = $_GET['idDenunciado'];
$motivo = $_POST['motivo'];
$idChat = $_GET['idChat'];
$idAnuncio = $_GET['idAnuncio'];
$tipoDenuncia = $_GET['tipoDenuncia'];

$sql = "INSERT INTO winter.denuncias  (idUser, idDenunciado, motivo, tipoDenuncia, idChat, idAnuncio) VALUES('$idUser','$idDenunciado','$motivo','$tipoDenuncia','$idChat','$idAnuncio')";
if (mysqli_query($mysqli, $sql)) {
    echo "INSERIDO!";
    header("Location: ../PHP/conta.php");
} else {
    echo "Error: " . $sql . ":-" . mysqli_error($mysqli);
}