<?php 
include_once '../Include_once/conexao.php';

//////////////////////////////////////////SUB CATEGORIA//////////////////////////////////////////////////////
if (isset($_POST['idCategoria'])) {
	$query = " SELECT * FROM subcategoria where idCategoria=$_POST[idCategoria] ORDER BY nome";
	$result = $conn->query($query);
	if ($result->num_rows > 0 ) {
			echo '<option value="">Selecione uma subcategoria</option>';
		 while ($row = $result->fetch_assoc()) {
		 	echo '<option value='.$row['id'].'>'.$row['nome'].'</option>';
		 }
	}else{
		echo '<option>Subcategoria não encontrada</option>';
	}

//////////////////////////////////////////SUB-SUB CATEGORIA//////////////////////////////////////////////////////
}elseif (isset($_POST['idSubCategoria'])) {
	$query = " SELECT * FROM subsubcategoria where idSubCategoria=$_POST[idSubCategoria] ORDER BY nome";
	$result = $conn->query($query);
	if ($result->num_rows > 0 ) {
			echo '<option value="">Escolha uma Sub-subcategoria</option>';
		 while ($row = $result->fetch_assoc()) {
		 	echo '<option value='.$row['id'].'>'.$row['nome'].'</option>';
		 }
	}else{
		echo '<option>Sub-subcategoria não encontrada</option>';
	}
}
?>