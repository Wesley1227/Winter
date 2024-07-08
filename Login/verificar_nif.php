<?php
header('Content-Type: application/json');

function verificarNIF($nif)
{

    $url = 'https://www.nif.pt/?q=' . $nif;

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

    $response = curl_exec($curl);

    if ($response === false) {
        curl_close($curl);
        return ['valid' => false, 'message' => 'Erro ao verificar o NIF.'];
    }

    curl_close($curl);

    if (strpos($response, 'O NIF indicado é válido') !== false) {
        return ['valid' => true, 'message' => 'NIF válido.'];
    } else {
        return ['valid' => false, 'message' => 'NIF inválido.'];
    }
}

if (isset($_GET['nif'])) {
    $nif = $_GET['nif'];
    $resultado = verificarNIF($nif);

    echo json_encode($resultado);
} else {
    echo json_encode(['valid' => false, 'message' => 'Parâmetro NIF não foi fornecido.']);
}