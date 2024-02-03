<?php
include('../login/protect.php');
include_once '../Include_once/conexao.php';
$titulo = "Testes";
$pagina = "Admin - " . $titulo;
include_once '../Include_once/head.php';
?>

<body>

        <!-- Botão que faz som ao ser clicado -->
        <button onclick="somEnviada()">Clique para fazer som</button>

        <!-- Elemento de áudio oculto -->
        <audio id="mg_enviada" src="../Sons/mg_enviada.mp3"></audio>

        <script>
                function somEnviada() {
                        var som = document.getElementById('mg_enviada');
                        som.play();
                }
        </script>

        <br><br><br><br><br><br><br><br><br><br><br><br>

</body>
<?php include_once '../Include_once/footer.php'; ?>

</html>