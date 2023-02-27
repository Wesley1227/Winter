<?php

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['idUser'])) {

header("Location: ../Login/login.php");
    // error_reporting (0);
    // echo "Faça login primeiro!";
    // header("Location: ".$_SERVER['HTTP_REFERER']."&&chat=1");
    // include_once ('../Login/login.php');
}
?>