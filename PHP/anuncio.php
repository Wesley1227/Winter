<?php
include_once '../Include_once/conexao.php';

$idAnuncio = $_GET['idAnuncio']; // Pega o ID do anúncio clicado da página anterior.
if ($idAnuncio == null || $idAnuncio == 0) {
  header("Location: javascript:history.back()");
  exit;
}

$query = "SELECT * FROM anuncios WHERE idAnuncio = $idAnuncio";
$resultado = $mysqli->query($query);
$result = mysqli_fetch_assoc($resultado);

$idUser = $result['idUser'];
if ($idUser == "0") {
  $idUser = "69"; // Anúncios adicionados pelo Admin
}

$titulo = $result['titulo'];
$pagina = "Winter - " . $titulo;
if ($titulo == null) {
  header("Location: javascript:history.back()");
  exit;
}

$queryUser = "SELECT * FROM user WHERE idUser = $idUser";
$resultado = $mysqli->query($queryUser);
$resultIdUser = mysqli_fetch_assoc($resultado);

$genero = $resultIdUser['genero'];
if ($genero == null) {
  $genero = 1; // Valor padrão se o gênero não estiver definido
}
if ($genero == 1) {
  $emoji = "👨";
} elseif ($genero == 2) {
  $emoji = "👩";
} else {
  $emoji = "👤";
}

include_once '../Include_once/head.php'; // Inclui o head e header

// Inicia a sessão para verificar informações do usuário


$idUserSESSION = isset($_SESSION['idUser']) ? $_SESSION['idUser'] : 0;

// Verifica se o anúncio está favoritado pelo usuário logado
$idUserFavoritado = null;
if ($idUserSESSION != 0) {
  $queryFavorito = "SELECT * FROM anunciosfavoritos WHERE idAnuncio = $idAnuncio AND idUser = $idUserSESSION";
  $resultadoFavorito = $mysqli->query($queryFavorito);

  if ($resultadoFavorito) {
    $resultFavorito = mysqli_fetch_assoc($resultadoFavorito);
    if ($resultFavorito) {
      $idUserFavoritado = $resultFavorito['idUser'];
    }
  } else {
    echo "Erro na consulta: " . $mysqli->error;
  }
}
$idAnuncio = $_GET['idAnuncio']; // Supondo que o ID do anúncio seja passado via GET

// Verifica se o anúncio já está no histórico
$queryCheckHistorico = "SELECT * FROM historicoanuncios WHERE idUser = ? AND idAnuncio = ?";
$stmtCheck = $mysqli->prepare($queryCheckHistorico);
$stmtCheck->bind_param("ii", $idUser, $idAnuncio);
$stmtCheck->execute();
$resultCheck = $stmtCheck->get_result();

if ($resultCheck->num_rows > 0) {
  // Se o anúncio já estiver no histórico, atualiza a data
  $queryUpdateHistorico = "UPDATE historicoanuncios SET data = NOW() WHERE idUser = ? AND idAnuncio = ?";
  $stmtUpdate = $mysqli->prepare($queryUpdateHistorico);
  $stmtUpdate->bind_param("ii", $idUser, $idAnuncio);
  $stmtUpdate->execute();
  $stmtUpdate->close();
} else {
  // Se o anúncio não estiver no histórico, insere um novo registro
  $queryInsertHistorico = "INSERT INTO historicoanuncios (idUser, idAnuncio, data) VALUES (?, ?, NOW())";
  $stmtInsert = $mysqli->prepare($queryInsertHistorico);
  $stmtInsert->bind_param("ii", $idUser, $idAnuncio);
  $stmtInsert->execute();
  $stmtInsert->close();
}

$stmtCheck->close();
$mysqli->close();
?>


