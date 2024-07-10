<?php
include_once ('../Include_once/conexao.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="icon" type="image/x-icon" href="../img/Logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="../JS/js.js"></script>
    <title><?php echo $pagina ?></title>

</head>

<div class="header">
    <a href="../PHP/index.php"><img src="../img/Logo.png" alt="" id="logo"></a>

    <h1 class="title" id="titulo"><?php echo $titulo ?></h1>
</div>

<?php
$urlAtual = $_SERVER['REQUEST_URI'];
if (!isset($_SESSION)) {
    session_start();
}

?>
<!-- //////////////////// MENSAGENS \\\\\\\\\\\\\\\\\\ -->
<nav role='navigation' class="menu">
    <ul>
        <?php

        $semLogin = "Conecta-se";

        if ($_SESSION['user'] == $semLogin) { ?>
        <?php } else {
            include_once '../Include_once/Headder/mensagensNaoLidas.php';
            ?>
            <li><a href="../PHP/conta.php?idPag=1" title="Mensagens">💭<div class="mensagensNaoLidas"><?= $naoLidas ?></div>
                </a></li>
        <?php } ?>

        <!-- //////////////////// PERFIL \\\\\\\\\\\\\\\\\\ -->
        <li class="menu-hasdropdown">
            <?php
            $linkPerfil = "../PHP/conta.php?idPag=4";
            if ($_SESSION['user'] != $semLogin) {
                $linkPerfil == "../PHP/conta.php?idPag=1";
            } else {
                $linkPerfil = "../Login/login.php";
            }
            ?>
            <a>
                <?php
                if ($_SESSION['fotoPerfil'] == null) {
                    $_SESSION['fotoPerfil'] = "semFotoPerfil.png";
                } ?>
                <img src="../uploads/<?= $_SESSION['fotoPerfil'] ?>" class="miniFotoPerfil" />

                <!-- Para saber se está online ou nao -->
                <?php
                if (isset($_SESSION['idUser'])) {
                    $idUser = intval($_SESSION['idUser']); // Converte para inteiro para segurança
                    $stmt = $con->prepare("SELECT status FROM user WHERE idUser = ?");
                    $stmt->execute([$idUser]);
                    $resultStatus = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ($resultStatus) {
                        if ($resultStatus['status'] == 1) {
                            $status = "🔴";
                        } else if ($resultStatus['status'] == 2) {
                            $status = "🟢";
                        } else if ($resultStatus['status'] == 3) {
                            $status = "🔘";
                        } else {
                            $status = " ";
                        }
                    }
                }
                if (isset($_SESSION['idUser'])) { ?>
                    <div class="status"><?php echo htmlspecialchars($status, ENT_QUOTES, 'UTF-8'); ?></div>
                <?php } ?>

                <?php echo $_SESSION['user'];
                if (isset($_SESSION['user']) == null) {
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
            <a href="#"> <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                    viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->

                    <path
                        d="M224 0a128 128 0 1 1 0 256A128 128 0 1 1 224 0zM178.3 304h91.4c11.8 0 23.4 1.2 34.5 3.3c-2.1 18.5 7.4 35.6 21.8 44.8c-16.6 10.6-26.7 31.6-20 53.3c4 12.9 9.4 25.5 16.4 37.6s15.2 23.1 24.4 33c15.7 16.9 39.6 18.4 57.2 8.7v.9c0 9.2 2.7 18.5 7.9 26.3H29.7C13.3 512 0 498.7 0 482.3C0 383.8 79.8 304 178.3 304zM436 218.2c0-7 4.5-13.3 11.3-14.8c10.5-2.4 21.5-3.7 32.7-3.7s22.2 1.3 32.7 3.7c6.8 1.5 11.3 7.8 11.3 14.8v30.6c7.9 3.4 15.4 7.7 22.3 12.8l24.9-14.3c6.1-3.5 13.7-2.7 18.5 2.4c7.6 8.1 14.3 17.2 20.1 27.2s10.3 20.4 13.5 31c2.1 6.7-1.1 13.7-7.2 17.2l-25 14.4c.4 4 .7 8.1 .7 12.3s-.2 8.2-.7 12.3l25 14.4c6.1 3.5 9.2 10.5 7.2 17.2c-3.3 10.6-7.8 21-13.5 31s-12.5 19.1-20.1 27.2c-4.8 5.1-12.5 5.9-18.5 2.4l-24.9-14.3c-6.9 5.1-14.3 9.4-22.3 12.8l0 30.6c0 7-4.5 13.3-11.3 14.8c-10.5 2.4-21.5 3.7-32.7 3.7s-22.2-1.3-32.7-3.7c-6.8-1.5-11.3-7.8-11.3-14.8V454.8c-8-3.4-15.6-7.7-22.5-12.9l-24.7 14.3c-6.1 3.5-13.7 2.7-18.5-2.4c-7.6-8.1-14.3-17.2-20.1-27.2s-10.3-20.4-13.5-31c-2.1-6.7 1.1-13.7 7.2-17.2l24.8-14.3c-.4-4.1-.7-8.2-.7-12.4s.2-8.3 .7-12.4L343.8 325c-6.1-3.5-9.2-10.5-7.2-17.2c3.3-10.6 7.7-21 13.5-31s12.5-19.1 20.1-27.2c4.8-5.1 12.4-5.9 18.5-2.4l24.8 14.3c6.9-5.1 14.5-9.4 22.5-12.9V218.2zm92.1 133.5a48.1 48.1 0 1 0 -96.1 0 48.1 48.1 0 1 0 96.1 0z" />
                </svg></a>
            <input type="checkbox" id="about">
            <ul class="menu-dropdown">

                <?php if ($_SESSION['user'] == $semLogin) { ?>
                    <li><a href="#" onclick="abrirModalLogin()">Login</a></li>
                    <li><a href="../PHP/sobre.php">Sobre</a></li>
                    <?php
                } else {
                    include_once '../Include_once/Headder/config.php';
                } ?>
            </ul>
        </li>
    </ul>
</nav><br><br>
<a href="javascript:history.back()" id="voltar"><svg xmlns="http://www.w3.org/2000/svg" height="1em"
        viewBox="0 0 256 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
        <style>
            svg {
                fill: #bfbfbf
            }
        </style>
        <path
            d="M9.4 278.6c-12.5-12.5-12.5-32.8 0-45.3l128-128c9.2-9.2 22.9-11.9 34.9-6.9s19.8 16.6 19.8 29.6l0 256c0 12.9-7.8 24.6-19.8 29.6s-25.7 2.2-34.9-6.9l-128-128z" />
    </svg></a>



<!-- //////////////////// Modals \\\\\\\\\\\\\\\\\\ -->
<!-- Modal Login -->

<script>
    // Verificar se a URL contém "LoginIncorreto"
    if (window.location.href.indexOf('LoginIncorreto') !== -1) {
        // Abrir o modal de login
        abrirModalLogin();
    }

    function abrirModalLogin() {
        $.get('../Login/login.php', function (data) {
            $('#modal_login').html(data);
            $('#modal_login').show();
        });
    }
</script>
<div id="modal_login"></div>

<!-- //////////////////// Notificações \\\\\\\\\\\\\\\\\\ -->
<?php
// Com isso vou saber a quanto tempo o user entrou, se foi a pouco tempo, irá mostrar uma notificação de Bem Vindo!
$tempoLogado = 0;
$tempoFormatado = '';

if (isset($_SESSION['user']) && $_SESSION['user'] != 0) {
    // Verifica se 'timestamp_login' está definido antes de usá-lo
    if (isset($_SESSION['timestamp_login'])) {
        $tempoLogado = time() - $_SESSION['timestamp_login'];
    } else {
        // Define 'timestamp_login' se não estiver definido
        $_SESSION['timestamp_login'] = time();
        $tempoLogado = 0;
    }
    $tempoFormatado = formatarTempo($tempoLogado);
} else {
    // Se o usuário não estiver logado, define 'timestamp_login' e formata o tempo como 0
    if (!isset($_SESSION['timestamp_login'])) {
        $_SESSION['timestamp_login'] = time();
    }
    $tempoFormatado = formatarTempo($tempoLogado);
}


function formatarTempo($segundos)
{
    $horas = floor($segundos / 3600);
    if ($segundos <= 5) { ?>
        <div class="notificacao" id="notBemVindo" style="display: block; text-align:center;">
            Olá <b><?php echo $_SESSION['user'];
            if (isset($_SESSION['idUser']) != null) {
                echo "<br> Bem-vindo </b> de volta!";
            } else {
                echo "<br>Para melhor experiência!";
            }
            ?></div>
        <audio id="meuSom" src="../Sons/mg_recebida.mp3" autoplay></audio>
    <?php }
    $minutos = floor(($segundos % 3600) / 60);
    $segundos = $segundos % 60;
    return sprintf("%02d:%02d:%02d", $horas, $minutos, $segundos);
}
?>

<!-- script para tirar notificação -->
<script>
    window.setTimeout(function () {
        var notBemVindo = document.getElementById('notBemVindo');
        if (notBemVindo) {
            notBemVindo.style.transform = 'translateX(150%)';
            window.setTimeout(function () {
                notBemVindo.style.display = 'none';
            }, 1000); // Tempo de transição (1 segundo)
        }
    }, 5000); // 4 segundos
</script>



<!-- SONS -->
<!-- som ao enviar mensagem -->
<script>
    function somEnviada() {
        var som = document.getElementById('mg_enviada');
        som.play();
    }
</script>