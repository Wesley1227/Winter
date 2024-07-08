<?php
$idUser = $_SESSION['idUser'];
$result = $con->query("SELECT * FROM pesquisas WHERE idUser = $idUser ORDER BY dataPesquisa DESC")->fetchAll();
$query = "SELECT COUNT(*) AS total_pesquisas FROM pesquisas WHERE idUser = $idUser";
$resultCOUNT = $con->query($query);
$countRow = $resultCOUNT->fetch();
$totalPesquisas = $countRow["total_pesquisas"];

echo "Total de pesquisas: " . $totalPesquisas;
if ($totalPesquisas == null) {
?> <div class="semFavoritos"> Vazio </div>
<?php
}
?>
<div class="historicoPesquisas">
    <div id="historicoPesquisas">
        <?php
        foreach ($result as $pesquisas) { ?>
            <?php echo  $pesquisas['pesquisa'] . " 🕒" . $pesquisas['dataPesquisa'] ?><br>
        <?php } ?>
    </div>
</div>