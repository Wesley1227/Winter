<?php
include_once('../conexao.php');
include_once('../../Login/protect.php');
$idUser = $_SESSION['idUser'];
$idUser2 = $_GET['idUser'];
$idAnuncio = $_GET['idAnuncio'];

if ($idUser2 == null || $idUser2 == 0) {
    header("Location: javascript:history.back()");
} // Caso tente conversar com alguém que não existe, volta atrás

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
        if ($chat['nome'] == $_SESSION['user']) { // A mesagem do user é diferenten para ser mais fácil distinguir
            $chat['nome'] = "Eu";
            $fotoPefil = $_SESSION['fotoPerfil'];
            $style =  "margin-left: auto; border-radius:  15px 25px 0px 20px; background-color:DarkSlateBlue; color:white;";
            $perfil = $idUser;
            $lixo = "";
            $denuncia = "display:none;";
        } else {
            $fotoPefil = $conta['fotoPerfil'];
            $style =  "";
            $perfil = $conta['idUser'];
            $lixo = "display:none;";
            $denuncia = "margin-top: -15px;";
        }
        if ($fotoPefil == null) {
            $fotoPefil = "semFotoPerfil.png";
        }

        $visto = $chat['visualizacao'];
        if ($visto == 0) {
            $visto = '<svg xmlns="http://www.w3.org/2000/svg"  width="20" height="20" fill="currentColor" class="bi bi-check" viewBox="0 0 13 13">
            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
          </svg>'; // NÃO VISUALIZADO
        } else {
            $visto = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-all" viewBox="0 0 14 14">
            <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 
            0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z"/></svg>'; //VISUALIZADO
        }
    ?>
        <div id="mensagem" style="<?php echo $style ?>">
            <a href="../PHP/perfil.php?idUser=<?= $perfil ?>"> <img src="../uploads/<?= $fotoPefil ?>" class="miniFotoPerfil" id="fotoPerfilMensagem" />
            </a><?php echo $chat['nome'] ?> <br>
            <?php echo $chat['mensagem'] ?>
            <div style="<?php echo $lixo ?>;">
                <a href="../Include_once/Mensagens/deleteMensagem.php?idChat=<?= $chat['idChat'] ?>"><button id="apagarMensagem" style="background: none;" onclick="return confirm('Tem certeza que deseja excluir esta mensagem?')"><?= $visto ?> 🗑️</button></a>
            </div>
            <div style="<?php echo $denuncia ?>;">
                <a href="../PHP/denuncia.php?idChat=<?= $chat['idChat'] ?>&&idDenunciado=<?= $chat['idUser'] ?>"><button id="apagarMensagem" style="background: none;" onclick="return confirm('Tem certeza que deseja denúnciar esta mensagem?')"><?= $visto ?>⚠️</button></a>
            </div>
        </div>
        <br>
<?php
    }
} //Configuração para marcar mensagem como visualizado
$idChat = $chat['idChat'];
$lido = 1;
$queryView = "SELECT * FROM chat WHERE idAnuncio = $idAnuncio AND idDestinatario= $idUser AND visualizacao = '0' ";
$resultView = $conn->query($queryView);
if ($resultView->num_rows > 0) {
    $row = $resultView->fetch_assoc();
    $query2 = "UPDATE winter.chat SET visualizacao = '$lido' WHERE idUser = '$idUser2' AND idAnuncio = '$idAnuncio' AND idDestinatario = '$idUser'";
    $conn->query($query2);
}
?>


<div class="alertChat">
    -Tenha sempre respeito. <br>
    -Não partilhe a sua localização até que a Winter solicite. <br>
    -Não partilhe informações pessoais que possam levar a fraudes. <br>
</div>