<div class="modal_login" id="">
    <div class="caixa">
        <button onclick="fecharModalLogin()" id="fecharModalLogin">Fechar</button>

        <form class="" action="../Login/logar.php" method="post">
            <script>
                function fecharModalLogin() {
                    $('#modal_login').hide();
                }
            </script>

            <h1>Login</h1>
            <input type="text" name="email" placeholder="Email ou Nome de utilizador" required />
            <input type="password" name="senha" placeholder="Senha" />
            <button type="submit">Logar</button><br>
            <p>Não tem conta? <a href="../Login/registro.php"><span>Registra-se</span></p></a>
            <p>Esqueceu sua senha? <a href=""><span>Temos pena</span></p></a>
        </form>
    </div>
</div>