<?php
include_once '../Include_once/conexao.php';
include_once('../Login/protect.php');

$idUser = $_SESSION['idUser'];

// Criação de fórum
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $criador = $idUser;
    $sql = "INSERT INTO foruns (nome, criador) VALUES (:nome, :criador)";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':criador', $criador, PDO::PARAM_INT);
    $stmt->execute();
    $idForum = $con->lastInsertId();
    header("Location: foruns.php?idForum=$idForum");
    exit();
}

$titulo = "Fórum";
$pagina = "Winter - " . $titulo;
$logo = "../img/5.png";
include_once '../Include_once/head.php';

// Listagem de fóruns
$sql = "SELECT * FROM foruns ORDER BY dataCriacao DESC";
$result = $con->query($sql)->fetchAll();
?>
<form method="POST" action="">
    <input type="text" minlength="2" name="nome" placeholder="Nome do Fórum" required>
    <button type="submit">Criar Fórum</button>
</form>
