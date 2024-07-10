<?php
session_start();
include_once '../Include_once/conexao.php';

$titulo = "Registar-se";
$pagina = "Winter - " . $titulo;
include_once '../Include_once/head.php';

// if (!empty($_SESSION['idUser'])) {
//     header('Location: ../PHP/index.php');
//     exit();
// }
?>

<body>

    <form id="formLogin" method="post" onsubmit="return validaFormulario()">
        <div class="login">
            <div class="caixa">
                <h1>Registo</h1>
                <input type="text" name="user" placeholder="Nome de utilizador:" required maxlength="12" />
                <div id="erroMensagemUser" class="erroMensagem"></div>

                <input type="email" name="email" placeholder="Email" required />
                <div id="erroMensagemEmail" class="erroMensagem"></div>

                <input type="password" minlength="6" id="senha" name="senha" placeholder="Senha" required oninput="verificaPassword()" />
                <input type="password" id="verificacao" name="verificacao" placeholder="Confirme a senha" required oninput="verificaPassword()" />
                <div id="erroMensagemSenha" class="erroMensagem"></div>

                <input type="text" minlength="9" maxlength="9" name="nif" id="nif" placeholder="NIF" required />
                <div id="erroMensagemNif" class="erroMensagem"></div>
            </div>
        </div>
        <div id="fimFormRegisto">
            <input type="checkbox" name="termos" id="termosCondicoes">
            <label for="termosCondicoes">Concordo com os <a href="#" style=" font-weight: bold; color:black; font-size:20px;" id="linkTermos">termos e condições.</a></label>
            <div id="termosPopup" style="display: none;">
                <?php include_once('../Include_once/termosCondicoes.php'); ?>
                <br>
            </div><br>
            <input type="checkbox" name="termos" id="" required>Sou titular do NIF
            <br><br>
            <?php
            if (isset($_SESSION['idUser']) == null) { ?>
                <button type="submit" id="registrar" onclick="verificarNIF()" disabled>Registar</button>
                <p>Já tem conta? <a style=" font-weight: bold; color:black; font-size:20px;" href="#" onclick="abrirModalLogin()"><span>Login</span></a></p>
            <?php }
            ?>

        </div>
    </form>

    <script>
        function abrirPopup() {
            document.getElementById('termosPopup').style.display = 'flex';
        }

        function fecharPopup() {
            document.getElementById('termosPopup').style.display = 'none';
        }

        document.getElementById('linkTermos').addEventListener('click', function(event) {
            event.preventDefault();
            abrirPopup();
        });

        document.getElementById('termosCondicoes').addEventListener('change', function() {
            var registrar = document.getElementById('registrar');

            if (this.checked) {
                registrar.disabled = false;
            } else {
                registrar.disabled = true;
            }
        });


        function verificaPassword() {
            var senha = document.getElementById("senha").value;
            var verificacao = document.getElementById("verificacao").value;
            var registrar = document.getElementById("registrar");
            var mensagemErroSenha = document.getElementById("erroMensagemSenha");

            if (senha === verificacao) {
                registrar.disabled = false;
                mensagemErroSenha.textContent = "";
            } else {
                registrar.disabled = true;
                mensagemErroSenha.textContent = "As senhas não coincidem.";
                mensagemErroSenha.style.color = "red";
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

                    var mensagemErroUser = document.getElementById("erroMensagemUser");
                    var mensagemErroEmail = document.getElementById("erroMensagemEmail");
                    var mensagemErroNif = document.getElementById("erroMensagemNif");

                    mensagemErroUser.textContent = "";
                    mensagemErroEmail.textContent = "";
                    mensagemErroNif.textContent = "";

                    if (resposta === "email_existe") {
                        mensagemErroEmail.textContent = "Email já está registado.";
                        mensagemErroEmail.style.color = "red";
                    } else if (resposta === "user_existe") {
                        mensagemErroUser.textContent = "Nome de utilizador já está registado.";
                        mensagemErroUser.style.color = "red";
                    } else if (resposta === "nif_existe") {
                        mensagemErroNif.textContent = "NIF já está registado.";
                        mensagemErroNif.style.color = "red";
                    } else if (resposta === "nif_invalido") {
                        mensagemErroNif.textContent = "NIF inválido.";
                        mensagemErroNif.style.color = "red";
                    } else if (resposta === "registro_sucesso") {
                        window.location.href = "../PHP/conta.php?idPag=4";
                    } else {
                        mensagemErroUser.textContent = "Erro ao registar. Tente novamente.";
                        mensagemErroUser.style.color = "red";
                    }
                }
            };
            xhr.send(formData);
            return false;
        }

        // Função para verificar o NIF
        function verificarNIF() {
            var nifInput = document.getElementById('nif').value;
            fetch('verificar_nif.php?nif=' + nifInput)
                .then(response => response.json())
                .then(data => {
                    var mensagemErroNif = document.getElementById("erroMensagemNif");
                    if (!data.valid) {
                        mensagemErroNif.textContent = 'NIF inválido.';
                        mensagemErroNif.style.color = 'red';
                    } else {
                        // Limpar mensagem de erro se o NIF for válido
                        mensagemErroNif.textContent = '';
                    }
                    // Habilitar ou desabilitar botão de registro baseado na validade do NIF
                    document.getElementById("registrar").disabled = !data.valid;
                })
                .catch(error => {
                    console.error('Erro:', error);
                    var mensagemErroNif = document.getElementById("erroMensagemNif");
                    mensagemErroNif.textContent = 'Erro ao verificar o NIF.';
                    mensagemErroNif.style.color = 'red';
                });
        }

        // Capturar o elemento input
        var nifInput = document.getElementById('nif');
        nifInput.addEventListener('input', function() {
            setTimeout(verificarNIF, 500);
        });
    </script>

</body>

<?php include_once('../Include_once/footer.php') ?>

</html>