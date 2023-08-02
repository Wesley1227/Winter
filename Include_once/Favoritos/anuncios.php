<?php 
$idUserSESSION = $_SESSION["idUser"];


$result = $con->query("SELECT * FROM anunciosFavoritos WHERE idUser ='$idUserSESSION'")->fetchAll();
foreach ($result as $pessoa) {
    $idFavorito = $pessoa["idFavorito"];
    $idAnuncio = $pessoa["idAnuncio"];
    $idUser = $pessoa["idUser"];
    $data = $pessoa["data"];
    
    echo $idFavorito . " - ". $idAnuncio . " - " . $idUser . " - " . $data; ?> <br><?php 
}
?>