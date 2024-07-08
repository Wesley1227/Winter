<?php
include_once '../Include_once/conexao.php';
$titulo = "Anúncios favoritos";
$pagina = "Winter - " . $titulo;
$logo = "../img/logo.png";
include_once '../Include_once/head.php';
$idUserSESSION = $_SESSION["idUser"];
$resultCOUNT = $con->query("SELECT COUNT(idUser) AS count FROM anunciosFavoritos WHERE idUser ='$idUserSESSION'");
$countRow = $resultCOUNT->fetch();
$quantidade = $countRow["count"];
echo $countRow["count"];
if ($quantidade == null) {
?> <div class="semFavoritos"> Vazio </div>
<?php
}
?>

<body>
<br>
    <form action="anuncio.php" method="POST">
        <div class="anuncios">
            <?php
            $result = $con->query("SELECT * FROM anunciosFavoritos WHERE idUser ='$idUserSESSION' ORDER BY data DESC")->fetchAll();
            foreach ($result as $pessoa) {
                $idFavorito = $pessoa["idFavorito"];
                $idAnuncio = $pessoa["idAnuncio"];
                $idUser = $pessoa["idUser"];
                $data = $pessoa["data"];
                $pagina = 1;
                $limite = 15;
                $inicio = ($pagina * $limite) - $limite;
                $result = $con->query("SELECT * FROM anuncios WHERE idAnuncio = $idAnuncio ORDER BY dataCriacao DESC LIMIT $inicio, $limite ")->fetchAll(); /* ORDER BY dataCriacao DESC */
                $registros = $con->query("SELECT COUNT(idUser) count FROM anunciosFavoritos WHERE idUser = $idUserSESSION")->fetch()["count"];
                $paginas = ceil($registros / $limite);
                foreach ($result as $item) { ?>
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
            <?php }
            }  ?>
        </div>
    </form>

    <br><br><br><br><br><br>
</body>
<?php include_once '../Include_once/footer.php'; ?>

</html>