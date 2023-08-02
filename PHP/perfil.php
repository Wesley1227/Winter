<?php include_once '../Include_once/conexao.php';
$id = $_GET['idUser'];
if ($id == null || $id == 0) {
    header("Location: javascript:history.back()");
} // Caso o user tente acessar um prefil apagando o idUser, volta onde estava antes

$result = $con->query("SELECT * FROM user WHERE idUser ='$id'")->fetchAll();
foreach ($result as $pessoa) {
}
$user = $pessoa['user'];
if ($user == null) {
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
if ($pessoa['fotoPerfil'] == null) {
    $pessoa['fotoPerfil'] = "semFotoPerfil.png";
}

include_once '../Include_once/head.php';


// Níveis:
// São 4 de 250xp para subir 1 nível
$xp = $pessoa['xp'];
$xp1 = "border-top-color: brown;";
$xp1Quase = "border-top-color: rgb(209, 129, 129);";
$xp2 = "border-left-color: brown;";
$xp2Quase = "border-left-color: rgb(209, 129, 129);";
$xp3 = "border-bottom-color: brown;";
$xp3Quase = "border-bottom-color: rgb(209, 129, 129);";
$xp4 = "border-right-color: brown;";
$xp4Quase = "border-right-color: rgb(209, 129, 129);";

if ($xp <= 250) {
    $style = $xp1Quase;
}
if ($xp > 250 && $xp <= 500) {
    $style = $xp1 . $xp2Quase;
}
if ($xp > 500 && $xp <= 750) {
    $style = $xp1 . $xp2 . $xp3Quase;
}

if ($xp > 750) {
    $style = $xp1 . $xp2 . $xp3 . $xp4Quase;
}


?>

<body>
    <div class="perfil">
        <div id="fotoPerfilNivel">

            <img style="<?php echo $style ?>" src="../uploads/<?= $pessoa['fotoPerfil'] ?>" /><br>
            <h1>Nível <?php echo $pessoa['nivel'] ?>
                <!-- POP UP explicação do sistema de níveis -->
                <a href="" id="link"><button id="perfilNivelInfo">i</button></a>
            </h1>

            <?php echo $xp ?>xp
            <div id="popupInfoNivel" style="display: none;">
                <h2> Sistema de níveis </h2>
                <h4>Para subir de nível é preciso obter 1000xp</h4>
                + 50xp para cada mensagem enviada; <br>
                + 50xp para cada dia registrado no site; <br>
                + 200xp para cada denúncia com resultado em punição; <br>
                + 500xp para cada anúncio publicado; <br>
                + 500xp para cada anúncio vendido; <br>
                - 2 níveis por mensagem sua denúnciada com resultado em punição <br>
                - 1 nível por conteúdo ou mensagem imprópria <br>
                O nível corresponde ao número de anúncios que podem ser publicados até o nível 15. <br>
                <a href="#"><button id="fechar">x</button></a>
            </div>

        </div>
        <div id="info">
            <?php if ($_SESSION['idUser'] == 1) { ?>
                ID:<?php echo $pessoa['idUser'] ?><br>
                <button>Punir</button><br><br>
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


<script>
    // Função POP-UP
    var link = document.getElementById("link");
    var popupInfoNivel = document.getElementById("popupInfoNivel");
    var fechar = document.getElementById("fechar");

    link.addEventListener("click", function(event) {
        event.preventDefault();
        popupInfoNivel.style.display = "block";
        window.scrollBy(0, 300);
    });

    fechar.addEventListener("click", function() {
        popupInfoNivel.style.display = "none";
    });
</script>