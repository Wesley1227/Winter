<?php include_once 'conexao.php';
$titulo = "Denúncias";
$pagina = "Winter - " . $titulo;
include_once '../Include_once/head.php';
$resultadoDenuncias = $conn->query($queryDenuncias);
?>

<body>
    <?php
    foreach ($resultadoDenuncias as $denuncias) { ?>
        <div class="denuncias">
            <div id="denuncia">
                <?php echo $denuncias['idUser']; ?> Denúnciou: <?php echo $denuncias['idDenuncia']; ?>
                <br><br>
                Motivo: <?php echo $denuncias['motivo']; ?> <br><br>
                🕒 <?php echo $denuncias['dataDenuncia']; ?>

            </div>
        </div>
    <?php } ?>
</body>

</html>