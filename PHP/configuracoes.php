<?php
include_once '../Include_once/conexao.php';
$titulo = "Configurações";
$pagina = "Winter - " . $titulo;
$logo = "../img/logo.png";
include_once '../Include_once/head.php';
?>

<body>

    <a href=""> <button>Excluir conta</button></a>
    <p>Tempo logado: <?php echo $tempoFormatado; ?></p>
</body>
<?php include_once '../Include_once/footer.php'; ?>

</html>