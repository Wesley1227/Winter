<?php
include_once '../Include_once/conexao.php';
include_once('../Login/protect.php');
$idUser = $_SESSION['idUser'];

if (isset($_GET['idForum'])) {
    $idForum = $_GET['idForum'];

    // Envio de mensagem
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $mensagem = $_POST['mensagem'];
        $sql = "INSERT INTO mensagem (idForum, idUser, mensagem) VALUES (:idForum, :idUser, :mensagem)";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':idForum', $idForum, PDO::PARAM_INT);
        $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
        $stmt->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
        $stmt->execute();
    }

    // Listagem de mensagens
    $sqlMensagens = "SELECT mensagem.*, user.nome, user.fotoPerfil FROM mensagem 
                    JOIN user ON mensagem.idUser = user.idUser 
                    WHERE idForum=:idForum ORDER BY dataEnvio DESC";
    $stmtMensagens = $con->prepare($sqlMensagens);
    $stmtMensagens->bindParam(':idForum', $idForum, PDO::PARAM_INT);
    $stmtMensagens->execute();
    $mensagens = $stmtMensagens->fetchAll();

    // Verificar se há mensagens retornadas
    $numMensagens = count($mensagens);
}
?>

<body>

    <div id="chat4">
        <?php if (isset($mensagens) && $numMensagens > 0) : ?>
            <?php foreach ($mensagens as $msg) : ?>
                <div class="mensagem4-container <?= ($msg['idUser'] == $idUser) ? 'minha-mensagem' : '' ?>">
                    <a href="../PHP/perfil.php?idUser=<?= $msg['idUser'] ?>">
                        <img src="../uploads/<?= $msg['fotoPerfil'] ?? 'semFotoPerfil.png' ?>" class="fotoPerfil" />
                    </a>
                    <div>
                        <div class="usuario4"><?= htmlspecialchars($msg['nome']) ?></div>
                        <div class="texto4"><?= htmlspecialchars($msg['mensagem']) ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p><em>Selecione um forum</em></p>
        <?php endif; ?>
        
       
    </div>



    <script>
        function ajax() {
            var req = new XMLHttpRequest();
            req.onreadystatechange = function() {
                if (req.readyState == 4 && req.status == 200) {
                    document.getElementById('chat4').innerHTML = req.responseText;
                }
            }
            req.open('GET', 'forumMensagens.php?idForum=<?= $idForum ?>', true);
            req.send();
        }
        setInterval(function() {
            ajax();
        }, 1000);
    </script>

</body>

</html>