<link rel="stylesheet" type="text/css" href="../style.css">
<div class="modalBG">
    <div class="modal_login" id="modal_login">
        <div class="caixa">
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <script>
                function fecharModalLogin() {
                    $('#modal_login').hide();
                }

                $(document).ready(function() {
                    $('#loginForm').submit(function(event) {
                        event.preventDefault();

                        $.ajax({
                            type: 'POST',
                            url: '../Login/logar.php',
                            data: $(this).serialize(),
                            success: function(response) {
                                if (response.trim() === 'Login bem-sucedido!') {
                                    fecharModalLogin();
                                    window.location.reload();
                                } else {
                                    $('#mensagemErro').text(response).show();
                                }
                            }
                        });
                    });
                });

                function abrirModalLogin() {
                    $('#modal_login').show();
                }

                if (window.location.href.indexOf('LoginIncorreto') !== -1) {
                    abrirModalLogin();
                }
            </script>

            <button onclick="fecharModalLogin()" id="fecharModalLogin">Fechar</button>
            <form id="loginForm" class="" method="post">
                <h1>Login</h1>
                <input type="text" name="email" placeholder="Email, User ou NIF" required />
                <input type="password" name="senha" placeholder="Senha" />
                
                <p id="mensagemErro" style="display:none; color:red;"></p>
                
                <button type="submit">Login</button><br>
                <p>Não tem conta? <a href="../Login/registro.php"><span>Regista-se</span></a></p>
                <!-- <p>Esqueceu sua senha? <a href=""><span>Recupere-a</span></a></p> -->
            </form>
        </div>
    </div>
</div>