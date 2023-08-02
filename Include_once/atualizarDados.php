<?php include_once '../Include_once/conexao.php';
include('../login/protect.php');
$email = $_SESSION['email'];
$id = $_SESSION['idUser'];
$result = $con->query("SELECT * FROM user WHERE idUser ='$id'")->fetchAll();
foreach ($result as $pessoa) :
endforeach;
$id = $_SESSION['idUser'];

if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $apelido = $_POST['apelido'];
    $genero = $_POST['genero'];
    $nif = $_POST['nif'];
    $morada = $_POST['morada'];
    $cod_postal = $_POST['cod_postal'];
    $localidade = $_POST['localidade'];
    $tipo_negocio = $_POST['tipo_negocio'];
    $user = $_POST['user'];
    $telemovel = $_POST['telemovel'];
    $img_name = $_FILES['fotoPerfil']['name'];
    $img_size = $_FILES['fotoPerfil']['size'];
    $tmp_name = $_FILES['fotoPerfil']['tmp_name'];
    $error = $_FILES['fotoPerfil']['error'];

    if ($error === 0) {
        if ($img_size > 525000) {
            $em = "Imagem muito grande!";
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png");
            if (in_array($img_ex_lc, $allowed_exs)) {
                $fotoPerfil = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = '../uploads/' . $fotoPerfil;
                move_uploaded_file($tmp_name, $img_upload_path);
            } else {
                $em = "Tipo de imagem inválido!";
            }
        }
    } else {
    }
}

if ($nome == null) {
    $nome = $pessoa['nome'];
} else {
    $nome = $_POST['nome'];
}

if ($apelido == null) {
    $apelido = $pessoa['apelido'];
} else {
    $apelido = $_POST['apelido'];
}

if ($genero == null) {
    $genero = $pessoa['genero'];
} else {
    $genero = $_POST['genero'];
}

if ($nif == null) {
    $nif = $pessoa['nif'];
} else {
    $nif = $_POST['nif'];
}

if ($morada == null) {
    $morada = $pessoa['morada'];
} else {
    $morada = $_POST['morada'];
}

if ($cod_postal == null) {
    $cod_postal = $pessoa['cod_postal'];
} else {
    $cod_postal = $_POST['cod_postal'];
}

if ($localidade == null) {
    $localidade = $pessoa['localidade'];
} else {
    $localidade = $_POST['localidade'];
}

if ($telemovel == null) {
    $telemovel = $pessoa['telemovel'];
} else {
    $telemovel = $_POST['telemovel'];
}

if ($fotoPerfil == null) {
    $fotoPerfil = $pessoa['fotoPerfil'];
}

$_SESSION['fotoPerfil'] = $fotoPerfil;
$query = "UPDATE winter.user SET nome = '$nome', apelido = '$apelido', genero = '$genero', morada = '$morada', cod_postal = '$cod_postal', localidade = '$localidade', telemovel = '$telemovel', nif = '$nif', tipo_negocio = '$tipo_negocio', fotoPerfil = '$fotoPerfil' WHERE idUser = '$id'";
if (mysqli_query($mysqli, $query)) {
} else {
    echo mysqli_error($mysqli);
}
header("Location: ../PHP/conta.php?idPag=4");
