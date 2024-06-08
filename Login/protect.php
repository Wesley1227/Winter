<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['idUser'])) {
    error_reporting(0); ?>

    <div class="erro404">
        <!-- Necessita de Login :( -->
        Erro 404 <br> 
        <!-- <a href="../Login/login.php">  -->
            <button class="custom-btn" id="erro404" onclick="abrirModalLogin()">Faça login primeiro!</button>
       
    </div>
<?php
// include_once("login.php"); 
}

    //  header("Location: ".$_SERVER['HTTP_REFERER']."");
