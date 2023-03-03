<?php
include_once '../Include_once/conexao.php';
$titulo = "Histórico";
$pagina = "Winter - " . $titulo;
include_once '../Include_once/head.php';
$idPag = $_GET['idPag'];
if($idPag == null){
    $idPag = 1;
}
?>

<body>
    <div class="menuHistorico">
        <a href="historico.php?idPag=1"><button class="custom-btn" id="perfilBTN">Anúncios</button></a>
        <a href="historico.php?idPag=2"><button class="custom-btn" id="perfilBTN">Pesquisas</button></a>
        <a href="historico.php?idPag=3"><button class="custom-btn" id="perfilBTN">Mensagens</button></a>
    </div>
    <?php
    if ($idPag == 1) {
        echo "Anúncios - Página ainda em desenvolvimento";
    }
    if ($idPag == 2) {
        echo "Pesquisas - Página ainda em desenvolvimento";
    }
    if ($idPag == 3) {
        echo "Mensagens - Página ainda em desenvolvimento";
    } 
    //include_once('../Include_once/Conta/anuncios.php');
    ?>

    














</body>
<?php include_once '../Include_once/footer.php'; ?>

</html>