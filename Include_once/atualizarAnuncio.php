<?php
include_once '../Include_once/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idAnuncio = $_POST['idAnuncio'];
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    
    // Verifica se foi enviado um novo link do YouTube
    if(isset($_POST['linkYT'])) {
        $linkYT = $_POST['linkYT'];
    } else {
        // Caso contrário, mantém o link existente no banco de dados
        $sql_select = "SELECT linkYT FROM anuncios WHERE idAnuncio = ?";
        $stmt_select = $mysqli->prepare($sql_select);
        $stmt_select->bind_param("i", $idAnuncio);
        $stmt_select->execute();
        $stmt_select->bind_result($existing_linkYT);
        $stmt_select->fetch();
        $linkYT = $existing_linkYT;
        $stmt_select->close();
    }

    // Verificação e processamento do upload de imagem
    if(isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $imagem_tmp = $_FILES['imagem']['tmp_name'];
        $imagem_name = $_FILES['imagem']['name'];
        $imagem_size = $_FILES['imagem']['size'];

        // Verifica o tamanho da imagem (limite de 1MB)
        if ($imagem_size > 1024000) { // 1MB em bytes
            echo "Erro: Imagem muito grande!";
            exit;
        }

        // Verifica a extensão da imagem
        $imagem_extension = pathinfo($imagem_name, PATHINFO_EXTENSION);
        $allowed_extensions = array("jpg", "jpeg", "png", "webp");

        if (!in_array(strtolower($imagem_extension), $allowed_extensions)) {
            echo "Erro: Tipo de imagem inválido!";
            exit;
        }

        // Diretório de destino para salvar as imagens
        $diretorio_destino = '../uploads/';

        // Verifica se o diretório de destino existe, senão tenta criar
        if (!is_dir($diretorio_destino) && !mkdir($diretorio_destino, 0777, true)) {
            echo "Erro: Não foi possível criar o diretório de destino.";
            exit;
        }

        // Nome único para a imagem
        $new_image_name = uniqid("IMG-", true) . '.' . $imagem_extension;
        $imagem_destino = $diretorio_destino . $new_image_name;

        // Move o arquivo para o destino final
        if (move_uploaded_file($imagem_tmp, $imagem_destino)) {
            // Atualiza o registro no banco de dados com imagem e possivelmente linkYT
            $sql = "UPDATE anuncios SET titulo = ?, descricao = ?, preco = ?, linkYT = ?, imagem = ? WHERE idAnuncio = ?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("ssdiss", $titulo, $descricao, $preco, $linkYT, $new_image_name, $idAnuncio);
        } else {
            echo "Erro ao mover o arquivo de imagem para o diretório de destino.";
            exit;
        }
    } else {
        // Atualiza o registro no banco de dados sem imagem e possivelmente linkYT
        $sql = "UPDATE anuncios SET titulo = ?, descricao = ?, preco = ?, linkYT = ? WHERE idAnuncio = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ssdsi", $titulo, $descricao, $preco, $linkYT, $idAnuncio);
    }

    // Executa o statement preparado
    if ($stmt->execute()) {
        $stmt->close();
        header("Location: ../PHP/anuncio.php?idAnuncio=" . $idAnuncio);
        exit;
    } else {
        echo "Erro ao atualizar anúncio no banco de dados.";
    }
}
?>
