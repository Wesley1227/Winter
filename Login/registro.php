<?php include_once '../Include_once/conexao.php';
$titulo = "Registar-se";
$pagina = "Winter - " . $titulo;
include_once '../Include_once/head.php';

if (!empty($_SESSION['idUser'])) {
    ?>
    <script>
    if (window.location.href.indexOf('../PHP/index.php') === -1) {
        window.location.href = '../PHP/index.php';
    }
    </script>
    <?php
}
?>

<body>
    <form id="formLogin" method="post" onsubmit="return validaFormulario()">
        <div class="login">
            <div class="caixa">
                <h1>
                    <div id="erroSenha" class="error">Registo</div>
                </h1>
                <input type="text" name="user" placeholder="Usuário:" required maxlength="12" />
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" id="senha" name="senha" placeholder="Senha" oninput="verificaPassword()" />
                <input type="password" id="verificacao" name="verificacao" placeholder="Confirme a senha" oninput="verificaPassword()" />
                <input type="text" minlength="9" maxlength="9" name="nif" placeholder="NIF" required />
                <div id="erroMensagem" class="error"></div>

                <script>
                    function verificaPassword() {
                        var senha = document.getElementById("senha").value;
                        var verificacao = document.getElementById("verificacao").value;
                        var registrar = document.getElementById("registrar");
                        var mensagemErro = document.getElementById("erroSenha");

                        if (senha === verificacao) {
                            registrar.disabled = false;
                            mensagemErro.textContent = "Registro";
                            mensagemErro.style.color = "white";
                        } else {
                            registrar.disabled = true;
                            mensagemErro.textContent = "As senhas não coincidem.";
                            mensagemErro.style.color = "red";
                        }
                    }

                    function validaFormulario() {
                        var formData = new FormData(document.getElementById('formLogin'));
                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "registrar.php", true);
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState == 4 && xhr.status == 200) {
                                var resposta = xhr.responseText.trim();
                                console.log(resposta); // Adicione esta linha para depuração
                                var mensagemErro = document.getElementById("erroMensagem");

                                if (resposta === "email_existe") {
                                    mensagemErro.textContent = "Email já está registrado.";
                                    mensagemErro.style.color = "red";
                                } else if (resposta === "user_existe") {
                                    mensagemErro.textContent = "Nome de usuário já está registrado.";
                                    mensagemErro.style.color = "red";
                                } else if (resposta === "nif_existe") {
                                    mensagemErro.textContent = "NIF já está registrado.";
                                    mensagemErro.style.color = "red";
                                } else if (resposta === "registro_sucesso") {
                                    window.location.href = "../PHP/conta.php?idPag=4";
                                } else {
                                    mensagemErro.textContent = "Erro ao registrar. Tente novamente.";
                                    mensagemErro.style.color = "red";
                                }
                            }
                        };
                        xhr.send(formData);
                        return false;
                    }
                </script>
                <button type="submit" id="registrar" disabled>Registar</button>
                <p>Já tem conta? <a href="#" onclick="abrirModalLogin()"><span>Login</span></p></a>
            </div>
        </div>
    </form>
</body>
<?php include_once('../Include_once/footer.php') ?>
</html>