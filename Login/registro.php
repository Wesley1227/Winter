<?php include_once '../Include_once/conexao.php';
$titulo = "Resgitra-se";
$pagina = "Winter - " . $titulo;
include_once '../Include_once/head.php';
?>
<?php
//session_start();  Certifique-se de iniciar a sessão

/*if (isset($_SESSION['user']) && $_SESSION['user'] != 0) {
    if (isset($_SERVER['HTTP_REFERER'])) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit(); 
    }
}*/
?>


<body>
    <form id="formLogin" method="post" action="registrar.php">
        <div class="login">
            <div class="caixa">
                <h1>
                    <div id="erroSenha" class="error">Registro</div>
                </h1>
                <input type="text" name="user" placeholder="Usuário:" required maxlength="12" />
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" id="senha" name="senha" placeholder="Senha" oninput="verificaPassword()" />
                <input type="password" id="verificacao" name="verificacao" placeholder="Confirme a senha" oninput="verificaPassword()" />

                <div style="display: flex; justify-content: center;">
                </div>


                <!-- Script para verificar se a senha coincide com a verificação de senha -->
                <script>
                    function verificaPassword() {
                        var senha = document.getElementById("senha").value;
                        var verificacao = document.getElementById("verificacao").value;
                        var registrar = document.getElementById("registrar");
                        var mensagemErro = document.getElementById("erroSenha");

                        if (senha === verificacao) {
                            registrar.disabled = false;
                            mensagemErro.textContent = "Registro";
                        } else {
                            registrar.disabled = true;
                            mensagemErro.textContent = "As senhas não coincidem.";
                        }
                    }
                </script>
                <button type="submit" id="registrar" disabled>Registrar</button>
                <p>Já tem conta? <a href="#" onclick="abrirModalLogin()"><span>Loga-se</span></p></a>
                <br> Parte visual em desenvolvimento <br>

            </div>
        </div>
    </form>











</body>
<?php include_once('../Include_once/footer.php') ?>

</html>