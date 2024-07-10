<?php
include_once '../Include_once/conexao.php';

// Verifica se o parâmetro idAnuncio foi passado via GET
if (isset($_GET['idAnuncio'])) {
    $idAnuncio = $_GET['idAnuncio'];
    
    // Prepara a primeira query para deletar da tabela historicoanuncios
    $sql1 = "DELETE FROM historicoanuncios WHERE idAnuncio ='$idAnuncio'";
    
    // Prepara a segunda query para deletar da tabela anuncios
    $sql2 = "DELETE FROM anuncios WHERE idAnuncio ='$idAnuncio'";
    
    // Executa a primeira query
    if (mysqli_query($mysqli, $sql1)) {
        // Executa a segunda query
        if (mysqli_query($mysqli, $sql2)) {
            // Ambas as queries foram executadas com sucesso
            // Redireciona ou exibe uma mensagem de sucesso
            header("Location: ../PHP/index.php");
        } else {
            // Se houver erro na segunda query
            echo "Erro ao deletar anúncio: " . mysqli_error($mysqli);
        }
    } else {
        // Se houver erro na primeira query
        echo "Erro ao deletar histórico do anúncio: " . mysqli_error($mysqli);
    }
} else {
    // Se o parâmetro idAnuncio não foi passado via GET
    echo "ID de Anúncio não especificado.";
}
?>
