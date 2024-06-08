<?php include_once '../Include_once/conexao.php';
$idAnuncio = $_GET['idAnuncio']; // Pega o ID do anúncio clicado da página anterior.
if ($idAnuncio == null || $idAnuncio == 0) {
  header("Location: javascript:history.back()");
} // Caso o user tente acessar um anúncio apagando o idAnuncio, volta onde estava antes

$query = "SELECT * FROM anuncios WHERE idAnuncio = $idAnuncio";
$resultado = $mysqli->query($query);
$result = mysqli_fetch_assoc($resultado); // Selecionia tudo do anúncio pelo respetivo ID.

$idUser = $result['idUser'];
if ($idUser == "0") {
  $idUser = "88";
} // Os anúncios que foram adionados pela BD serão do Admin.

$titulo = $result['titulo'];
$pagina = "Winter - " . $titulo;
if ($titulo == null) {
  header("Location: javascript:history.back()");
} // Caso o user tente acessar um anúncio que ainda não existe, volta onde estava antes

$queryUser = "SELECT * FROM user WHERE idUser = $idUser"; // Pega as informações da pessoa que adicionou o anúncio.
$resultado = $mysqli->query($queryUser);
$resultIdUser = mysqli_fetch_assoc($resultado);

$genero = $resultIdUser['genero'];
if ($genero == null) {
  $genero = 1;
}
if ($genero == 1) {
  $emoji = "👨";
} elseif ($genero == 2) {
  $emoji = "👩";
} else {
  $emoji = "👤";
}
include_once '../Include_once/head.php'; ?><!-- Chama o head e headder. -->


<!-- NOTIFICACOES e FAVORITAR ANUNCIOS-->
<?php
$idUserSESSION = $_SESSION['idUser'];
if ($idUserSESSION == null) {
  $idUserSESSION = 0;
}
$queryFavorito = "SELECT * FROM anunciosfavoritos WHERE idAnuncio = $idAnuncio AND idUser = $idUserSESSION";
$resultadoFavorito = $mysqli->query($queryFavorito);
$resultFavorito = mysqli_fetch_assoc($resultadoFavorito); // Selecionia se o anúncio é favoritado pelo respetivo ID do USER.
$idUserFavoritado = $resultFavorito['idUser'];
?>



