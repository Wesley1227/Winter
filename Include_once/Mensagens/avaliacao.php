<?php
include_once('../conexao.php');
include_once('../../Login/protect.php');
$idUser = $_GET['idUser'];
$idAnuncio = $_GET['idAnuncio'];
if (!$idUser || !$idAnuncio) {
    header("Location: erro.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nota = $_POST['nota'];
    $comentario = $_POST['comentario'];

    if ($nota < 1 || $nota > 5) {
        echo "A nota deve estar entre 1 e 5.";
        exit;
    }

    $nota = mysqli_real_escape_string($conn, $nota);
    $comentario = mysqli_real_escape_string($conn, $comentario);

    $checkQuery = "SELECT * FROM avaliacoes WHERE idAnunciante='$idUser' AND idUser='{$_SESSION['idUser']}'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        // Atualizar a avaliação existente
        $updateQuery = "UPDATE avaliacoes SET nota='$nota', comentario='$comentario' WHERE idAnunciante='$idUser' AND idUser='{$_SESSION['idUser']}'";
        if ($conn->query($updateQuery) === TRUE) {
            echo "Avaliação atualizada com sucesso!";
        } else {
            echo "Erro ao atualizar avaliação: " . $conn->error;
        }
    } else {
        // Inserir a nova avaliação
        $insertQuery = "INSERT INTO avaliacoes (idAnunciante, idUser, nota, comentario) VALUES ('$idUser', '{$_SESSION['idUser']}', '$nota', '$comentario')";
        if ($conn->query($insertQuery) === TRUE) {
            echo "Avaliação inserida com sucesso!";
        } else {
            echo "Erro ao inserir avaliação: " . $conn->error;
        }
    }

    echo "<script>window.location.href = '../../PHP/conta.php?idAnuncio=$idAnuncio&&idUser=$idUser';</script>";
    exit;
}
?>

<h2>Avaliar Vendedor</h2>
<form action="" method="POST">
    <input type="hidden" name="idUser" value="<?= $idUser ?>">
    <input type="hidden" name="idAnuncio" value="<?= $idAnuncio ?>">
    <label for="nota">Nota:</label>
    <input type="number" id="nota" name="nota" min="1" max="5" required><br><br>
    <label for="comentario">Comentário:</label><br>
    <textarea id="comentario" name="comentario" rows="4" cols="50" required></textarea><br><br>
    <button type="submit">Enviar Avaliação</button>
</form>
