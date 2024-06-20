<div class="paginacao">
    <?php if (isset($pagina) == null || $pagina == 0) {
        $pagina = 1;
    }

    if ($pagina <= 1) { ?>
        <?php echo $pagina ?>
        <a href="?pagina=<?= $pagina + 1 ?>"><?php include_once("iconAvancar.php") ?></a>
        <a href="?pagina=<?= $paginas ?>"><button class="custom-btn btn-1" id="ultima">Última</button></a>
    <?php }


    if ($pagina >= 2 && $calculoAnuncio >= 21) { ?>
        <a href="?pagina=1"><button class="custom-btn btn-1" id="primeiraUltima">Primeira</button></a>
        <a href="?pagina=<?= $pagina - 1 ?>"><?php include_once("iconVoltar.php") ?></a>
        <?php echo $pagina ?>
        <a href="?pagina=<?= $pagina + 1 ?>"><?php include_once("iconAvancar.php") ?></a>
        <a href="?pagina=<?= $paginas ?>"><button class="custom-btn btn-1" id="ultima">Última</button></a>
    <?php }

    if ($pagina >= 2 && $calculoAnuncio <= 20) { ?>
        <a href="?pagina=1"><button class="custom-btn btn-1" id="primeiraUltima">Primeira</button></a>
        <a href="?pagina=<?= $pagina - 1 ?>"><?php include_once("iconVoltar.php") ?></a>
        <?php echo $pagina ?>
    <?php } ?>
</div>