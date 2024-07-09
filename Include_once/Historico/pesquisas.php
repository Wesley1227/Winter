<?php
include_once('../Include_once/conexao.php');

// Verificar se o user está logado
if (!isset($_SESSION['idUser'])) {
    exit(); // Termina a execução do script se o user não estiver logado
}

$idUser = $_SESSION['idUser'];

// Verificar se o botão de eliminar histórico foi pressionado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['eliminarHistorico'])) {
    $queryEliminar = "DELETE FROM pesquisas WHERE idUser = ?";
    $stmtEliminar = $con->prepare($queryEliminar);
    $stmtEliminar->bind_param("i", $idUser);
    $stmtEliminar->execute();
    $stmtEliminar->close();
}

// Buscar pesquisas do histórico do user
$result = $con->query("SELECT * FROM pesquisas WHERE idUser = $idUser ORDER BY dataPesquisa DESC")->fetchAll();
$query = "SELECT COUNT(*) AS total_pesquisas FROM pesquisas WHERE idUser = $idUser";
$resultCOUNT = $con->query($query);
$countRow = $resultCOUNT->fetch();
$totalPesquisas = $countRow["total_pesquisas"];

echo "Total de pesquisas: " . $totalPesquisas;
if ($totalPesquisas == null) {
?> <div class="semFavoritos"> Vazio </div>
<?php
}
?>

<form method="POST">
    <button type="submit" name="eliminarHistorico">Eliminar Histórico</button>
</form>

<br><br>
<div class="historicoPesquisas">
    <div id="historicoPesquisas">
        <?php
        foreach ($result as $pesquisas) {
            echo $pesquisas['pesquisa'] . " 🕒" . $pesquisas['dataPesquisa'] . "<br>";
        }
        ?>
    </div>
</div>

<?php
$con = null; // Fechar a conexão
?>
