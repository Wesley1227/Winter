<?php $mysqli = new mysqli("localhost", "root", "", "winter");
$query = "select idAnuncio, titulo, preco, descricao,  localizacao, estadoProduto from anuncios";

$resultado = $mysqli->query($query); 
$registo = mysqli_fetch_assoc($resultado); 

	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "winter";

	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

	// PESQUISAS
	$querySub = "SELECT * FROM subcategoria";
	$queryDenuncias = "SELECT * FROM denuncias ORDER BY dataDenuncia DESC";
