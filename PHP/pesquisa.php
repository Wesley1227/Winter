<?php include_once '../Include_once/conexao.php';
error_reporting(0);
$pesquisa = $_GET['pesquisa'];
if ($pesquisa == null) {
  $pesquisa = "Anúncios";
  // header("Location: " . $_SERVER['HTTP_REFERER'] . "");
  // Caso a pesquisa == null, voltar pápgina anterior
}
$titulo = $pesquisa;
$pagina = "Winter - " . $titulo;
include_once '../Include_once/head.php';
$idUser = $_SESSION['idUser'];
if ($idUser == null) {
  $idUser = 0;
} // Caso não tiver logado, o ID ser 0


setcookie("cookiePesquisa", $pesquisa, time() + 3600, "/");
$cookiePesquisa = $_COOKIE['cookiePesquisa'];
if ($pesquisa != null && $pesquisa != $cookiePesquisa) {
  $insertPesquisa = $con->query("INSERT INTO pesquisas (idUser,pesquisa) VALUES('$idUser','$pesquisa')")->fetchAll();
} // Caso a pesquisa anterior for a mesma dentro de 1 hora, não inserir no histórico
?>

<body>
  <?php include_once '../Include_once/menuSlide.php';
  error_reporting(0);
  $pagina = 1;
  if (isset($_GET['pagina']))
    $pagina = filter_input(INPUT_GET, "pagina", FILTER_VALIDATE_INT);
  if (!$pagina)
    $pagina = 1;
  $paginacao = $_GET['paginacao'];
  
  $limite = 12;
  $inicio = ($pagina * $limite) - $limite;

  $precoMin = $_GET['precoMin'];
  if ($precoMin != null) {
    $precoMinimo = "preco >= $precoMin AND";
  } else {
    $precoMinimo = "";
  }

  $con = new PDO("mysql:host=localhost;dbname=winter", "root", "");
  $result = $con->query("SELECT * FROM anuncios WHERE $precoMinimo titulo LIKE '%" . $pesquisa = $_GET['pesquisa'] . "%' ORDER BY datacriacao DESC LIMIT $inicio, $limite")->fetchAll(); /* ORDER BY dataCriacao DESC */
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