<?php
header('Content-Type: text/plain');

function verificarNIF($nif) {
    // Formatar o URL com o NIF inserido
    $url = 'https://www.nif.pt/?q=' . $nif;
    
    // Inicializar cURL para fazer a requisição GET
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); // Seguir redirecionamentos
    
    // Executar a requisição e obter a resposta
    $response = curl_exec($curl);
    
    // Verificar se houve algum erro na requisição
    if ($response === false) {
        curl_close($curl);
        return false;
    }
    
    // Fechar a sessão cURL
    curl_close($curl);
    
    // Verificar se a resposta contém a mensagem de NIF válido
    return strpos($response, 'O NIF indicado é válido') !== false;
}

// Verificar se foi enviado o parâmetro 'nif'
if (isset($_GET['nif'])) {
    $nif = $_GET['nif'];
    $resultado = verificarNIF($nif);
    
    // Retornar 'true' ou 'false' dependendo do resultado da verificação
    if ($resultado) {
        echo 'true';
    } else {
        echo 'false';
    }
} else {
    echo 'Parâmetro NIF não foi fornecido.';
}
?>
