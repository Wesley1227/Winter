
<?php $mysqliMarca = new mysqli("localhost", "root", "", "winter");
$queryMarca = "SELECT idMarca, marca FROM marca";
$resultadoMarca = $mysqliMarca->query($queryMarca);
$registoMarca = mysqli_fetch_assoc($resultadoMarca);
$registoMarca = mysqli_fetch_assoc($resultadoMarca);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $marca = $_POST['marca'];

   $sql = "INSERT INTO winter.marca (marca) VALUES ('$marca')";
   if (mysqli_query($mysqliMarca, $sql)) {
      include "../Admin/admin.php";
   } else {
      echo "Error: " . $sql . ":-" . mysqli_error($mysqliMarca);
   }
   mysqli_close($mysqliMarca);
}

?>







