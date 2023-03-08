<?php
include_once '../Include_once/conexao.php';
include_once '../Login/protect.php';
$titulo = "Histórico";
$pagina = "Winter - " . $titulo;

error_reporting(0);
$idPag = $_GET['idPag'];
if ($idPag == null) {
    $idPag = 1;
}
if ($idPag != 1) {
    $logo = "../img/logo.png";
}
include_once '../Include_once/head.php';

?>

<body>
    <div class="menuHistorico">
        <a href="historico.php?idPag=1"><button class="custom-btn" id="perfilBTN">Anúncios</button></a>
        <a href="historico.php?idPag=2"><button class="custom-btn" id="perfilBTN">Pesquisas</button></a>
        <a href="historico.php?idPag=3"><button class="custom-btn" id="perfilBTN">Mensagens</button></a>
    </div>
    <?php
    if ($idPag == 1) {
        include_once('../Include_once/Historico/anuncios.php');
    }
    if ($idPag == 2) {
        include_once('../Include_once/Historico/pesquisas.php');
    }
    if ($idPag == 3) {
        include_once('../Include_once/Historico/mensagens.php');
    }
    //include_once('../Include_once/Conta/anuncios.php');
    ?>
















</body>
<?php include_once '../Include_once/footer.php'; ?>

</html>