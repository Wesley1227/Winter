<?php
// Teste
include_once('conexao.php');

session_start();

$idUser = $_SESSION['idUser'];
$response = ['novas_mensagens' => false, 'mensagem' => ''];

// Verificar se o utilizador está logado
if (!empty($idUser)) {
    $query = "SELECT * FROM chat WHERE idDestinatario = ? AND visualizacao = 0 ORDER BY dataEnvio DESC LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $idUser);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $mensagem = $result->fetch_assoc();
        $response['novas_mensagens'] = true;
        $response['mensagem'] = $mensagem['mensagem'];
    }
}

echo json_encode($response);
