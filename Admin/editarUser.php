<?php
include('../login/protect.php');
include_once '../Include_once/conexao.php';
$titulo = "Utilizadores";
$pagina = "Admin - " . $titulo;
include_once '../Include_once/head.php';

$id = $_GET['id'];
$query = "SELECT * FROM user WHERE idUser = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<form action="atualizarUser.php" method="post">
    <input type="hidden" name="id" value="<?php echo $user['idUser']; ?>">
    Usuário: <input type="text" name="user" value="<?php echo $user['user']; ?>"><br>
    Email: <input type="text" name="email" value="<?php echo $user['email']; ?>"><br>
    Nome: <input type="text" name="nome" value="<?php echo $user['nome']; ?>"><br>
    Apelido: <input type="text" name="apelido" value="<?php echo $user['apelido']; ?>"><br>
    <input type="submit" value="Atualizar">
</form>