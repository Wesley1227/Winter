<?php include_once '../Include_once/conexao.php';
$titulo = "Denúncia";
$pagina = "Winter - " . $titulo;
include_once '../Include_once/head.php';
$idUser = $_SESSION['idUser'];

// GET's
$idDenunciado = $_GET['idDenunciado'];
$idChat = $_GET['idChat'];
$idAnuncio = $_GET['idAnuncio'];
$idPerfil = $_GET['idPerfil'];

// Pesquisas Base de dados
$resultDenunciado = $con->query("SELECT * FROM user WHERE idUser = '$idDenunciado'")->fetchAll();
foreach ($resultDenunciado as $denunciado) {
}
$resultChat = $con->query("SELECT * FROM chat WHERE idChat = '$idChat'")->fetchAll();
foreach ($resultChat as $chat) {
}
$resultAnuncio = $con->query("SELECT * FROM chat WHERE idChat = '$idAnuncio'")->fetchAll();
foreach ($resultAnuncio as $anuncio) {
}

// IF's
if ($idChat != null) {
    $tipoDenuncia = "Mensagem";
}
if ($idAnuncio != null) {
    $tipoDenuncia = "Anúncio";
}
if ($idPerfil != null) {
    $tipoDenuncia = "Perfil";
}
9
?>

<Body>
    <form action="../Include_once/denunciar.php?idDenunciado=<?= $idDenunciado?>&&tipoDenuncia=<?= $tipoDenuncia?>&&idChat=<?= $idChat?>&&idAnuncio=<?= $idAnuncio?>&&idChat=<?= $idChat?>" id="formLogin" method="post">
        <div class="login">
            <div class="caixa">
                <h1><?php echo $tipoDenuncia ?></h1>
                <?php if ($idChat != null) { ?>
                    <div id="mensagem" style="<?php echo $style ?>" class="chatDenunciado">
                        <a href="../PHP/perfil.php?idUser=<?= $perfil ?>"> <img src="../uploads/<?= $denunciado['fotoPerfil'] ?>" class="miniFotoPerfil" id="fotoPerfilMensagem" />
                        </a><?php echo $chat['nome'] ?> <br>
                        <?php echo $chat['mensagem'] ?>
                    </div>
                <?php } ?> <!-- Caso o user Denunciar uma mensagem, aparecer a mensagem denunciada. -->
                
                <input type="text" name="motivo" placeholder="Motivo:" required />

                Outras provas: <input id="provas" name="print" type="file">




                <!-- O que está sendo denunciado? <select name="motivo" id="subSubCategoria" class="dropdown-select">
                    <option value="">Anúncio</option>
                    <option value="">Mensagem</option>
                    <option value="">Perfil</option>
                </select><br> -->
                <button type="submit">Denúnciar</button><br>
                <!-- <p>Não tem conta? <a href="registro.php"><span>Registra-se</span></p></a><br><br> -->

            </div>
        </div>
    </form>
</body>
<?php include_once('../Include_once/footer.php') ?>

</html>