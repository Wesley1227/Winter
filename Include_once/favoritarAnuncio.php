<?php
include_once('conexao.php');
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["idAnuncio"]) && isset($_POST["idUser"])) {
  $idAnuncio = $_POST["idAnuncio"];
  $idUser = $_POST["idUser"];
  $insertFavorito = $con->query("INSERT INTO anunciosfavoritos (idAnuncio,idUser) VALUES('$idAnuncio','$idUser')")->fetchAll();
  // Faça o que precisar com os valores recebidos
  // Por exemplo, atualize a base de dados, execute uma ação específica, etc.

  echo "Dados recebidos: idAnuncio = $idAnuncio, idUser = $idUser";
}
?>
