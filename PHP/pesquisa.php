<?php include_once '../Include_once/conexao.php';
error_reporting(0);
$pesquisa = $_GET['pesquisa'];
$titulo = $pesquisa;
$pagina = "Winter - " . $titulo;
include_once '../Include_once/head.php';

if ($pesquisa == null) {
    header("Location: " . $_SERVER['HTTP_REFERER'] . "");
} ?><!-- Caso a pessoa clicou em pesquisar e não colocou nada, ele não pdoerá pesquisar enquanto não colocar algo válido -->

<body>
    <?php include_once '../Include_once/barraPesquisa.php';
    error_reporting(0);
    $pagina = 1;
    if (isset($_GET['pagina']))
        $pagina = filter_input(INPUT_GET, "pagina", FILTER_VALIDATE_INT);
    if (!$pagina)
        $pagina = 1;
    $limite = 20;
    $inicio = ($pagina * $limite) - $limite;
    $con = new PDO("mysql:host=localhost;dbname=winter", "root", "");
    $result = $con->query("SELECT * FROM anuncios WHERE titulo LIKE '%" . $pesquisa = $_GET['pesquisa'] . "%' ORDER BY datacriacao DESC LIMIT $inicio, $limite")->fetchAll(); /* ORDER BY dataCriacao DESC */
    $registros = $con->query("SELECT COUNT(idAnuncio) count FROM anuncios WHERE titulo LIKE '%" . $pesquisa = $_GET['pesquisa'] . "%' ")->fetch()["count"];
    $paginas = ceil($registros / $limite);
    $calculoAnuncio = $registros - $inicio;  ?>
    <div id="regisros"> <?php echo $registros . " anuncios"; ?> </div>

    <?php if ($registros == null) { ?>
        <div id="semAnuncio"> Nenhum resultado para: "<?php echo $pesquisa = $_GET['pesquisa'] ?>"</div>
    <?php }

    include_once '../Include_once/anuncios.php';
    include_once '../Include_once/paginacaoPesquisa.php'; //Botões da paginação da pag. Pesquisa.php
    ?>

</body>
<?php include_once '../Include_once/footer.php'; ?>

</html>