<?php
include_once '../Include_once/conexao.php';
include_once '../Login/protect.php';

$registo = mysqli_fetch_assoc($resultado);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $titulo = $_POST['titulo'];
   $localizacao = $_POST['localizacao'];
   $categoria = $_POST['categoria'];
   $subCategoria = $_POST['subCategoria'];
   $subSubCategoria = $_POST['subSubCategoria'];
   $estadoProduto = $_POST['estadoProduto'];
   $intensaoAnuncio = $_POST['intAnuncio'];
   $descricao = $_POST['descricao'];
   $preco = $_POST['preco'];
   $marca = $_POST['marca'];
   $vendedor = $_SESSION['idUser'];
   $img_name = $_FILES['imagem']['name'];
   $img_size = $_FILES['imagem']['size'];
   $tmp_name = $_FILES['imagem']['tmp_name'];
   $error = $_FILES['imagem']['error'];

   if ($error === 0) {
      if ($img_size > 1025000) {
         $em = "Imagem muito grande!";
      } else {
         $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
         $img_ex_lc = strtolower($img_ex);
         $allowed_exs = array("jpg", "jpeg", "png", "webp");
         if (in_array($img_ex_lc, $allowed_exs)) {
            $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
            $img_upload_path = '../uploads/' . $new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);
         } else {
            $em = "Tipo de imagem inválido!";
         }
      }
   } else {
   }

   if (empty($new_img_name)) {
      $new_img_name = "semImagem.jpg";
   }

   $sql = "INSERT INTO winter.anuncios 
        (titulo,localizacao,idCategoria,estadoProduto,intAnuncio,descricao,preco,subCategoria,subSubCategoria,marca,imagem,idUser)
        VALUES ('$titulo','$localizacao','$categoria','$estadoProduto','$intensaoAnuncio','$descricao','$preco','$subCategoria','$subSubCategoria','$marca','$new_img_name','$vendedor')";

   if (mysqli_query($mysqli, $sql)) {
      $resultID = $con->query("SELECT * FROM anuncios WHERE titulo = '$titulo' AND idUser = '$vendedor'")->fetchAll();
      foreach ($resultID as $user) :
         $idAnuncio = $user['idAnuncio'];
      endforeach;
      header("Location: ../PHP/anuncio.php?idAnuncio=$idAnuncio");
   } else {
      echo "Error: " . $sql . ":-" . mysqli_error($mysqli);
   }
   mysqli_close($mysqli);
}
