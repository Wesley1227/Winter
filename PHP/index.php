<?php include_once '../Include_once/conexao.php';
$titulo = "Produtos";
$pagina = "Winter - " . $titulo;
include_once '../Include_once/head.php';
$semImagem = "semImagem.jpg";
$result = $con->query("SELECT * FROM anuncios WHERE imagem != '$semImagem'  ORDER BY dataCriacao DESC LIMIT 15")->fetchAll();
?>

<Body>

  <?php if (!isset($_SESSION['idUser']) || $_SESSION['idUser'] == null) { ?>
    <form action=""><button class="custom-btn" id="instalarApp" title="APP ainda em desenvolvimento">Instale nossa app</button></form><br>
  <?php } else { ?>
    <form action="../PHP/criarAnuncio.php"><button class="custom-btn" id="criarAnuncio">Criar anúncio</button></form><br>
  <?php } ?>
  
  <form action="../PHP/anuncios.php?pagina=1"><button class="custom-btn" id="btnAnuncios">Anúncios</button></form><br>

  <?php include_once '../Include_once/barraPesquisa.php'; ?>
  <h1 class="title" id="destaques">Destaques</h1><br>

  <div class="notificacao" id="not">Últimos 15 anúncios com imagem adicionados.</div>
  <button id="i" onclick="mostrarNotificacao()">i</button>

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
                <?php if ($item['localizacao'] == null) {
                  $item['localizacao'] = "Localização";
                } ?>
                <h4><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="12" height="12" viewBox="0 0 256 256" xml:space="preserve">

                    <defs>
                    </defs>
                    <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                      <path d="M 45 0 C 27.677 0 13.584 14.093 13.584 31.416 c 0 4.818 1.063 9.442 3.175 13.773 c 2.905 5.831 11.409 20.208 20.412 35.428 l 4.385 7.417 C 42.275 89.252 43.585 90 45 90 s 2.725 -0.748 3.444 -1.966 l 4.382 -7.413 c 8.942 -15.116 17.392 -29.4 20.353 -35.309 c 0.027 -0.051 0.055 -0.103 0.08 -0.155 c 2.095 -4.303 3.157 -8.926 3.157 -13.741 C 76.416 14.093 62.323 0 45 0 z M 45 42.81 c -6.892 0 -12.5 -5.607 -12.5 -12.5 c 0 -6.893 5.608 -12.5 12.5 -12.5 c 6.892 0 12.5 5.608 12.5 12.5 C 57.5 37.202 51.892 42.81 45 42.81 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                    </g>
                  </svg><?php echo $item['localizacao'] ?></h4>
              </div>
            </div>
          </a>
      </form><?php endforeach; ?>

    </div>
  </div>

  <br><br><br>

  <!-- POSSIVEIS PROJETOS: -->
  <!-- <div class="PesquisaRapida">
    <!-- <a href=""><img src="../img/1.png"></a> 
    <a href="#"><img src="../img/2.png"></a>
    <a href="#"><img src="../img/3.png"></a>
    <a href="#"><img src="../img/4.png"></a>
    <a href="forum.php"><img src="../img/5.png"></a>
  </div> -->

  <br><br>
  <h1 class="title" id="destaques">Pesquisa rápida</h1><br>
  <div class="PesquisaRapida" id="pesquisa">
    <a href="#"><img src="../img/telemoveisAte300.jpg"></a>
    <a href="#"><img src="../img/ComputadoresTorre.png"></a>
    <a href="#"><img src="../img/ImoveisAte.png"></a>
    <a href="#"><img src="../img/VeiculosCarros.png"></a>
  </div>

</body>
<?php include_once '../Include_once/footer.php'; ?>

</html>
<!-- ||||||||||||||||||||||| JAVA SCRIPT \\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<script>
  // Função para atualizar e assim poder recarregar a SESSION
  function reloadIt() {
    if (window.location.href.substr(-2) !== "?r") {
      window.location = window.location.href + "?r";
    }
  }

  setTimeout(reloadIt, 0);
</script>


<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Função POP-UP
    var link = document.getElementById("link");
    var popup = document.getElementById("popup");
    var fechar = document.getElementById("fechar");

    if (link && popup && fechar) {
      link.addEventListener("click", function(event) {
        event.preventDefault();
        popup.style.display = "block";
      });

      fechar.addEventListener("click", function() {
        popup.style.display = "none";
      });
    } 
  });
</script>


<!-- Notificações -->
<audio id="somNotificacao" src="../Sons/mg_recebida.mp3"></audio>
<script>
  function mostrarNotificacao() {
    var not = document.getElementById("not");
    not.style.display = "block";
    setTimeout(function() {
      not.style.transform = 'translateX(150%)';
      setTimeout(function() {
        not.style.display = 'none';
        not.style.transform = 'translateX(0%)';
      }, 500);
    }, 5000);
    var som = document.getElementById('somNotificacao');
    som.play();
  }
</script>
<!-- -->