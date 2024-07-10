<?php
include_once '../Include_once/conexao.php';
include_once('../Login/protect.php');
$titulo = "Fórum";
$pagina = "Winter - " . $titulo;
include_once '../Include_once/head.php';
$idUser = $_SESSION['idUser'];

// Listagem de fóruns
$sql = "SELECT * FROM foruns ORDER BY dataCriacao DESC";
$resultForuns = $con->query($sql)->fetchAll();
?>

<body>
    <div class="forum">
        <?php include_once 'forum.php'; ?>

        <div id="pesquisa2">
            <div id="listaForuns2">
            <a href="criarForum.php"><button class="custom-btn" id="pesquisaForum">Criar grupo</button></a><br>
            <!-- <input type="text" id="search-bar" class="pesquisaForum" for="pesquisa" name="pesquisa" placeholder="Que fórum procuras?"> -->
            <h1 style="color: black; text-align:left;">Fóruns:</h1>

            <!-- Listagem de fóruns -->
            <?php foreach ($resultForuns as $foruns) : ?>
                <a href="foruns.php?idForum=<?= $foruns['idForum'] ?>">
                    <div id="listaForuns">
                        <?= htmlspecialchars($foruns['nome']) ?>
                    </div>
                </a><br>
            <?php endforeach; ?>
        </div>
            <form method="POST" id="formEnviarMensagem4" action="foruns.php?idForum=<?= $idForum ?>">
                <textarea class="mensagem4" name="mensagem" placeholder="Sua mensagem" required></textarea>
                <button id="enviar4" type="submit">Enviar</button>
            </form>
        </div>

    </div>
</body>

</html>