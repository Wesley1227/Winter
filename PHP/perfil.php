<?php
include_once '../Include_once/conexao.php';
$id = $_GET['idUser'];
if ($id == null || $id == 0) {
    header("Location: javascript:history.back()");
    exit;
}

$result = $con->query("SELECT * FROM user WHERE idUser ='$id'")->fetchAll();
if (count($result) === 0) {
    header("Location: javascript:history.back()");
    exit;
}

$pessoa = $result[0];
$user = $pessoa['user'];
if ($user == null) {
    header("Location: javascript:history.back()");
    exit;
}

if ($pessoa['genero'] == 1) {
    $emoji = "👨";
} elseif ($pessoa['genero'] == 2) {
    $emoji = "👩";
} else {
    $emoji = "👤";
}
$titulo = $emoji . $pessoa['user'];
$pagina = "Winter - " . $titulo;
if ($pessoa['fotoPerfil'] == null) {
    $pessoa['fotoPerfil'] = "semFotoPerfil.png";
}

// Calcular a média das avaliações
$avgQuery = "SELECT AVG(nota) as media FROM avaliacoes WHERE idAnunciante = '$id'";
$avgResult = $con->query($avgQuery)->fetch();
$mediaAvaliacoes = $avgResult['media'] ? round($avgResult['media'], 2) : 0;

include_once '../Include_once/head.php';
?>

<body>
    <div class="perfil">
        <div id="fotoPerfilNivel">
            <img src="../uploads/<?= $pessoa['fotoPerfil'] ?>" /><br>
        </div>
        <div id="info">
            <!-- <?php if (isset($_SESSION['idUser']) && $_SESSION['idUser'] == 1) { ?>
                ID:<?php echo $pessoa['idUser'] ?><br>
                <button>Punir</button><br><br>
            <?php } ?> -->
            <?php

            if ($pessoa['status'] == 1) {
                $status = "🔴";
            } else if ($pessoa['status'] == 2) {
                $status = "🟢";
            } else if ($pessoa['status'] == 3) {
                $status = "🔘";
            }

            ?>
            <h1>👤<?php echo $pessoa['user'] . $status ?>
            </h1><br><br>
            <h2> <?php echo $emoji . $pessoa['nome'] . " " . $pessoa['apelido'] ?></h2><br>
            <h3>📞<?php echo $pessoa['telemovel'] ?></h3><br>
            <h4>Avaliação: <?= $mediaAvaliacoes ?>/5</h4><br><br><br>
            ⏱Desde: <?php echo $pessoa['dataCriacao'] ?><br><br>
        </div>
    </div>

    <br>
    <?php
    include_once ('../Include_once/Conta/anuncios.php');
    if ($registros == null && $pessoa['idUser'] == $_SESSION['idUser']) { ?>
        <div id="semAnuncio" class="perfilSemAnuncio"> Você não tem anúncios ainda :( <br>
            <a href="../PHP/criarAnuncio.php"> Crie um agora!</a>
        </div>
    <?php } ?>
</body>
<?php include_once ('../Include_once/footer.php'); ?>

</html>