<?php
include('../login/protect.php');
include_once '../Include_once/conexao.php';
$titulo = "Testes";
$pagina = "Admin - " . $titulo;
include_once '../Include_once/head.php';
?>

   
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApD0rM22UO1KZK6q_6O6iJuai76mf0svc&callback=initMap"></script>
    <style>
        /* Estilize o tamanho do mapa como desejar */
        #map {
            height: 400px;
            width: 80%;
        }
    </style>
 

    <body>
        <h1>Meu Mapa do Google</h1>
        <div id="map"></div>

        <script>
            function initMap() {
                // Coordenadas para centralizar o mapa (exemplo: São Paulo)
                var coordenadas = {
                    lat: -23.5505,
                    lng: -46.6333
                };

                // Cria um novo mapa no elemento div com id="map"
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 12, // Nível de zoom inicial
                    center: coordenadas // Coordenadas iniciais do mapa
                });

                // Marca no mapa (opcional)
                // var marker = new google.maps.Marker({
                //     position: coordenadas,
                //     map: map,
                //     title: 'Estou aqui!'
                // });
            }
        </script>
        <!-- Chama a função initMap ao carregar a página -->
        
    </body>

    </html>

































</body>

</html>
<!-- <script>
        function verificarNIF() {
            var nifInput = document.getElementById('nif').value;
            fetch('verificar_nif.php?nif=' + nifInput)
                .then(response => response.text())
                .then(data => {
                    var resultadoInput = document.getElementById('resultado');
                    if (data.trim() === 'true') {
                        resultadoInput.value = 'NIF válido.';
                    } else {
                        resultadoInput.value = 'NIF inválido.';
                    }
                })
                .catch(error => {
                    console.error('Erro:', error);
                    var resultadoInput = document.getElementById('resultado');
                    resultadoInput.value = 'Erro ao verificar o NIF.';
                });
        }
    </script><h2>Verificar NIF</h2>
    <form>
        <label for="nif">Digite o NIF:</label>
        <input type="text" id="nif" name="nif">
        <button type="button" onclick="verificarNIF()">Verificar</button>
    </form>
    <br>
    <label for="resultado">Resultado:</label>
    <input type="text" id="resultado" name="resultado" readonly> -->