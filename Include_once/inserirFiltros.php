<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['idUser']) || empty($_SESSION['idUser'])) {
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}

// Incluir arquivo de conexão com o banco de dados
include_once('conexao.php');

$idUser = $_SESSION['idUser'];

// Recuperar valores dos filtros da URL
$pesquisa = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '';
$precoMin = isset($_GET['precoMin']) ? $_GET['precoMin'] : '';
$precoMax = isset($_GET['precoMax']) ? $_GET['precoMax'] : '';
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';
$subCategoria = isset($_GET['subCategoria']) ? $_GET['subCategoria'] : '';
$subSubCategoria = isset($_GET['subSubCategoria']) ? $_GET['subSubCategoria'] : '';
$ordem = isset($_GET['ordem']) ? $_GET['ordem'] : '';

// Verificar se já existem filtros para o usuário
$selectFiltros = $con->prepare("SELECT * FROM filtros WHERE idUser = :idUser");
$selectFiltros->bindParam(':idUser', $idUser, PDO::PARAM_INT);
$selectFiltros->execute();
$filtros = $selectFiltros->fetch(PDO::FETCH_ASSOC);

if (!$filtros) {
    // Se não houver filtros, INSERT
    $queryFiltros = "INSERT INTO filtros (idUser, pesquisa, precoMin, precoMax, ordem, idCategoria,idSubCategoria,idSubSubCategoria) 
                     VALUES (:idUser, :pesquisa, :precoMin, :precoMax, :ordem, :idCategoria, :idSubCategoria, :idSubSubCategoria)";
} else {
    // Se houver filtros, UPDATE mantendo os valores anteriores se não forem modificados
    $queryFiltros = "UPDATE filtros SET 
                        pesquisa = COALESCE(:pesquisa, pesquisa),
                        precoMin = COALESCE(:precoMin, precoMin),
                        precoMax = COALESCE(:precoMax, precoMax),
                        ordem = COALESCE(:ordem, ordem),
                        idCategoria = COALESCE(:idCategoria, idCategoria),
                        idSubCategoria = COALESCE(:idSubCategoria, idSubCategoria),
                        idSubSubCategoria = COALESCE(:idSubSubCategoria, idSubSubCategoria)
                    WHERE idUser = :idUser";
}

$stmt = $con->prepare($queryFiltros);
$stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
$stmt->bindParam(':pesquisa', $pesquisa, PDO::PARAM_STR);
$stmt->bindParam(':precoMin', $precoMin, PDO::PARAM_STR);
$stmt->bindParam(':precoMax', $precoMax, PDO::PARAM_STR);
$stmt->bindParam(':ordem', $ordem, PDO::PARAM_STR);
$stmt->bindParam(':idCategoria', $categoria, PDO::PARAM_INT);
$stmt->bindParam(':idSubCategoria', $subCategoria, PDO::PARAM_INT);
$stmt->bindParam(':idSubSubCategoria', $subSubCategoria, PDO::PARAM_INT);
$stmt->execute();

// Redirecionar para a página de pesquisa após atualização
header('Location: ../PHP/pesquisa.php');
exit;
?>
