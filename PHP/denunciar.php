<?php include_once '../Include_once/conexao.php';
$titulo = "Denúnciando o(a):";
$pagina = "Winter - " . $titulo;
include_once '../Include_once/head.php';
$idUser = $_SESSION['idUser'];
$idChat = $_GET['idChat'];
$idDenunciado = $_GET['idDenunciado'];
$resultDenunciado = $con->query("SELECT * FROM user WHERE idUser = '$idDenunciado'")->fetchAll();
foreach ($resultDenunciado as $denunciado) {
}

?>

<Body>
    <form action="logar.php" id="formLogin" method="post">
        <div class="login">
            <div class="caixa">
                <h1><?php echo $denunciado['user'] ?></h1>
                <input type="text" name="motivo" placeholder="Descreva o ocorrido:" required />
                O que está sendo denunciado? <select name="motivo" id="subSubCategoria" class="dropdown-select">
                    <option value="">Anúncio</option>
                    <option value="">Mensagem</option>
                    <option value="">Perfil</option>
                </select><br>
                Outras provas: <input id="provas" type="file">
                <button type="submit">Denúnciar</button><br>
                <!-- <p>Não tem conta? <a href="registro.php"><span>Registra-se</span></p></a><br><br> -->

            </div>
        </div>
    </form>
</body>
<?php include_once('../Include_once/footer.php')?>
</html>