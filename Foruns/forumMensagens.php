<?php
include_once '../Include_once/conexao.php';
include_once('../Login/protect.php');
$idForum = $_GET['idForum'];
$idUser = $_SESSION['idUser'];

// Verificar participação no fórum
$sqlCheckParticipant = "SELECT * FROM forumparticipante WHERE idUser=:idUser AND idForum=:idForum";
$stmtCheckParticipant = $con->prepare($sqlCheckParticipant);
$stmtCheckParticipant->bindParam(':idUser', $idUser, PDO::PARAM_INT);
$stmtCheckParticipant->bindParam(':idForum', $idForum, PDO::PARAM_INT);
$stmtCheckParticipant->execute();
$participant = $stmtCheckParticipant->fetch();

// Se o usuário não é participante, inserir como participante
if (!$participant) {
    $sqlInsertParticipant = "INSERT INTO forumparticipante (idUser, idForum) VALUES (:idUser, :idForum)";
    $stmtInsertParticipant = $con->prepare($sqlInsertParticipant);
    $stmtInsertParticipant->bindParam(':idUser', $idUser, PDO::PARAM_INT);
    $stmtInsertParticipant->bindParam(':idForum', $idForum, PDO::PARAM_INT);
    $stmtInsertParticipant->execute();
}

// Listagem de mensagens
$sql = "SELECT mensagem.*, user.nome, user.fotoPerfil FROM mensagem 
        JOIN user ON mensagem.idUser = user.idUser 
        WHERE idForum=:idForum ORDER BY dataEnvio DESC";
$stmt = $con->prepare($sql);
$stmt->bindParam(':idForum', $idForum, PDO::PARAM_INT);
$stmt->execute();
$mensagens = $stmt->fetchAll();

foreach ($mensagens as $msg) :
    $classeCSS = ($msg['idUser'] == $idUser) ? 'minha-mensagem' : '';
?>
<div class="mensagem4-container <?= $classeCSS ?>">
    <a href="../PHP/perfil.php?idUser=<?= $msg['idUser'] ?>">
        <img src="../uploads/<?= $msg['fotoPerfil'] ?? 'semFotoPerfil.png' ?>" class="fotoPerfil" />
    </a>
    <div>
        <div class="usuario4"><?= htmlspecialchars($msg['nome']) ?></div>
        <div class="texto4"><?= htmlspecialchars($msg['mensagem']) ?></div>
    </div>
</div>
<?php endforeach; ?>
