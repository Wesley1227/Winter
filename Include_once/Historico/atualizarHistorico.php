<?php
include_once('../conexao.php');

// Iniciar sessão
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['idUser']) || !isset($_GET['idAnuncio'])) {
    exit(); // Termina a execução do script se o usuário não estiver logado ou se não houver idAnuncio
}

$idUser = $_SESSION['idUser'];
$idAnuncio = $_GET['idAnuncio'];

// Função para adicionar ou atualizar o histórico de anúncios
function atualizarHistorico($mysqli, $idUser, $idAnuncio) {
    $queryCheckHistorico = "SELECT * FROM historicoanuncios WHERE idUser = ? AND idAnuncio = ?";
    $stmtCheck = $mysqli->prepare($queryCheckHistorico);
    $stmtCheck->bind_param("ii", $idUser, $idAnuncio);
    $stmtCheck->execute();
    $resultCheck = $stmtCheck->get_result();

    if ($resultCheck->num_rows > 0) {
        // Se o anúncio já estiver no histórico, atualiza a data
        $queryUpdateHistorico = "UPDATE historicoanuncios SET data = NOW() WHERE idUser = ? AND idAnuncio = ?";
        $stmtUpdate = $mysqli->prepare($queryUpdateHistorico);
        $stmtUpdate->bind_param("ii", $idUser, $idAnuncio);
        $stmtUpdate->execute();
        $stmtUpdate->close();
    } else {
        // Se o anúncio não estiver no histórico, insere um novo registro
        $queryInsertHistorico = "INSERT INTO historicoanuncios (idUser, idAnuncio, data) VALUES (?, ?, NOW())";
        $stmtInsert = $mysqli->prepare($queryInsertHistorico);
        $stmtInsert->bind_param("ii", $idUser, $idAnuncio);
        $stmtInsert->execute();
        $stmtInsert->close();
    }

    $stmtCheck->close();
}

// Chamar a função de atualização do histórico
atualizarHistorico($mysqli, $idUser, $idAnuncio);

// Redirecionar para o anúncio após atualizar o histórico
header("Location: ../../PHP/anuncio.php?idAnuncio=$idAnuncio");
?>
