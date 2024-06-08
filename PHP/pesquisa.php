<?php include_once '../Include_once/conexao.php';
error_reporting(0);
include_once('../Login/protect.php');
$idUser = $_SESSION['idUser'];
// if ($idUser == null) {
//   $idUser = 0;
// } // Caso não tiver logado, o ID ser 0
$selectFiltros = $con->query("SELECT * FROM filtros WHERE idUser ='$idUser'")->fetchAll();
foreach ($selectFiltros as $filtros) {
  $pesquisa = $filtros['pesquisa'];
}

if ($pesquisa == null || $pesquisa == " ") {
  $pesquisa = "Anúncios";
}

$titulo = $pesquisa;
$pagina = "Winter - " . $titulo;
include_once '../Include_once/head.php';

setcookie("cookiePesquisa", $pesquisa, time() + 3600, "/");
$cookiePesquisa = $_COOKIE['cookiePesquisa'];
if ($pesquisa != null && $pesquisa != "Anúncios" && $pesquisa != $cookiePesquisa) {
  $insertPesquisa = $con->query("INSERT INTO pesquisas (idUser,pesquisa) VALUES('$idUser','$pesquisa')")->fetchAll();
  // Caso a pesquisa anterior for a mesma dentro de 1 hora, não inserir no histórico
}

?>

<body>
  <?php include_once '../Include_once/menuSlide.php';




  // Filtrar por preço mínimo
  $precoMin = $filtros['precoMin'];
  if ($precoMin != null) {
    $precoMinimo = "preco >= $precoMin AND";
  } else {
    $precoMinimo = "";
  }

  // Filtrar por preço máximo
  $precoMax = $filtros['precoMax'];
  if ($precoMax != null) {
    $precoMaximo = "preco <= $precoMax AND";
  } else {
    $precoMaximo = "";
  }

  // Filtrar por relevancia, views, preço ou data de criação
  $ordem = $filtros['ordem'];
  if ($ordem == 1) {
    $ordem = "ORDER BY visualizacoes DESC";
  } else if ($ordem == 3) {
    $ordem = "ORDER BY preco ASC";
  } else if ($ordem == 4) {
    $ordem = "ORDER BY preco DESC";
  } else {
    $ordem = "ORDER BY datacriacao DESC";
  }



  error_reporting(0);
  $pagina = 1;
  if (isset($_GET['pagina']))
    $pagina = filter_input(INPUT_GET, "pagina", FILTER_VALIDATE_INT);
  if (!$pagina)
    $pagina = 1;
  $paginacao = $_GET['paginacao'];
  $limite = 99;
  $inicio = ($pagina * $limite) - $limite;
  if ($pesquisa == "O que procuras?") {
    $pesquisa = "";
  }

  $result = $con->query("SELECT * FROM anuncios WHERE $precoMinimo $precoMaximo titulo LIKE '%" . $pesquisa . "%' $ordem LIMIT $inicio, $limite")->fetchAll(); /* ORDER BY dataCriacao DESC */
  $registros = $con->query("SELECT COUNT(idAnuncio) count FROM anuncios WHERE $precoMinimo $precoMaximo titulo LIKE '%" . $pesquisa . "%' ")->fetch()["count"];
  $paginas = ceil($registros / $limite);
  $calculoAnuncio = $registros - $inicio;  ?>
  <div id="regisros"> <?php echo $registros . " anúncios"; ?> </div>

  <?php if ($registros == null) { ?>
    <div id="semAnuncio"> Nenhum resultado para: "<?php echo $pesquisa ?>"</div>
  <?php }
  include_once '../Include_once/anuncios.php';
  // include_once '../Include_once/paginacaoPesquisa.php';
  ?>
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