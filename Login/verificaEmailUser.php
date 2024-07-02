<?php
include_once('../Include_once/conexao.php');

$response = array("email" => "nao_existe", "user" => "nao_existe");

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $query = "SELECT * FROM winter.user WHERE email='$email'";
    $result = mysqli_query($mysqli, $query);

    if (mysqli_num_rows($result) > 0) {
        $response['email'] = "existe";
    }
}

if (isset($_POST['user'])) {
    $user = $_POST['user'];
    $query = "SELECT * FROM winter.user WHERE user='$user'";
    $result = mysqli_query($mysqli, $query);

    if (mysqli_num_rows($result) > 0) {
        $response['user'] = "existe";
    }
}

echo json_encode($response);
?>
