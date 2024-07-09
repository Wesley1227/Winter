<?php include_once 'conexao.php';
$titulo = "Admin";
$pagina = "Winter - " . $titulo;
$logo = "../img/logo.png";
include_once '../Include_once/head.php';
$resultadoSub = $conn->query($querySub);
$selectAnuncios = $con->query("SELECT COUNT(*) as idAnuncio FROM anuncios WHERE dataCriacao >= NOW() - INTERVAL 1 DAY;")->fetchAll();
$selectMensagens = $con->query("SELECT COUNT(*) as idChat FROM chat WHERE dataEnvio >= NOW() - INTERVAL 1 DAY;")->fetchAll();
$selectUser = $con->query("SELECT COUNT(*) as idUser FROM user WHERE dataCriacao >= NOW() - INTERVAL 1 DAY;")->fetchAll();
$selectPesquisas = $con->query("SELECT COUNT(*) as idPesquisa FROM pesquisas WHERE dataPesquisa >= NOW() - INTERVAL 1 DAY;")->fetchAll();
$selectDenuncias = $con->query("SELECT COUNT(*) as idDenuncia FROM denuncias WHERE dataDenuncia >= NOW() - INTERVAL 1 DAY;")->fetchAll();
// Executar a consulta para calcular a média
$resultado = mysqli_query($conn, "SELECT AVG(preco) AS media FROM anuncios");
// Recuperar o resultado em um array associativo
$media = mysqli_fetch_array($resultado, MYSQLI_ASSOC);


foreach ($selectUser as $numUser) {
}
foreach ($selectMensagens as $numMensagens) {
}
foreach ($selectAnuncios as $numAnuncios) {
}
foreach ($selectPesquisas as $numPesquisas) {
}
foreach ($selectDenuncias as $numDenuncias) {
}
?>
<!-- <meta http-equiv="refresh" content="1"> -->

<body>
    <br>
    <h1 class="title" id="destaques">Nas útilmas 24h: </h1><br>

    <div class="estatisticas">
        <div class="estatistica">
            <h1><?php echo $numAnuncios['idAnuncio'] ?></h1>
            Anúncios postados
        </div>
        <div class="estatistica">
            <h1><?php echo $numMensagens['idChat'] ?></h1>
            Mensagens enviadas
        </div>
        <div class="estatistica">
            <h1><?php echo $numUser['idUser'] ?></h1>
            Contas registadas
        </div>
        <!-- <div class="estatistica">
            <h1>-</h1>
            Vendas
        </div>
        <div class="estatistica">
            <h1>-</h1>
            Acessos
        </div> --><a href="" id="link">
            <div class="estatistica">
                <h1>+</h1>
                Ver mais
            </div>
        </a>


    </div>
    <!-- OUTRAS estatisticas que ficarao inviseis -->
    <div id="estatisticas" style="display: none;">
        <div class="estatisticas">
            <div class="estatistica">
                <h1><?php echo $numPesquisas['idPesquisa'] ?></h1>
                Pesquisas
            </div>
            <div class="estatistica">
                <h1><?php echo ceil($media["media"]) ?>€</h1>
                Média preço do anúncios ativos
            </div>
            <div class="estatistica">
                <h1><?php echo $numDenuncias['idDenuncia'] ?></h1>
                Denúncias
            </div>
            <div class="estatistica">
                <h1>-</h1>
                Buscas por emprego
            </div>
            <div class="estatistica">
                <h1>-</h1>
                Buscas por pesquisa rápida
            </div>

            <div class="estatistica">
                <h1>-</h1>
                Punições
            </div>
            <a href="#"><button id="fechar" class="fecharEstatisticas">x</button></a>
        </div>
    </div>

    </div>


    <!-- Mensagens enviadas nas útilmas 24h: <?php echo $numMensagens['idChat'] ?>  -->
    <!--     
    <!-- //////////////////// MARCAS \\\\\\\\\\\\\\\\\\ 
    <form action="../Admin/inserirMarca.php" method="POST">
        <label for="marca">Marca:</label>
        <input name="marca" type="text"></input>
        <button type="submit">Inserir</button>
    </form><br>


    <!-- //////////////////// SUBCATEGORIAS \\\\\\\\\\\\\\\\\\ 
    <form action="../Admin/inserirSubCategoria.php" method="POST">
        <label for="nada">Subcategoria:</label>
        <input name="nome" type="text"></input>
        <select name="idCategoria">
            <option value="">Categoria</option>
            <option value="1">Informática</option>
            <option value="2">Mobilidade</option>
            <option value="3">Agricultura</option>
            <option value="4">Vestuário</option>
            <option value="5">Móveis</option>
            <option value="6">Imóveis</option>
            <option value="7">Empregos</option>
            <option value="8">Serviços</option>
            <option value="9">Veículos</option>
            <option value="10">Animais</option>
            <option value="11">Desporto</option>
            <option value="12">Outros</option>
        </select>
        <button type="submit">Inserir</button>
    </form><br>


    <!-- //////////////////// SUB-SUBCATEGORIAS \\\\\\\\\\\\\\\\\\ 
    <form action="../Admin/inserirSubSubCategoria.php" method="POST">
        <label for="nada">Sub-subcategoria:</label>
        <input name="nome" type="text"></input>
        <select name="idSubCategoria">
            <option value="">Subcategoria</option>
            <!-- <?php
                    if ($resultadoSub->num_rows > 0) {
                        while ($row = $resultadoSub->fetch_assoc()) {
                            echo '<option value=' . $row['id'] . '>' . $row['nome'] . '</option>';
                        }
                    } ?> -->
    <!-- </select>
        <button type="submit">Inserir</button>
    </form> -->


</body>

</html>
<script>
    // Função POP-UP
    var link = document.getElementById("link");
    var estatisticas = document.getElementById("estatisticas");
    var fechar = document.getElementById("fechar");

    link.addEventListener("click", function(event) {
        event.preventDefault();
        estatisticas.style.display = "block";
        window.scrollBy(0, 200); // Desce um pouco para poder ver as outras estatisticas
    });

    fechar.addEventListener("click", function() {
        estatisticas.style.display = "none";
    });
</script>