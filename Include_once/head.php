<?php include_once '../Include_once/conexao.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="icon" type="image/x-icon" href="../img/Logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../JS/js.js"></script>
    <title><?php echo $pagina ?></title>
</head>

<div class="header">
    <a href="../PHP/index.php"><img src="../img/1.png" alt="" id="logo"></a>
    <h1 class="title" id="titulo"><?php echo $titulo ?></h1>
</div>

<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!-- //////////////////// MENSAGENS \\\\\\\\\\\\\\\\\\ -->
<nav role='navigation' class="menu">
    <ul>
        <?php
        $semLogin = "Conecta-se →";
        if ($_SESSION['user'] == $semLogin) { ?>                  
        <?php } else { ?>
            <li><a href="#" title="Mensagens">💭 </a></li>
        <?php } ?>

        <!-- //////////////////// PERFIL \\\\\\\\\\\\\\\\\\ -->
        <li class="menu-hasdropdown">
            <a href="#">
                <?php error_reporting(0);
                if ($_SESSION['fotoPerfil'] == null) {
                    $_SESSION['fotoPerfil'] = "semFotoPerfil.png";
                }

                ?><img src="../uploads/<?= $_SESSION['fotoPerfil'] ?>" class="miniFotoPerfil" />
                <?php echo $_SESSION['user'];
                if ($_SESSION['user'] == null) {
                    $_SESSION['user'] = $semLogin;
                } ?>
                  <?php if ($_SESSION['user'] != $semLogin) { ?>
                    <label title="toggle menu" for="about"><i class="fa fa-caret-down"></i> </label>
                <?php } ?>
            </a>
            <input type="checkbox" id="about">
            <ul class="menu-dropdown">

                <?php if ($_SESSION['user'] == $semLogin) { ?>
                <?php } else {
                    include_once '../Include_once/Headder/perfil.php';
                } ?>
                <?php if ($_SESSION['user'] == "Admin") {
                    include_once '../Admin/headder.php';
                } ?>
            </ul>
        </li>

        <!-- //////////////////// FAVORITOS \\\\\\\\\\\\\\\\\\ -->
        <?php if ($_SESSION['user'] == $semLogin) {
        } else {
            include_once '../Include_once/Headder/favoritos.php';
        } ?>

        <!-- //////////////////// CONFIGURAÇÕES \\\\\\\\\\\\\\\\\\ -->
        <li class="menu-hasdropdown">
            <a href="#" id="config">⚙️ </a>
            <input type="checkbox" id="about">
            <ul class="menu-dropdown">

                <?php if ($_SESSION['user'] == $semLogin) { ?>
                    <li><a href="../Login/login.php">Logar</a></li>
                <?php
                } else {
                    include_once '../Include_once/Headder/config.php';
                } ?>
            </ul>
        </li>
    </ul>
</nav><br><br>
<a href="javascript:history.back()" id="voltar">⬅️</a>

