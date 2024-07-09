<?php
include_once('../Include_once/conexao.php');

if (!isset($_SESSION['idUser'])) {
    exit();
}

$idUser = $_SESSION['idUser'];
$pagina = 1;
$limite = 15; // Uma pessoa só pode ter 15 anúncios no histórico.
$inicio = ($pagina * $limite) - $limite;

// Verificar se o botão de eliminar histórico foi pressionado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['eliminarHistorico'])) {
    $queryEliminar = "DELETE FROM historicoanuncios WHERE idUser = ?";
    $stmtEliminar = $mysqli->prepare($queryEliminar);
    $stmtEliminar->bind_param("i", $idUser);
    $stmtEliminar->execute();
    $stmtEliminar->close();
}

// Buscar anúncios do histórico do user
$queryHistorico = "
    SELECT a.*
    FROM historicoanuncios h
    JOIN anuncios a ON h.idAnuncio = a.idAnuncio
    WHERE h.idUser = ?
    ORDER BY h.data DESC
    LIMIT ?, ?
";
$stmtHistorico = $mysqli->prepare($queryHistorico);
$stmtHistorico->bind_param("iii", $idUser, $inicio, $limite);
$stmtHistorico->execute();
$result = $stmtHistorico->get_result()->fetch_all(MYSQLI_ASSOC);

// Contar o total de registros no histórico
$queryContagem = "
    SELECT COUNT(*) as count
    FROM historicoanuncios
    WHERE idUser = ?
";
$stmtContagem = $mysqli->prepare($queryContagem);
$stmtContagem->bind_param("i", $idUser);
$stmtContagem->execute();
$registros = $stmtContagem->get_result()->fetch_assoc()["count"];
$paginas = ceil($registros / $limite);

echo $registros . " anúncios no histórico";
?>

<form method="POST">
    <button type="submit" name="eliminarHistorico">Eliminar Histórico</button>
</form>

<div class="anuncios">
    <?php foreach ($result as $item) :
        $idAnuncio = $item['idAnuncio'];

        // Aumentar o número de visualizações do anúncio
        $views = $item['visualizacoes'] + 1;
        // $queryView = "UPDATE anuncios SET visualizacoes = $views WHERE idAnuncio = $idAnuncio";
        // $mysqli->query($queryView);
    ?>
        <a href="./../Include_once/historico/atualizarHistorico.php?idAnuncio=<?= $item['idAnuncio'] ?>">
            <div class="itemAnuncio">
                <img class="itemImagem" alt="Image" src="../uploads/<?= $item['imagem'] ?>">
                <div class="itemInfo">
                    <h2><?php echo $item['titulo'] ?></h2>
                    <h3><?php echo $item['preco'] . "€" ?></h3>
                    <?php if ($item['localizacao'] == null) {
                        $item['localizacao'] = "Localização";
                    } ?>
                    <h4>📍<?php echo $item['localizacao'] ?></h4>
                </div>
            </div>
        </a>
    <?php endforeach; ?>
</div>

<?php
$stmtHistorico->close();
$stmtContagem->close();
$mysqli->close();
?>
