<?php
$titulo = "Login";
$pagina = "Winter - " . $titulo;
include_once '../Include_once/head.php'; ?>

<body>
    <form action="logar.php" id="formLogin" method="post">
        <div class="login">
            <div class="caixa">
                <h1>Login</h1>
                <input type="text" name="email" placeholder="Email" required />
                <input type="password" name="senha" placeholder="Senha" />
                <button type="submit">Logar</button>
                <p>Não tem conta? <a href="registro.php"><span>Registra-se</span></p></a>
            </div>
        </div>
    </form>
</body>
<?php include_once '../Include_once/footer.php'; ?>

</html>