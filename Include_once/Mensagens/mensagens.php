<?php
include_once('../conexao.php');
include_once('../../Login/protect.php');
$idUser = $_SESSION['idUser'];
$idUser2 = $_GET['idUser'];
$idAnuncio = $_GET['idAnuncio'];

if ($idUser2 == null) {
    $pesquisa = "SELECT * FROM chat WHERE idUser ='$idUser' AND idAnuncio='$idAnuncio' ORDER BY dataEnvio desc";
} else {
    $pesquisa = "SELECT * FROM chat WHERE idAnuncio='$idAnuncio'AND idUser ='$idUser2' AND idDestinatario='$idUser' OR idAnuncio='$idAnuncio' AND idUser ='$idUser' AND idDestinatario='$idUser2' ORDER BY dataEnvio desc";
}
$result = $con->query($pesquisa)->fetchAll();
if ($idAnuncio == null) { ?>
    <div id="escolhe1">👈🧑‍🦱 <br> Escolhe um</div>
    <?php }

foreach ($result as $chat) {
    $user = $chat['nome'];
    $result2 = $con->query("SELECT * FROM user WHERE user='$user'")->fetchAll();
    foreach ($result2 as $conta) {
        if ($chat['nome'] == $_SESSION['user']) {// A mesagem do user é diferenten para ser mais fácil distinguir
            $chat['nome'] = "Eu";
            $fotoPefil = $_SESSION['fotoPerfil'];
            $style =  "margin-left: auto; border-radius:  15px 25px 0px 20px; background-color:brown; color:white;";
            $perfil = $idUser;
        } else {
            $fotoPefil = $conta['fotoPerfil'];
            $style =  "";
            $perfil = $conta['idUser'];
        }
        if($fotoPefil == null){
            $fotoPefil = "semFotoPerfil.png";
        }
    ?>
        <div id="mensagem" style="<?php echo $style ?>">
            <a href="../PHP/perfil.php?idUser=<?= $perfil ?>"> <img src="../uploads/<?= $fotoPefil ?>" class="miniFotoPerfil" id="fotoPerfilMensagem" />
            </a><?php echo $chat['nome'] ?> <br>
            <?php echo $chat['mensagem']; ?>
        </div>
        <br>
<?php }
} ?>
<!--  <a href="../PHP/anuncio.php?idAnuncio=<?= $idAnuncio ?>"</a>>




-->