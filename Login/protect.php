<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['idUser'])) {
    error_reporting(0); ?>

    <div class="erro404">
        Erro 404 <br>
       <a href="../Login/login.php"> <button class="custom-btn" id="erro404">Faça login primeiro!</button></a>
    </div>
<?php }
//echo "Faça login primeiro!";
    // header("Location: ../Login/login.php");
    // header("Location: ".$_SERVER['HTTP_REFERER']."&&chat=1");
    // include_once ('../Login/login.php');