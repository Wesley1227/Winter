<?php
include_once '../Include_once/conexao.php';
$query = "SELECT * FROM categoria ORDER BY nome";
$queryMarca = "SELECT marca FROM marca ORDER BY marca";
$result = $conn->query($query);
$resultadoMarca = $conn->query($queryMarca);
$titulo = "Qual categoria?";
$pagina = "Winter - " . $titulo;
include_once '../Include_once/head.php';
?>

<body>

    <div id="formProdutos">
        <form method="POST" action="../Include_once/inserir.php" enctype="multipart/form-data">
            <div class="formAnuncio">
                <input type="text" name="titulo" class="tituloAnuncio" id="search-bar" minlength="2" maxlength="40" required placeholder="Título do seu anuncio:"><br>
                <textarea class="descricao" name="descricao" id="search-bar" placeholder="Descrição:" cols="30" rows="10"></textarea><br>

                <select name="categoria" id="categoria" onchange="FetchSubCategoria(this.value)" class="dropdown-select">
                    <option value="">Categoria</option>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value=' . $row['id'] . '>' . $row['nome'] . '</option>';
                        }
                    } ?>
                </select>

                <select name="subCategoria" id="subCategoria" onchange="FetchSubSubCategoria(this.value)" class="dropdown-select">
                    <option value="">Subcategoria</option>
                </select>

                <select name="subSubCategoria" id="subSubCategoria" class="dropdown-select">
                    <option value="">Sub-Subcategoria</option>
                </select><br>

                <select name="marca" id="marca" class="dropdown-select">
                    <option value="">Marca</option>
                    <option value="Outro">Outro</option>
                    <?php
                    if ($resultadoMarca->num_rows > 0) {
                        while ($row = $resultadoMarca->fetch_assoc()) {
                            echo '<option value=' . $row['marca'] . '>' . $row['marca'] . '</option>';
                        }
                    } ?>
                </select>

                <select name="estadoProduto" class="dropdown-select">
                    <option value="">Estado do produto</option>
                    <option value="1">Imaculado</option>
                    <option value="2">Novo</option>
                    <option value="3">Semi-novo</option>
                    <option value="4">Usado</option>
                    <option value="5">Estragado</option>
                </select>

                <select name="intAnuncio" id="select" class="dropdown-select">
                    <option value="">Intenção do anúncio</option>
                    <option value="opcao1">Vender</option>
                    <option value="3">Trocar</option>
                    <option value="4">Doar</option>
                    <option value="1">Comprar</option>
                </select><br>

                <div id="opcao1" style="display: none;">
                    <input type="number" min="0" max="100000" for="preco" name="preco" class="preco" id="search-bar" placeholder="Preço">
                </div><br>

                <?php $idUser = $_SESSION['idUser'];
                $registros = $con->query("SELECT COUNT(idUser) count FROM anuncios WHERE idUser= $idUser")->fetch()["count"];
                ?> <br>

                <br><input type="file" name="imagem">

                <?php if ($registros < 15) {
                    $style = "";
                } else {
                    $style = "display: none";
                    echo "<script>alert('Atingiu o limite de 15 anúncios!');</script>";
                }
                ?>
                <div class="container">
                    <h1>Pesquisar Cidades</h1>
                    <input id="pac-input" name="localizacao" class="controls" type="text" placeholder="Digite o nome da cidade">
                    <div id="map" style="height: 400px; width: 40%;"></div>
                    <div id="latlng">
                        <p>Latitude: <span id="lat"></span></p>
                        <p>Longitude: <span id="lng"></span></p>
                    </div>
                    <!-- Campos ocultos para latitude e longitude -->
                    <input type="hidden" name="latitude" id="latitude">
                    <input type="hidden" name="longitude" id="longitude">
                </div>
                Possui <?php echo $registros ?> anúncios ativos! <br>
                <button type="submit" style="<?php echo $style ?>" class="custom-btn" id="anunciar" name="submit" value="upload">Anunciar</button>
            </div>
        </form>
    </div>

</body>

</html>

<!-- ||||||||||||||||||||||| JAVA SCRIPT \\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Script para carregar a API do Google Maps -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApD0rM22UO1KZK6q_6O6iJuai76mf0svc&libraries=places&callback=initMap" async defer></script>
<script>
    // Função para inicializar o mapa e o autocomplete
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: 39.39987199999999,
                lng: -8.224454
            }, // Centro inicial do mapa
            zoom: 6.5
        });

        var input = document.getElementById('pac-input');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
            map: map,
            anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
            infowindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                window.alert("Nenhum detalhe disponível para: '" + place.name + "'");
                return;
            }

            // Se o lugar tiver uma geometria, então ele será exibido no mapa.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }

            infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
            infowindow.open(map, marker);

            // Atualiza os valores de latitude e longitude
            var latitude = place.geometry.location.lat();
            var longitude = place.geometry.location.lng();
            document.getElementById('lat').textContent = latitude;
            document.getElementById('lng').textContent = longitude;

            // Preenche os campos ocultos com latitude e longitude
            document.getElementById('latitude').value = latitude;
            document.getElementById('longitude').value = longitude;
        });
    }
</script>

<script>
    // Scrip para mostar preco caso o user escolher a opção "venda".
    var select = document.getElementById("select");
    select.addEventListener("change", function() {
        var opcao = select.value;
        var opcao1 = document.getElementById("opcao1");
        opcao1.style.display = "none";
        if (opcao == "opcao1") {
            opcao1.style.display = "inline-block";
        }
    });

    // Scrip para mostar subCategorias quando o user escolher a categoria desejada.
    function FetchSubCategoria(id) {
        $('#subCategoria').html('');
        $('#subSubCategoria').html('<option>Selecione subSubCategoria</option>');
        $.ajax({
            type: 'post',
            url: '../Include_once/sub_categorias.php',
            data: {
                idCategoria: id
            },
            success: function(data) {
                $('#subCategoria').html(data);
            }
        })
    }
    // Scrip para mostar subSubCategorias quando o user escolher a subCategoria desejada.
    function FetchSubSubCategoria(id) {
        $('#subSubCategoria').html('');
        $.ajax({
            type: 'post',
            url: '../Include_once/sub_categorias.php',
            data: {
                idSubCategoria: id
            },
            success: function(data) {
                $('#subSubCategoria').html(data);
            }
        })
    }
</script>

<!-- POP UPs -->
<script>
    // Função POP-UP WINTER PRODUTOS 
    var popupProdutos = document.getElementById("popupProdutos");
    var formProdutos = document.getElementById("formProdutos");
    var fechar = document.getElementById("fechar");

    popupProdutos.addEventListener("click", function(event) {
        event.preventDefault();
        formProdutos.style.display = "block";
        window.scrollBy(0, 400)
    });

    fechar.addEventListener("click", function() {
        formProdutos.style.display = "none";
    });
</script>
<script>
    // Função POP-UP WINTER PRODUTOS 
    var popupEmpregos = document.getElementById("popupEmpregos");
    var formEmpregos = document.getElementById("formEmpregos");
    var fecharEmpregos = document.getElementById("fecharEmpregos");

    popupEmpregos.addEventListener("click", function(event) {
        event.preventDefault();
        formEmpregos.style.display = "block";
        window.scrollBy(0, 350)
    });

    fecharEmpregos.addEventListener("click", function() {
        formEmpregos.style.display = "none";
    });
</script>