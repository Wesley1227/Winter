<script type="text/javascript">
    function ajax() {
        var req = new XMLHttpRequest();
        req.onreadystatechange = function() {

            if (req.readyState == 4 && req.status == 200) {
                document.getElementById('chat').innerHTML = req.responseText;
            }
        }
        req.open('GET', '../Chat/mensagens.php?idAnuncio=<?= $idAnuncio ?>', true);
        req.send();
    }
    setInterval(function() {
        ajax();
    }, 500);
</script>

<div id="chat">
    <?php include_once('../Include_once/loadAnimation.php');?>
</div><!-- Insere o chat dentro da DIV -->
<div id="enviarMensagem">
    <form action="../Chat/inserirChat.php?idAnuncio=<?= $idAnuncio ?>" method="POST">
        <input type="text" id="search-bar" class="mensagem" name="mensagem" placeholder="Mensagem:" required>
        <input type="submit" id="enviar" value="enviar">
    </form>
</div>