<?php include_once '../Include_once/conexao.php';
$idAnuncio = $_GET['idAnuncio'];

$sql = "DELETE FROM anuncios WHERE idAnuncio ='$idAnuncio'";
if (mysqli_query($mysqli, $sql)) {
header("Location: ../PHP/index.php");//javascript:history.back()
} else {
echo "Error: " . $sql . ":-" . mysqli_error($mysqli);
}