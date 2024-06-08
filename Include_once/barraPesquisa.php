<?php
if ($_SESSION['idUser'] == null) {
  $linkPesquisar = "";
  $dica = "Faça login para pesquisar";
} else {
  $linkPesquisar = "../Include_once/inserirFiltros.php";
  $dica = "O que procura?";
}
?>
<form action="<?= $linkPesquisar ?>" class="search-container" method="GET">
  <input type="text" class="pesquisaIndex" id="search-bar" for="pesquisa" name="pesquisa" placeholder="<?php echo $dica; ?>">
  <button id="lupa" type="submit"><i class="fa fa-search"></i></button>
</form><br>