<!-- FIM NOTIFICACOES e FAVORITAR ANUNCIOS;  -->

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
        <?php include_once("../Include_once/iconYT.php"); ?>
          <div class="informacoes">
            <h1><?php echo $result['preco'] ?>€</h1>
            <div class="notificacao" id="not">Anúncio favoritado!</div>
            <div class="notificacao" id="not2">Desfavoritou o anúncio!</div>
            <?php
            /* Quando nao estiver favoritado o anuncio o 🤍 será branco e favoritado aparecerá vermelho */
            if ($idUserFavoritado != 0) {
              $coracao = "❤️";
            } else {
              $coracao = "🤍";
            } /* Caso o utilizador tenha favoritado este anúncio, o coração fica vermelho */

            if ($idUserSESSION == null) {
              $onclick = "semLogin()";
            } else {
              $onclick = "toggleHeartEmoji()";
            } /* Caso o utilizador nao estiver logado, aparecer a notificacao que nao esta logado, logo, nao poderá favoritar um anuncio */

            if ($_SESSION['idUser'] == $result['idUser']) {
              $display = "display: none";
            } /* Caso o anúncio for do utilizador logado, nao aparecer a opcao de favoritar anúncio. */

            ?>

            <span style="<?= $display ?>" id="emoji" onclick="<?= $onclick ?>"><?= $coracao ?> </span>
           


            <script>
              function toggleHeartEmoji() {

                var status = "<?php echo $idUserFavoritado; ?>";
                var emoji = document.getElementById("emoji");
                if (emoji.textContent == "🤍") {
                  emoji.textContent = "❤️";
                  mostrarNotificacao();
                } else {
                  emoji.textContent = "🤍";
                  mostrarNotificacao2();
                }
              }
            </script>
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
        <?php if ($_SESSION['idUser'] == $resultIdUser['idUser'] || $_SESSION['idUser'] == 1) {
        ?> <a href=""><button class="custom-btn" id="editarAnuncio">Editar</button></a><a href="../Include_once/deleteAnuncio.php?idAnuncio=<?= $result['idAnuncio'] ?>"><button class="custom-btn" id="editarAnuncio" onclick="return confirm('Tem certeza que deseja excluir este anúncio?')">🗑️</button></a>
        <?php } else { ?>
          <a href="" id="linkChat"><button class="custom-btn" id="editarAnuncio" title="Ainda em desenvolvimento">💭 Mensagem</button></a> <a href="#" id="link"><button class="custom-btn" id="editarAnuncio">📞</button></a>

          <div id="popup" style="display: none;">
            <?php
            $numTelemovel = $resultIdUser['telemovel'];
            if ($_SESSION['idUser'] == null) {
              $numTelemovel = "Loga-se";
            }
            ?>
            📞<?php echo $numTelemovel ?>
            <button id="fechar">x</button>
          </div> <!-- Quando clicar para ver o número de telemóvel, aparecerá um POP-UP -->
        <?php } ?>
      </div>
    </div>
  </div>
  <?php if ($result['preco'] != 0) {
    $result['intAnuncio'] = "Vender";
  }
  if ($result['preco'] == 0 && $result['intAnuncio'] == null) {
    $result['intAnuncio'] = "testar";
  }
  ?>
  <div class="descricao">

    <textarea name="descricao" id="anuncioDescricao" disabled>

    Estado <?php echo $result['estadoProduto'] ?> | Preço negociável | Intensão em <?php echo $result['intAnuncio']; ?> 
   
    <?php echo $result['descricao'] ?>
    
    </textarea>
    👀<?php echo $result['visualizacoes'] ?>
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
<script>
  function favoritarAnuncio() {
    var idAnuncio = "<?php echo $_GET['idAnuncio']; ?>"; // Obtém o idAnuncio do parâmetro GET
    var idUser = "<?php echo $_SESSION['idUser']; ?>"; // Obtém o idUser da sessão

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../Include_once/favoritarAnuncio.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        console.log(xhr.responseText);
      }
    };

    xhr.send("idAnuncio=" + encodeURIComponent(idAnuncio) + "&idUser=" + encodeURIComponent(idUser));
  }
</script>
<script>
  function desfavoritarAnuncio() {
    var idAnuncio = "<?php echo $_GET['idAnuncio']; ?>"; // Obtém o idAnuncio do parâmetro GET
    var idUser = "<?php echo $_SESSION['idUser']; ?>"; // Obtém o idUser da sessão

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../Include_once/desfavoritarAnuncio.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        console.log(xhr.responseText);
      }
    };

    xhr.send("idAnuncio=" + encodeURIComponent(idAnuncio) + "&idUser=" + encodeURIComponent(idUser));
  }
</script>

<!-- notificacoes com som -->
<audio id="somFavoritar" src="../Sons/mg_recebida.mp3"></audio>
<audio id="somDesfavoritar" src="../Sons/notificacao_negativa.mp3"></audio>
<script>
  function mostrarNotificacao() {
    var not = document.getElementById("not");
    not.style.display = "block";
    favoritarAnuncio();
    setTimeout(function() {
      not.style.transform = 'translateX(150%) ';
      setTimeout(function() {
        not.style.display = 'none';
      }, 1000); // Tempo de transição (0.5 segundos)
    }, 3000); // 5 segundos
    var som = document.getElementById('somFavoritar');
    som.play();
  }

  function mostrarNotificacao2() {
    var not2 = document.getElementById("not2");
    not2.style.display = "block";
    desfavoritarAnuncio();
    setTimeout(function() {
      not2.style.transform = 'translateX(150%) ';
      setTimeout(function() {
        not2.style.display = 'none';
      }, 1000); // Tempo de transição (0.5 segundos)
    }, 3000); // 5 segundos
    var som = document.getElementById('somDesfavoritar');
    som.play();

  }
</script>