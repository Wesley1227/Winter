<?php $mysqli = new mysqli("localhost", "root", "", "winter");
$query = "SELECT * FROM anuncios";
$resultado = $mysqli->query($query); 
$registo = mysqli_fetch_assoc($resultado); 


	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "winter";
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	$con = new PDO("mysql:host=localhost;dbname=winter", "root", "");
?>



