<?php include_once '../Include_once/conexao.php';
$titulo = "Anúncios";
$pagina = "Winter - " . $titulo;
include_once '../Include_once/head.php';
?>

<body>
    <?php include_once '../Include_once/menuSlide.php'; 
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

    <button id="btnTopo"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M182.6 137.4c-12.5-12.5-32.8-12.5-45.3 0l-128 128c-9.2 9.2-11.9 22.9-6.9 34.9s16.6 19.8 29.6 19.8H288c12.9 0 24.6-7.8 29.6-19.8s2.2-25.7-6.9-34.9l-128-128z"/></svg></button>

</body>
<?php include_once '../Include_once/footer.php'; ?>

</html>

<script>
    document.getElementById("btnTopo").addEventListener("click", function() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    });
</script>