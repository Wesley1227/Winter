<?php
$idUser = $_SESSION['idUser'];
$result = $con->query("SELECT * FROM chat WHERE idUser = $idUser ORDER BY dataEnvio DESC")->fetchAll();
$query = "SELECT COUNT(*) AS total_mensagens FROM chat WHERE idUser = $idUser";
$resultCOUNT = $con->query($query);
$countRow = $resultCOUNT->fetch();
$totalMensagens = $countRow["total_mensagens"];
echo "Total de mensagens: " . $totalMensagens;
if ($totalMensagens == null) {
    ?> <div class="semFavoritos"> Vazio </div>
    <?php
    }
    ?>
<br><br>
<div class="historicoMensagens">
    <div id="historicoMensagens">
        <?php
        foreach ($result as $mensagens) { ?>
            ID: <?php echo $mensagens['idChat'] . " - " . $mensagens['nome'] . " - " . $mensagens['mensagem'] ?><br>
        <?php } ?>
    </div>
</div>