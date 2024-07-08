<?php session_start();
if (!isset($_SESSION['idUser']) || $_SESSION['idUser'] !== 1) {
    // Redireciona o usuário ou encerra a execução do script
    header("Location: ../PHP/index.php");
    exit; // Encerra a execução do script
}

// Conexão com o banco de dados
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "winter";

$conn = new mysqli($servidor, $usuario, $senha, $dbname);
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Exemplo de queries (pode adicionar outras conexões ou operações aqui)
$querySub = "SELECT * FROM subcategoria";
$queryDenuncias = "SELECT * FROM denuncias ORDER BY dataDenuncia DESC";

// Exemplo de execução de query
$resultado = $conn->query($querySub);
if (!$resultado) {
    die("Erro na consulta: " . $conn->error);
}