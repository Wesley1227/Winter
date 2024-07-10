<?php
include_once 'conexao.php';
$titulo = "Denúncias";
$pagina = "Winter - " . $titulo;
include_once '../Include_once/head.php';

// Processa o formulário de atualização de status
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['idDenuncia']) && isset($_POST['status'])) {
    $idDenuncia = $_POST['idDenuncia'];
    $novoStatus = $_POST['status'];
    $queryUpdate = "UPDATE denuncias SET status = '$novoStatus' WHERE idDenuncia = $idDenuncia";
    if ($conn->query($queryUpdate) === TRUE) {
        echo "Status atualizado com sucesso.";
    } else {
        echo "Erro ao atualizar status: " . $conn->error;
    }
}

$queryDenuncias = "SELECT * FROM denuncias"; // Certifique-se de que a variável $queryDenuncias está definida
$resultadoDenuncias = $conn->query($queryDenuncias);
?>

<body>
    <?php
    foreach ($resultadoDenuncias as $denuncias) {
        $idChat = $denuncias['idChat'];
        $queryChat = "SELECT * FROM chat WHERE idChat = $idChat";
        $resultadoChat = $conn->query($queryChat);

        if ($resultadoChat && $resultadoChat->num_rows > 0) {
            while ($mensagens = $resultadoChat->fetch_assoc()) {
                if ($denuncias['status'] == "Pendente") {
                    $status = "Pendente 🟠";
                } elseif ($denuncias['status'] == "Resolvido") {
                    $status = "Resolvido 🟢";
                } elseif ($denuncias['status'] == "Recusado") {
                    $status = "Recusado 🔴";
                } else {
                    $status = "Desconhecido";
                } 
                ?>
                <div class="denuncias">
                    <div id="denuncia">
                        ID:<?php echo $denuncias['idDenuncia']; ?><br>
                        IdUser: <a href="../PHP/perfil.php?idUser=<?= $denuncias['idUser']; ?>"><?php echo $denuncias['idUser']; ?></a><br>
                        IdDenunciado: <a href="../PHP/perfil.php?idUser=<?= $denuncias['idDenunciado']; ?>"><?php echo $denuncias['idDenunciado']; ?></a><br><br>
                        Mensagem: <?php echo $mensagens['mensagem']; ?><br><br>
                        Motivo: <?php echo $denuncias['motivo']; ?> <br><br>
                        Status: <?php echo $status; ?> <br>
                        🕒 <?php echo $denuncias['dataDenuncia']; ?><br><br>

                        <!-- Formulário para atualizar o status -->
                        <form method="post" action="">
                            <input type="hidden" name="idDenuncia" value="<?php echo $denuncias['idDenuncia']; ?>">
                            <label for="status">Alterar Status:</label>
                            <select name="status" id="status">
                                <option value="Pendente" <?php echo $denuncias['status'] == "Pendente" ? 'selected' : ''; ?>>Pendente 🟠</option>
                                <option value="Resolvido" <?php echo $denuncias['status'] == "Resolvido" ? 'selected' : ''; ?>>Resolvido 🟢</option>
                                <option value="Recusado" <?php echo $denuncias['status'] == "Recusado" ? 'selected' : ''; ?>>Recusado 🔴</option>
                            </select>
                            <button type="submit">Atualizar</button>
                        </form>
                    </div>
                </div>
    <?php
            }
        }
    }
    ?>
</body>

</html>
