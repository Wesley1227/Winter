<?php
$titulo = "Winter";
$pagina = "Winter - " . $titulo;
include_once '../Include_once/head.php'; ?>

<body>
    <form action="logar.php" id="formLogin" method="post">
        <div class="login">
            <div class="caixa">
                <h1>Login</h1>
                <input type="text" name="email" placeholder="Email ou Nome de utilizador" required />
                <input type="password" name="senha" placeholder="Senha" />
                <button type="submit">Logar</button><br>
                <p>Não tem conta? <a href="registro.php"><span>Registra-se</span></p></a><br><br>
                <p>Esqueceu sua senha? <a href=""><span>Temos pena</span></p></a>
            </div>
        </div>
    </form>
</body>
<?php include_once '../Include_once/footer.php'; ?>

</html>