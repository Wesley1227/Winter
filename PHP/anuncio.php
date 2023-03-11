<?php include_once '../Include_once/conexao.php';
$idAnuncio = $_GET['idAnuncio']; // Pega o ID do anúncio clicado da página anterior.

$query = "SELECT * FROM anuncios WHERE idAnuncio = $idAnuncio"; // Selecionia tudo do anúncio pelo respetivo ID.
$resultado = $mysqli->query($query);
$result = mysqli_fetch_assoc($resultado);
$titulo = $result['titulo'];
$pagina = "Winter - " . $titulo;
$idUser = $result['idUser'];
if ($idUser == 0) {
  $idUser = "1";
} // Os anúncios que foram adionados pela BD serão do Admin.

$queryUser = "SELECT * FROM user WHERE idUser = $idUser"; // Pega as informações da pessoa que adicionou o anúncio.
$resultado = $mysqli->query($queryUser);
$resultIdUser = mysqli_fetch_assoc($resultado);

$genero = $resultIdUser['genero'];
if ($genero == 1) {
  $emoji = "👨";
} elseif ($genero == 2) {
  $emoji = "👩";
} else {
  $emoji = "👤";
}
include_once '../Include_once/head.php'; ?><!-- Chama o head e headder. -->

<body>
  <?php $idDestinatario = $result['idUser'] ?>
  <?php if ($_GET['chat'] == 1) { ?>
    <div id="popupChat" style="display: block;">
      <button id="fecharChat" class="fecharChat">x</button>
      <?php include_once('../Chat/chat.php'); ?>
    </div> <!-- POP-UP CHAT novamente -->
  <?php } ?>

  <div id="popupChat" style="display: none;">
    <button id="fecharChat" class="fecharChat">x</button>
    <?php include_once('../Chat/chat.php'); ?>
  </div> <!-- POP-UP CHAT -->

  <div id="popupImagens" style="display: none;">
    <button id="fecharImagens">x</button>
    <img id="imagensPopup" src="../uploads/<?= $result['imagem'] ?>" alt="">
  </div> <!-- POP-UP Imagens -->

  <div class="anuncio">
    <div class="colunas" id="imagens">
      <a href="#" id="imagens">
        <img id="linkImagens" src="../uploads/<?= $result['imagem'] ?>" alt=""></a>
      <div class="informacoes">
        <h1><?php echo $result['preco'] ?>€</h1>
        <h2>👀<?php echo $result['visualizacoes'] ?></h2>
      </div>
    </div>

    <div class="colunas" id="perfil">
      <?php if ($resultIdUser['fotoPerfil'] == null) {
        $resultIdUser['fotoPerfil'] = "semFotoPerfil.png";
      } ?>

      <a href="perfil.php?idUser=<?= $result['idUser']; ?>"><img src="../uploads/<?= $resultIdUser['fotoPerfil'] ?>" /></a><br>
      <?php if ($_SESSION['idUser'] == 1) { ?>
        ID: <?php echo $result['idUser'] ?><br>
      <?php } ?>
      👤<?php echo $resultIdUser['user'] ?><br>
      <?php echo $emoji . $resultIdUser['nome'] . " " . $resultIdUser['apelido'] ?>
      <img src="../img/mapa.png" alt="">

      <div class="botoes">
        <?php if ($_SESSION['idUser'] == $idUser || $_SESSION['idUser'] == 1) {
        ?> <a href=""><button class="custom-btn" id="editarAnuncio">Editar</button></a><a href="../Include_once/deleteAnuncio.php?idAnuncio=<?= $result['idAnuncio'] ?>"><button class="custom-btn" id="editarAnuncio" onclick="return confirm('Tem certeza que deseja excluir este anúncio?')">🗑️</button></a>
        <?php } else { ?>
          <a href="" id="linkChat"><button class="custom-btn" id="editarAnuncio" title="Ainda em desenvolvimento">💭 Mensagem</button></a> <a href="#" id="link"><button class="custom-btn" id="editarAnuncio">📞</button></a>

          <div id="popup" style="display: none;">
            📞<?php echo $resultIdUser['telemovel'] ?>
            <button id="fechar">x</button>
          </div> <!-- Quando clicar para ver o número de telemóvel, aparecerá um POP-UP -->
        <?php }
        if ($_SESSION['idUser'] == null) {
          echo "Faça login primeiro.";
        } ?><!-- Quando o user não estiver logado, aparecerá essa mensagem -->

      </div>
    </div>
  </div>

  <div class="descricao">
    <textarea name="descricao" id="anuncioDescricao" disabled>
      <?php if ($result['preco'] != 0) {
        $result['intAnuncio'] = "Vender";
      } ?>
    Estado <?php echo $result['estadoProduto'] ?> | Preço negociável | Intensão em <?php echo $result['intAnuncio']; ?> 
    
    <?php echo $result['descricao'] ?>
    </textarea>
  </div>

</body>
<?php include_once '../Include_once/footer.php'; ?>

</html>

<!-- ||||||||||||||||||||| JAVASCRIPT \\\\\\\\\\\\\\\\\\\\\ -->

<!-- POP-UP das Imagens -->
<script>
  var linkImagens = document.getElementById("linkImagens");
  var popupImagens = document.getElementById("popupImagens");
  var fecharImagens = document.getElementById("fecharImagens");

  linkImagens.addEventListener("click", function(event) {
    event.preventDefault();
    popupImagens.style.display = "block";
  });

  fecharImagens.addEventListener("click", function() {
    popupImagens.style.display = "none";
  });
</script>


<!-- POP-UP do CHAT -->
<script>
  var linkChat = document.getElementById("linkChat");
  var popupChat = document.getElementById("popupChat");
  var fecharChat = document.getElementById("fecharChat");

  linkChat.addEventListener("click", function(event) {
    event.preventDefault();
    popupChat.style.display = "block";
  });

  fecharChat.addEventListener("click", function() {
    popupChat.style.display = "none";
  });
</script>


<!-- POP-UP do telemóvel -->
<script>
  var link = document.getElementById("link");
  var popup = document.getElementById("popup");
  var fechar = document.getElementById("fechar");

  link.addEventListener("click", function(event) {
    event.preventDefault();
    popup.style.display = "block";
  });

  fechar.addEventListener("click", function() {
    popup.style.display = "none";
  });
</script>