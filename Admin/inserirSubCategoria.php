<?php $mysqliSubcategoria = new mysqli("localhost", "root", "", "winter");
$querySubcategoria = "select id, nome, idCategoria from subcategoria";
$resultadoSubcategoria = $mysqliSubcategoria->query($querySubcategoria); 
$registoSubcategoria = mysqli_fetch_assoc($resultadoSubcategoria); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $nome = $_POST['nome'];
   $idCategoria = $_POST['idCategoria'];

   $sql = "INSERT INTO winter.subcategoria 
        (nome,idCategoria)
        VALUES 
        ('$nome','$idCategoria')";
   if (mysqli_query($mysqliSubcategoria, $sql)) {
      include "../Admin/admin.php";
   } else {
      echo "Error: " . $sql . ":-" . mysqli_error($mysqli);
   }
   mysqli_close($mysqliSubcategoria);
   
}
?> 






