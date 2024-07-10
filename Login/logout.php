<?php

if (!isset($_SESSION)) {
    session_start();
}

// Verificar se o utilizador está logado e tem um id de utilizador definido
if (isset($_SESSION['idUser'])) {
    include_once ('../Include_once/conexao.php');

    $idUser = $_SESSION['idUser'];

    // Atualizar o status do utilizador para 1
    $updateStatusQuery = "UPDATE user SET status=1 WHERE idUser=$idUser";
    if ($conn->query($updateStatusQuery) !== TRUE) {
        echo "Erro ao atualizar o status: " . $conn->error;
    }
}

session_destroy();

header("Location: ../PHP/index.php");
exit();
?>