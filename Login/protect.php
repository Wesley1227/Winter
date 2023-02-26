<?php

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['idUser'])) {
    header("location: ../Login/login.php");
}
?>