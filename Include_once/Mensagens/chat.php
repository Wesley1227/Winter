<div class="mensagens">
    <div id="pessoas">
        <?php
        $idUser = $_SESSION['idUser'];
        $query = "SELECT DISTINCT idAnuncio FROM chat WHERE idUser = '$idUser'";
        $resultado = $mysqli->query($query);
        $result = mysqli_fetch_assoc($resultado);
        foreach ($result as $pesquisaIDanuncio) {
        } // Pesquisa os anúncios que o user enviou mensagem

        $query2 = "SELECT DISTINCT idAnuncio,idUser,idDestinatario FROM chat WHERE idDestinatario='$idUser' ORDER BY dataEnvio DESC";
        $resultado2 = $mysqli->query($query2);
        $result2 = mysqli_fetch_assoc($resultado2);



        foreach ($resultado2 as $chat2) { // Anuncios do User

            $idAnuncio2 = $chat2['idAnuncio'];
            $idUser2 = $chat2['idUser'];


            $result3 = $con->query("SELECT * FROM user WHERE idUser='$idUser2'")->fetchAll();
            foreach ($result3 as $user) {
            }
            $fotoPerfil = $user['fotoPerfil'];

            $idDestinatario = $chat2['idDestinatario'];
            $idUser2 = $chat2['idUser'];
            $queryAnuncio2 = "SELECT * FROM anuncios WHERE idAnuncio='$idAnuncio2'";
            $resultadoAnuncio2 = $mysqli->query($queryAnuncio2);
            $resultAnuncio2 = mysqli_fetch_assoc($resultadoAnuncio2);
        ?>

            <div onclick="window.location.href='?idAnuncio=<?= $idAnuncio2 ?>&&idUser=<?= $chat2['idUser'] ?>'">
                <?php //&&idUser=<?= $chat2['idUser'] ?' 
                $idAnuncio = $_GET['idAnuncio'];
                if ($idAnuncio == $idAnuncio2) {
                    $style = "width: 95%; ";
                } else {
                    $style = "";
                }
                ?>
                <div style="background-color: brown; color:white ; <?php echo $style ?>" id="anuncio">
                    <?php echo $idAnuncio2;  ?>
                    <a href="../PHP/anuncio.php?idAnuncio=<?= $idAnuncio2 ?>"><img src="../uploads/<?= $resultAnuncio2['imagem'] ?>" class="miniFotoPerfil" id="fotoChat" /></a>
                    <?php echo $resultAnuncio2['titulo'] ?> <br><br>
                    <div id="anunciante">
                        <img src="../uploads/<?= $fotoPerfil ?>" class="miniFotoPerfil" id="fotoPerfilPessoa" />
                        <?php echo $user['user'] ?>
                    </div>
                    <div id="preco"><?php echo $resultAnuncio2['preco'] . "€" ?></div>
                </div>
            </div>
        <?php }



        foreach ($resultado as $chat) { // Anuncios de outras pessoas

            $idAnuncio = $chat['idAnuncio'];
            $queryAnuncio = "SELECT * FROM anuncios WHERE idAnuncio='$idAnuncio' ";
            $resultadoAnuncio = $mysqli->query($queryAnuncio);
            $resultAnuncio = mysqli_fetch_assoc($resultadoAnuncio); ?>
            <div onclick="window.location.href='?idAnuncio=<?= $idAnuncio ?>'">

                <?php
                if ($resultAnuncio['idUser'] == $idUser) {
                    $none = "display: none;";
                } ?><!-- Caso anúncio for do User, não lista-lo -->

                <div id="anuncio" style="<?php echo $none ?>">
                    <?php echo $idAnuncio;  ?>
                    <a href="../PHP/anuncio.php?idAnuncio=<?= $idAnuncio ?>"><img src="../uploads/<?= $resultAnuncio['imagem'] ?>" class="miniFotoPerfil" id="fotoChat" /></a>
                    <?php echo $resultAnuncio['titulo'] ?>
                    <div id="preco"><?php echo $resultAnuncio['preco'] . "€" ?></div>
                </div>

            </div>
        <?php
        } ?>

    </div>
    <div>
        <div class="mensagem" id="chat">

            <?php include_once('../Include_once/loadAnimation.php'); ?>
        </div>
        <div class="mensagem " id="enviarMensagem">

            <form action="../Include_once/Mensagens/inserirChat.php?idAnuncio=<?= $idAnuncio = $_GET['idAnuncio'] ?>&&idUser=<?= $_GET['idUser'] ?>" method="POST">
                <input type="text" id="search-bar" class="mensagem" name="mensagem" placeholder="Mensagem:" required>
                <input type="submit" id="enviar" value="enviar">
            </form>
        </div>
    </div>
</div>

<!-- JAVASCRIPT -->
<script type="text/javascript">
    function ajax() {
        var req = new XMLHttpRequest();
        req.onreadystatechange = function() {
            if (req.readyState == 4 && req.status == 200) {
                document.getElementById('chat').innerHTML = req.responseText;
            }
        }
        req.open('GET', '../include_once/Mensagens/mensagens.php?idAnuncio=<?= $idAnuncio = $_GET['idAnuncio']; ?>&&idUser=<?= $_GET['idUser'] ?>', true);
        req.send();
    }
    setInterval(function() {
        ajax();
    }, 500);
</script>