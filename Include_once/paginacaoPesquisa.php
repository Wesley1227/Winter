<div class="paginacao">
        <?php
ceil($registros);
ceil($calculoAnuncio);

        if (isset($_GET['pagina']) <= 1 &&  $registros >= 21) { ?>
            <?php echo $pagina ?> <a href="?pesquisa=<?= $pesquisa = $_GET['pesquisa'] ?>&& pagina=<?= $pagina + 1 ?>">➡️</a>
            <a href="?pesquisa=<?= $pesquisa = $_GET['pesquisa'] ?>&& pagina=<?= $paginas ?>"><button class="custom-btn btn-1" id="ultima">Última</button></a>
        <?php }
        if (isset($_GET['pagina']) >= 2 && $calculoAnuncio >= 21) { ?>
            <a href="?pesquisa=<?= $pesquisa = $_GET['pesquisa'] ?>&& pagina=1"><button class="custom-btn btn-1" id="primeiraUltima">Primeira</button></a>
            <a href="?pesquisa=<?= $pesquisa = $_GET['pesquisa'] ?>&& pagina=<?= $pagina - 1 ?>">⬅️</a>

            <?php echo $pagina ?> <a href="?pesquisa=<?= $pesquisa = $_GET['pesquisa'] ?>&& pagina=<?= $pagina + 1 ?>">➡️</a>
            <a href="?pesquisa=<?= $pesquisa = $_GET['pesquisa'] ?>&& pagina=<?= $paginas ?>"><button class="custom-btn btn-1" id="ultima">Última</button></a>
        <?php }

        if (isset($_GET['pagina']) >= 2 && $calculoAnuncio <= 20) { ?>
           <a href="?pesquisa=<?= $pesquisa = $_GET['pesquisa'] ?>&& pagina=1"><button class="custom-btn btn-1" id="primeiraUltima">Primeira</button></a>
            <a href="?pesquisa=<?= $pesquisa = $_GET['pesquisa'] ?>&& pagina=<?= $pagina - 1 ?>">⬅️</a>
            <?php echo $pagina ?>
        <?php } ?>

        <?php if (isset($calculoAnuncio) < 0) {
            $paginaAnterior = $pagina - 1;
            header("location: pesquisa.php?pesquisa=$pesquisa&&pagina=$paginaAnterior");
        } ?>
    </div>