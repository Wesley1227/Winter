<?php
$idUser = $_SESSION['idUser'];
$result = $con->query("SELECT * FROM chat WHERE idUser = $idUser ORDER BY dataEnvio DESC")->fetchAll();
?>
<div class="historicoMensagens">
    <div id="historicoMensagens">
        <?php
        foreach ($result as $mensagens) { ?>
            ID: <?php echo $mensagens['idChat'] . " - " . $mensagens['nome'] . " - " . $mensagens['mensagem'] ?><br>
        <?php } ?>
    </div>
</div>