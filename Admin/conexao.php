<?php session_start();
if (!isset($_SESSION['idUser']) && $_SESSION['idUser'] != 1) {
    header("Location: ../PHP/index.php");
    exit;
}

$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "winter";

$conn = new mysqli($servidor, $usuario, $senha, $dbname);
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$querySub = "SELECT * FROM subcategoria";
$queryDenuncias = "SELECT * FROM denuncias WHERE status !='Apagado' ORDER BY status ASC";

$resultado = $conn->query($querySub);
if (!$resultado) {
    die("Erro na consulta: " . $conn->error);
}

$mysqli = new mysqli("localhost", "root", "", "winter");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
