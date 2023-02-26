<?php include_once '../Include_once/conexao.php';
$titulo = "Produtos";
$pagina = "Winter - " . $titulo;
include_once '../Include_once/head.php';
$semImagem = "semImagem.jpg";
$result = $con->query("SELECT * FROM anuncios WHERE imagem != '$semImagem'  ORDER BY dataCriacao DESC LIMIT 15")->fetchAll();
?>

<Body>

  <?php if ($_SESSION['user'] == "Sem login →") { ?>
    <form action=""><button class="custom-btn" id="instalarApp" title="APP ainda em desenvolvimento">Instale nossa app</button></form><br>
  <?php } else { ?>
    <form action="../PHP/criarAnuncio.php"><button class="custom-btn" id="criarAnuncio">Criar anúncio</button></form><br>
  <?php } ?>
  <form action="../PHP/anuncios.php?pagina=1"><button class="custom-btn" id="btnAnuncios">Anúncios</button></form>

  <?php include_once '../Include_once/barraPesquisa.php'; ?>
  <h1 class="title" id="destaques">Destaques</h1><br>

  <a href="" id="link"><button id="i">i</button></a>
  <div id="popup" class="popupIndex" style="display: none;">
    Anúncios com imagem e terem sido um dos últimos 15 adicionados.
    <a href=""><button id="fechar">x</button></a>
  </div>

  <div class="slider" x-data="{start: true, end: false}">
    <div class="sliderConteudos" x-ref="slider" x-on:scroll.debounce="$refs.slider.scrollLeft == 0 ? start = true : start = false; Math.abs(($refs.slider.scrollWidth - $refs.slider.offsetWidth) - $refs.slider.scrollLeft) < 5 ? end = true : end = false;">

      <form action="anuncio.php" method="POST">
        <?php foreach ($result as $item) : ?>
          <a href="../PHP/anuncio.php?idAnuncio=<?= $item['idAnuncio'] ?>">
            <div class="itemAnuncio">
              <img class="itemImagem" src="../uploads/<?= $item['imagem'] ?>" alt="Image">
              <div class="itemInfo">
                <h2><?php echo $item['titulo'] ?></h2>
                <h3><?php echo $item['preco'] ?>€</h3>
                <h4>📍<?php echo $item['localizacao'] ?></h4>
              </div>
            </div>
          </a>
      </form><?php endforeach; ?>

    </div>
  </div>

  <br><br><br>

  <div class="PesquisaRapida">
    <!-- <a href=""><img src="../img/1.png"></a> -->
    <a href=""><img src="../img/2.png"></a>
    <a href=""><img src="../img/3.png"></a>
    <a href=""><img src="../img/4.png"></a>
    <a href=""><img src="../img/5.png"></a>
  </div>

  <br><br>
  <h1 class="title" id="destaques">Pesquisa rápida</h1><br>
  <div class="PesquisaRapida" id="pesquisa">
    <a href=""><img src="../img/telemoveisAte300.jpg"></a>
    <a href=""><img src="../img/ComputadoresTorre.png"></a>
    <a href=""><img src="../img/ImoveisAte.png"></a>
    <a href=""><img src="../img/VeiculosCarros.png"></a>
  </div>

</body>
<?php include_once '../Include_once/footer.php'; ?>

</html>
<!-- ||||||||||||||||||||||| JAVA SCRIPT \\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<script>
  // Função para atualiazar assim poder recarregar a SESSION
  function reloadIt() {
    if (window.location.href.substr(-2) !== "?r") {
      window.location = window.location.href + "?r";
    }
  }
  setTimeout('reloadIt()', 0)();
</script>

<script>
  // Função POP-UP
  var link = document.getElementById("link");
  var popup = document.getElementById("popup");
  var fechar = document.getElementById("fechar");

  link.addEventListener("click", function(event) {
    event.preventDefault();
    popup.style.display = "block";
  });

  fechar.addEventListener("click", function() {
    popup.style.display = "none";
  });
</script>