<?php include_once '../Include_once/conexao.php';
$titulo = "Resgitra-se";
$pagina = "Winter - " . $titulo;
include_once '../Include_once/head.php';
?>

<body>
    <form id="formLogin" method="post">
        <div class="login">
            <div class="caixa">
                <h1>Registro</h1>
                <input type="text" name="user" placeholder="Usuário:" required maxlength="12" />
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="senha" for="senha" placeholder="Senha" />
                <input type="password" name="verificacao" for="verificacao" placeholder="Confirme a senha" />
                <?php
                if ($_POST) {
                    $user = $_POST['user'];
                    $email = $_POST['email'];
                    $senha = $_POST['senha'];
                    $verificacao  = $_POST['verificacao'];
                    if ($senha == $verificacao) { ?>
                        <script>
                            window.location.href = "registrar.php?email=<?= $email ?>&&senha=<?= $senha ?>&&user=<?= $user ?>";
                        </script>
                <?php
                    } else {
                        $mensagem = "As senhas não condizem!"; //usar uspa no lgin
                    }
                    echo "<p id='mensagem'>" . $mensagem . "</p>";
                }
                ?>
                <button type="submit">Registrar</button>
                <p>Já tem conta? <a href="#" onclick="abrirModalLogin()"><span>Loga-se</span></p></a>
            </div>
        </div>
    </form>











</body>
<?php include_once('../Include_once/footer.php') ?>

</html>