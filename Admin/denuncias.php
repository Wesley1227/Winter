<?php
include_once 'conexao.php';
$titulo = "Denúncias";
$pagina = "Winter - " . $titulo;
include_once '../Include_once/head.php';
$resultadoDenuncias = $conn->query($queryDenuncias); ?>

<body>
    <?php
    foreach ($resultadoDenuncias as $denuncias) {
        $idChat = $denuncias['idChat'];
        $queryChat = "SELECT * FROM chat WHERE idChat = $idChat";
        $resultadoChat = $conn->query($queryChat);

        if ($resultadoChat && $resultadoChat->num_rows > 0) {
            while ($mensagens = $resultadoChat->fetch_assoc()) {
                if ($denuncias['status'] == "Pendente") {
                    $status = "Pendente 🟠";
                } elseif ($denuncias['status'] == "Resolvido") {
                    $status = "Resolvido 🟢";
                } elseif ($denuncias['status'] == "Negado") {
                    $status = "Negado 🔴";
                } else {
                    $status = "Desconhecido";
                }    ?>
                <div class="denuncias">
                    <div id="denuncia">
                        ID:<?php echo $denuncias['idDenuncia']; ?><br>
                        IdUser: <a href="../PHP/perfil.php?idUser=<?= $denuncias['idUser']; ?>"><?php echo $denuncias['idUser']; ?></a><br>
                        IdDenunciado: <a href="../PHP/perfil.php?idUser=<?= $denuncias['idDenunciado']; ?>"><?php echo $denuncias['idDenunciado']; ?></a><br><br>
                        Mensagem: <?php echo $mensagens['mensagem']; ?><br><br>
                        Motivo: <?php echo $denuncias['motivo']; ?> <br><br>
                        Status: <?php echo $status; ?> <br>
                        🕒 <?php echo $denuncias['dataDenuncia']; ?>

                    </div>
                </div>
    <?php
            } // Fim do while
        } // Fim do if $resultadoChat
    } // Fim do foreach
    ?>

</body>

</html>