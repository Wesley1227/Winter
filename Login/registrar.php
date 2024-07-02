<?php
include_once('../Include_once/conexao.php');

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $user = $_POST['user'];
    $nif = $_POST['nif'];

    // Verificar se o email já existe
    $queryCheckEmail = "SELECT * FROM winter.user WHERE email='$email'";
    $resultCheckEmail = mysqli_query($mysqli, $queryCheckEmail);

    if (mysqli_num_rows($resultCheckEmail) > 0) {
        echo "email_existe";
        exit();
    }

    // Verificar se o nome de usuário já existe
    $queryCheckUser = "SELECT * FROM winter.user WHERE user='$user'";
    $resultCheckUser = mysqli_query($mysqli, $queryCheckUser);

    if (mysqli_num_rows($resultCheckUser) > 0) {
        echo "user_existe";
        exit();
    }

    // Verificar se o NIF já existe
    $queryCheckNif = "SELECT * FROM winter.user WHERE nif='$nif'";
    $resultCheckNif = mysqli_query($mysqli, $queryCheckNif);

    if (mysqli_num_rows($resultCheckNif) > 0) {
        echo "nif_existe";
        exit();
    }

    $senha = $_POST['senha'];
    $query = "INSERT INTO winter.user (user, email, senha, fotoPerfil, nif) VALUES ('$user','$email','$senha','semFotoPerfil.png','$nif')";

    if (mysqli_query($mysqli, $query)) {
        $result = $mysqli->query("SELECT * FROM winter.user WHERE email='$email' AND senha='$senha'")->fetch_assoc();

        if ($result) {
            session_start();

            $_SESSION['idUser'] = $result['idUser'];
            $_SESSION['user'] = $result['user'];
            $_SESSION['email'] = $result['email'];

            echo "registro_sucesso";
        } else {
            echo "erro_sessao";
        }
    } else {
        echo "erro_registro: " . mysqli_error($mysqli);
    }
} else {
    echo "dados_invalidos";
}
?>
