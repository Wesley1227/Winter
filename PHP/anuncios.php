<?php include_once '../Include_once/conexao.php';
$titulo = "Anúncios";
$pagina = "Winter - " . $titulo;
include_once '../Include_once/head.php';
?>

<body>
    <?php include_once '../Include_once/menuSlide.php'; ?>
    <?php
    $pagina = 1;
    if (isset($_GET['pagina']))
        $pagina = filter_input(INPUT_GET, "pagina", FILTER_VALIDATE_INT);
    if (!$pagina)
        $pagina = 1;
    $limite = 12;
    $inicio = ($pagina * $limite) - $limite;
    $inicio = ceil($inicio);
    $result = $con->query("SELECT * FROM anuncios ORDER BY dataCriacao DESC LIMIT $inicio, $limite")->fetchAll(); /* ORDER BY dataCriacao DESC */
    $registros = $con->query("SELECT COUNT(idAnuncio) count FROM anuncios")->fetch()["count"];
    $paginas = ceil($registros / $limite);
    $calculoAnuncio = $registros - $inicio; ?>

    <div id="regisros"> <?php echo $registros . " anuncios"; ?> </div>

    <?php include_once '../Include_once/anuncios.php';
    include_once '../Include_once/paginacaoAnuncios.php'; //Botões da paginação da pag. Anuncios.php 
    ?>
    </div>

    <button id="btnTopo">⬆️</button>

</body>
<?php include_once '../Include_once/footer.php'; ?>

</html>

<script>
    document.getElementById("btnTopo").addEventListener("click", function() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    });
</script>