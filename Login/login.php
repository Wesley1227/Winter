<link rel="stylesheet" type="text/css" href="../style.css">
<div class="modalBG">
    <div class="modal_login" id="">
        <div class="caixa">
            <!-- <?php //Função para saber se está na página Login
                    $urlAtual = $_SERVER['REQUEST_URI'];
                    echo "URL:" . $urlAtual;
                    if ($urlAtual == '/Winter/Login/login.php') {
                        $linkLongin = "javascript:history.back()";
                    }

                    ?>  -->

            <script>
                function fecharModalLogin() {
                    $('#modal_login').hide();
                }
                var novaURL = window.location.href.replace('LoginIncorreto', '');
                history.replaceState({}, document.title, novaURL);
                fecharModalLogin();
            </script>


            <button onclick="fecharModalLogin()" id="fecharModalLogin">Fechar</button>
            <form class="" action="../Login/logar.php" method="post">
                <h1>Login</h1>
                <input type="text" name="email" placeholder="Email ou Nome de utilizador" required />
                <input type="password" name="senha" placeholder="Senha" />
                <script>
                    if (window.location.href.indexOf('LoginIncorreto') !== -1) {
                        abrirModalLogin();
                    }
                </script>

                <button type="submit">Logar</button><br>
                <p>Não tem conta? <a href="../Login/registro.php"><span>Registra-se</span></p></a>
                <p>Esqueceu sua senha? <a href=""><span>Temos pena</span></p></a>
            </form>


        </div>
    </div>
</div>