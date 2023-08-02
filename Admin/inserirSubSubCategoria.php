<?php $mysqli = new mysqli("localhost", "root", "", "winter");
$query = "select id, nome, idSubCategoria from subsubcategoria";
$resultado = $mysqli->query($query); 
$registo = mysqli_fetch_assoc($resultado); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $nome = $_POST['nome'];
   $idSubCategoria = $_POST['idSubCategoria'];

   $sql = "INSERT INTO winter.subsubcategoria 
        (nome,idSubCategoria)
        VALUES 
        ('$nome','$idSubCategoria')";
   if (mysqli_query($mysqli, $sql)) {
      include "../Admin/admin.php";
   } else {
      echo "Error: " . $sql . ":-" . mysqli_error($mysqli);
   }
   mysqli_close($mysqli);
   
}
?> 






