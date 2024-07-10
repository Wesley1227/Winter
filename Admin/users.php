<?php
include('../login/protect.php');
include_once '../Include_once/conexao.php';
$titulo = "Utilizadores";
$pagina = "Admin - " . $titulo;
include_once '../Include_once/head.php';
?>

<body>
    <h1>Lista de Usuários</h1>

    <?php
    // Listagem de usuários
    $query = "SELECT * FROM user";
    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Usuário</th>
                    <th>Email</th>
                    <th>Nome</th>
                    <th>Apelido</th>
                    <th>Ações</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['idUser']}</td>
                    <td>{$row['user']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['nome']}</td>
                    <td>{$row['apelido']}</td>
                    <td>
                        <a style='color: white; background-color:black;'href='editarUser.php?id={$row['idUser']}'>Editar</a> |
                        <a style='color: white;background-color:black;' onclick=\"return confirm('Quer mesmo sair? 🙁')\" href='deleteUser.php?id={$row['idUser']}'>Deletar</a>
                    </td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum usuário encontrado.";
    }
    ?>
    <a href="criarUser.php">Adicionar user</a>

    <hr>

    <!-- Mapa para exibir os pinos das coordenadas -->
    <h2>Mapa de Anúncios</h2>
    <div id="map" style="height: 400px;"></div>

    <script>
        // Função para inicializar o mapa
        function initMap() {
            // Coordenadas iniciais (centro do mapa)
            var center = {
                lat: 39.39987199999999,
                lng: -8.224454
            }; // Exemplo: São Paulo

            // Opções do mapa
            var mapOptions = {
                zoom: 6.3,
                center: center
            };

            // Cria o mapa
            var map = new google.maps.Map(document.getElementById('map'), mapOptions);

            // Array para armazenar os marcadores
            var markers = [];

            <?php
            // Consulta para obter todas as coordenadas de anúncios
            $query_anuncios = "SELECT latitude, longitude FROM anuncios";
            $result_anuncios = $mysqli->query($query_anuncios);

            // Loop para adicionar os marcadores no mapa
            while ($row_anuncio = $result_anuncios->fetch_assoc()) {
                $latitude = $row_anuncio['latitude'];
                $longitude = $row_anuncio['longitude'];

                echo "var marker = new google.maps.Marker({
                    position: { lat: $latitude, lng: $longitude },
                    map: map,
                    title: 'Localização do Anúncio'
                });
                markers.push(marker);";
            }
            ?>
        }
    </script>
    <!-- Carrega a API do Google Maps -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApD0rM22UO1KZK6q_6O6iJuai76mf0svc&callback=initMap"></script>

</body>

</html>