<?php
include_once '../Include_once/conexao.php';
$titulo = "Configurações";
$pagina = "Winter - " . $titulo;
$logo = "../img/logo.png";
include_once '../Include_once/head.php';
?>

<body>
    <div id="configuracoes">
        <h1></h1>
        <p>Fez o login à: <br>
            <?php echo $tempoFormatado; ?></p>
        <h1>Envie um ticket:</h1>
        <a href="ticket.php?assunto=1"> <button>Pedir edição de dados pessoais</button></a><br>
        <a href="ticket.php?assunto=2"> <button style="width: 37%;">Pedir remoção de conta</button </a><br>
            <a href="ticket.php?assunto=3"> <button style="width: 34%;">Outro motivo</button></a><br>
            <a href="ticket.php?assunto=4"> <button style="width: 29% auto;">Verificar tickets existentes</button></a><br>
    </div>
</body>
<?php include_once '../Include_once/footer.php'; ?>

</html>