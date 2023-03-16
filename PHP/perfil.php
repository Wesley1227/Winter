<?php include_once '../Include_once/conexao.php';
$id = $_GET['idUser'];
if ($id == null || $id == 0) {
    header("Location: javascript:history.back()");
} // Caso o user tente acessar um prefil apagando o idUser, volta onde estava antes
 
$result = $con->query("SELECT * FROM user WHERE idUser ='$id'")->fetchAll();
foreach ($result as $pessoa) : endforeach;
$user = $pessoa['user'];
if ($user == null ) {
    header("Location: javascript:history.back()");
} // Caso o user tente acessar um prefil que ainda não existe, volta onde estava antes

if ($pessoa['genero'] == 1) {
    $emoji = "👨";
} elseif ($pessoa['genero'] == 2) {
    $emoji = "👩";
} else {
    $emoji = "👤";
}
$titulo = $emoji . $pessoa['user'];
$pagina = "Winter - " . $titulo;

include_once '../Include_once/head.php';
?>

<body>
    <div class="perfil">
        <?php if ($pessoa['fotoPerfil'] == null) {
            $pessoa['fotoPerfil'] = "semFotoPerfil.png";
        } ?>
        <img src="../uploads/<?= $pessoa['fotoPerfil'] ?>" />
        <div id="info">
            <?php if ($_SESSION['idUser'] == 1) { ?>
                ID:<?php echo $pessoa['idUser'] ?><br>
            <?php }
            ?>
            👤<?php echo $pessoa['user'] ?><br><br>
            <?php echo $emoji . $pessoa['nome'] . " " . $pessoa['apelido']  ?><br>
            📞<?php echo $pessoa['telemovel'] ?><br>
            ⏱️ <?php echo $pessoa['dataCriacao'] ?>
        </div>
    </div>
    <br>
    <?php include_once('../Include_once/Conta/anuncios.php');
    if ($registros == null && $pessoa['idUser'] == $_SESSION['idUser']) { ?>
        <div id="semAnuncio" class="perfilSemAnuncio"> Você não tem anúncios ainda :( <br>
            <a href="../PHP/criarAnuncio.php"> Crie um agora!</a>
        </div>
    <?php } ?>
    </div>

</body>
<?php include_once('../Include_once/footer.php'); ?>

</html>