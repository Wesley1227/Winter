<?php
$idUser = $_SESSION['idUser'];
$result = $con->query("SELECT * FROM pesquisas WHERE idUser = $idUser ORDER BY dataPesquisa DESC")->fetchAll();
?>
<div class="historicoPesquisas">
    <div id="historicoPesquisas">
        <?php
        foreach ($result as $Pesquisas) { ?>
            ID: <?php echo $Pesquisas['idPesquisa'] . " - " . $Pesquisas['pesquisa'] . " - " . $Pesquisas['dataPesquisa'] ?><br>
        <?php } ?>
    </div>
</div>