<body>
  <?php
  // Inclui o popup de chat se o parâmetro 'chat' estiver presente na URL
  if (isset($_GET['chat']) && $_GET['chat'] == 1) {
  ?>
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
      <?php include_once('editarAnuncio.php'); ?>
      <a href="#" id="linkImagens">
        <img src="../uploads/<?= $result['imagem'] ?>" alt="">
      </a>
      <?php include_once("../Include_once/iconYT.php"); ?>
      <div class="informacoes">
        <h1><?php echo $result['preco'] ?>€</h1>
        <div class="notificacao" id="not">Anúncio favoritado!</div>
        <div class="notificacao" id="not2">Desfavoritou o anúncio!</div>

        <?php
        $coracao = isset($idUserFavoritado) ? "❤️" : "🤍";
        $onclick = ($idUserSESSION == 0) ? "semLogin()" : "toggleHeartEmoji()";
        $display = ($_SESSION['idUser'] == $result['idUser'] || $_SESSION['idUser'] == 1) ? "display: none;" : "";
        ?>

        <span style="<?= $display ?>" id="emoji" onclick="<?= $onclick ?>"><?= $coracao ?></span>
      </div>
    </div>

    <div class="colunas" id="perfil">
      <a href="perfil.php?idUser=<?= $result['idUser']; ?>">
        <img src="../uploads/<?= $resultIdUser['fotoPerfil'] ?? 'semFotoPerfil.png' ?>" />
      </a><br>
      <?php if (isset($_SESSION['idUser']) && $_SESSION['idUser'] == 1) { ?>
        ID: <?= $result['idUser'] ?>
      <?php } ?>

      <?= $emoji . $resultIdUser['nome'] . " " . $resultIdUser['apelido'] ?><br><br>


      <div id="map"></div>

      <div class="botoes">
        <?php if (isset($_SESSION['idUser']) && ($_SESSION['idUser'] == $resultIdUser['idUser'] || $_SESSION['idUser'] == 1)) { ?>
          <a href="#" id="editarAnuncioButton"><button class="custom-btn" id="editarAnuncio">Editar</button></a>
          <a href="../Include_once/deleteAnuncio.php?idAnuncio=<?= $result['idAnuncio'] ?>">
            <button class="custom-btn" id="editarAnuncio" onclick="return confirm('Tem certeza que deseja excluir este anúncio?')">🗑️</button>
          </a>
        <?php } else { ?>
          <a href="" id="linkChat"><button class="custom-btn" id="editarAnuncio" title="Ainda em desenvolvimento">💭 Mensagem</button></a>
          <a href="#" id="link"><button class="custom-btn" id="editarAnuncio" onclick="mostrarNotificacao3()">📞</button></a>

          <div class="notificacao" id="not3">
            📞
            <?php
            $numTelemovel = isset($_SESSION['idUser']) ? $resultIdUser['telemovel'] : "Loga-se";
            echo $numTelemovel;
            ?>

          </div>
        <?php } ?>
      </div>
    </div>
  </div>

  <div class="descricao">
    <textarea name="descricao" id="anuncioDescricao" disabled>
            Estado <?= $result['estadoProduto'] ?> | Preço negociável | Intensão em <?= $result['intAnuncio'] ?? 'testar' ?>
            

            <?= $result['descricao'] ?>
        </textarea>
    👀<?= $result['visualizacoes'] ?>
  </div>

  <?php include_once '../Include_once/footer.php'; ?>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApD0rM22UO1KZK6q_6O6iJuai76mf0svc&callback=initMap"></script>
</body>

<!-- JavaScript -->
<!-- Inclui o script do Google Maps com async e defer -->

<script>
  function initMap() {
    // Coordenadas para centralizar o mapa (exemplo: São Paulo)
    var coordenadas = {
      lat: <?= $result['latitude'] ?>,
      lng: <?= $result['longitude'] ?>
    };

    // Cria um novo mapa no elemento div com id="map"
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 13,
      center: coordenadas
    });
  }
</script>

<script>
  function toggleHeartEmoji() {
    var emoji = document.getElementById("emoji");
    if (emoji.textContent == "🤍") {
      emoji.textContent = "❤️";
      mostrarNotificacao();
    } else {
      emoji.textContent = "🤍";
      mostrarNotificacao2();
    }
    window.onload = function() {
      initMap();
    }
  }
</script>

<!-- Outros scripts JavaScript -->
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

<!-- POP-UP do número de telefone -->
<script>
  function mostrarNotificacao3() {
    var not3 = document.getElementById("not3");
    not3.style.display = "block";
    setTimeout(function() {
      not3.style.transform = 'translateX(150%)';
      setTimeout(function() {
        not3.style.display = 'none';
        not3.style.transform = 'translateX(0%)';
      }, 500);
    }, 5000);
    var som = document.getElementById('somNotificacao');
    som.play();
  }
</script>

<!-- Favori



</script>
<!-- Marca no map (opcional)
     var marker = new google.maps.Marker({
         position: coordenadas,
         map: map,
         title: 'Estou aqui!'
     }); -->
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
<!-- <script>
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
</script> -->

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

<!-- Mostrar num telemovel -->
<audio id="somNotificacao" src="../Sons/mg_recebida.mp3"></audio>
<script>
  function mostrarNotificacao3() {
    var not3 = document.getElementById("not3");
    not3.style.display = "block";
    setTimeout(function() {
      not3.style.transform = 'translateX(150%)';
      setTimeout(function() {
        not3.style.display = 'none';
        not3.style.transform = 'translateX(0%)';
      }, 500);
    }, 5000);
    var som = document.getElementById('somNotificacao');
    som.play();
  }
</script>

<!-- Script pra abrir pop-up e editar anuncio -->
<script>
  var editarAnuncioButton = document.getElementById("editarAnuncioButton");
  var editarAnuncioPopup = document.getElementById("editarAnuncioPopup");
  var fecharEdicaoAnuncio = document.getElementById("fecharEdicaoAnuncio");

  editarAnuncioButton.addEventListener("click", function(event) {
    event.preventDefault();
    editarAnuncioPopup.style.display = "block";
  });

  fecharEdicaoAnuncio.addEventListener("click", function() {
    editarAnuncioPopup.style.display = "none";
  });
</script>