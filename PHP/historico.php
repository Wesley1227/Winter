<?php
include_once '../Include_once/conexao.php';
include_once '../Login/protect.php';

$titulo = "Histórico";
$pagina = "Winter - " . $titulo;

// Verifica se foi passado o parâmetro idPag na URL
$idPag = isset($_GET['idPag']) ? $_GET['idPag'] : 1;

include_once '../Include_once/head.php';
?>

<body>
<div class="menuHistorico">
        <a href="historico.php?idPag=1"><button style="width: 100%;" class="custom-btn <?php if ($idPag == 1) echo 'active'; ?>">Anúncios</button></a>
        <a href="historico.php?idPag=2"><button style="width: 100%;" class="custom-btn <?php if ($idPag == 2) echo 'active'; ?>">Pesquisas</button></a>
        <a href="historico.php?idPag=3"><button style="width: 100%;" class="custom-btn <?php if ($idPag == 3) echo 'active'; ?>">Mensagens</button></a>
    </div>

    <?php
    if ($idPag == 1) {
        include_once('../Include_once/Historico/anuncios.php');
    } elseif ($idPag == 2) {
        include_once('../Include_once/Historico/pesquisas.php');
    } elseif ($idPag == 3) {
        include_once('../Include_once/Historico/mensagens.php');
    }
    ?>

</body>
</html>
