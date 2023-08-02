<?php
$idUser = $_SESSION['idUser'];
$result = $con->query("SELECT * FROM pesquisas WHERE idUser = $idUser ORDER BY dataPesquisa DESC")->fetchAll();
?>
<div class="historicoPesquisas">
    <div id="historicoPesquisas">
        <?php
        foreach ($result as $pesquisas) { ?>
            <?php echo  $pesquisas['pesquisa'] . " 🕒" . $pesquisas['dataPesquisa'] ?><br>
        <?php } ?>
    </div>
</div>