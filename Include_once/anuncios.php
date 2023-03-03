<form action="anuncio.php" method="POST">
    <div class="anuncios">
        <?php foreach ($result as $item) :
            $views = $item['visualizacoes'] + 1;
            $idAnuncio = $item['idAnuncio'];
            $queryView = "UPDATE anuncios SET visualizacoes ='$views' WHERE idAnuncio = $idAnuncio";
            $resultadoView = $mysqli->query($queryView);
        ?>

            <a href="../PHP/anuncio.php?idAnuncio=<?= $item['idAnuncio'] ?>">
                <div class="itemAnuncio">
                    <img class="itemImagem" alt="Image" src="../uploads/<?= $item['imagem'] ?>">
                    <div class="itemInfo">
                        <h2><?php echo $item['titulo'] ?></h2>
                        <h3><?php echo $item['preco'] . "€" ?></h3>
                        <?php if ($item['localizacao'] == null) {
                            $item['localizacao'] = "Localização";
                        } ?>
                        <h4>📍<?php echo $item['localizacao'] ?></h4>
                    </div>
                </div>
            </a>

</form>

<?php endforeach; ?>


</div><br><br>