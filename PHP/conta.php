<?php include_once '../Include_once/conexao.php';
include('../login/protect.php');
$email = $_SESSION['email'];
$id = $_SESSION['idUser'];
$result = $con->query("SELECT * FROM user WHERE idUser ='$id'")->fetchAll();
foreach ($result as $pessoa) {
}
// $emoji = "";
// if ($pessoa['genero'] == 1) {
//     $emoji = "👨";
// } elseif ($pessoa['genero'] == 2) {
//     $emoji = "👩";
// } else {
//     $emoji = "👤";
// }

$titulo =  $pessoa['user'];
$pagina = "Winter - " . $titulo;
$logo = "../img/logo.png";

error_reporting(0);
$idAnuncio = $_GET['idAnuncio'];
if ($idAnuncio != null) {
    $logo = "../img/1.png";
}

include_once '../Include_once/head.php';
$idPag = $_GET['idPag'];
if ($idPag == null || $idPag > 4) {
    $idPag = 1;
}

include_once("../Include_once/Conta/menu.php");

?>

<body>
    <div class="menuPerfil">
        <a href="conta.php?idPag=1"><button class="<?php echo $class1 ?>" id="perfilBTN">Mensagens</button></a>
        <a href="conta.php?idPag=2"><button class="<?php echo $class2 ?>" id="perfilBTN">Anúncios</button></a>
        <a href="conta.php?idPag=3"><button class="<?php echo $class3 ?>" id="perfilBTN">Avaliações</button></a>
        <a href="conta.php?idPag=4"><button class="<?php echo $class4 ?>" id="perfilBTN">Dados</button></a>
    </div>

    <?php
    if ($idPag == 1) {
        include_once('../Include_once/Mensagens/chat.php');
    }
    if ($idPag == 2) {
        include_once('../Include_once/Conta/anuncios.php');
    }
    if ($idPag == 3) {
        echo "Avaliações - Página ainda em desenvolvimento";
    }
    if ($idPag == 4) {
        include_once('../Include_once/Conta/dados.php');
    } ?>

</body>
<?php include_once('../Include_once/footer.php'); ?>

</html>