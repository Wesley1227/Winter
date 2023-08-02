<?php
include_once '../Include_once/conexao.php';
$titulo = "Fórum";
$pagina = "Winter - " . $titulo;
$logo = "../img/5.png";
include_once '../Include_once/head.php';
?>

<body>

    <div class="forum">
        <div class="foruns">
            <div id="forum">
            </div>
        </div>


        <div id="pesquisa">
            <form action="" method="get">
                <input type="text" id="search-bar" class="pesquisaForum" for="pesquisa" name="pesquisa" placeholder="Que fórum procuras?">
                <button type="submit" class="custom-btn" id="pesquisaForum">Pesquisar</button>
            </form><br>
        </div>
    </div>







</body>
<?php include_once '../Include_once/footer.php'; ?>

</html>