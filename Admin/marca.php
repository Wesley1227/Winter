<?php
include_once 'conexao.php';
$titulo = "Inserções";
$pagina = "Winter - " . $titulo;
include_once '../Include_once/head.php';
?>

<body>
    
    <?php


    // Adicionar Marca
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['adicionar'])) {
        $marca = $_POST['marca'];

        if (!empty($marca)) {
            // Verificar se a marca já existe
            $queryVerificar = "SELECT * FROM marca WHERE marca = ?";
            $stmtVerificar = $mysqli->prepare($queryVerificar);
            $stmtVerificar->bind_param("s", $marca);
            $stmtVerificar->execute();
            $resultVerificar = $stmtVerificar->get_result();

            if ($resultVerificar->num_rows > 0) {
                echo "A marca já existe!";
            } else {
                // Adicionar nova marca
                $queryAdicionar = "INSERT INTO marca (marca) VALUES (?)";
                $stmtAdicionar = $mysqli->prepare($queryAdicionar);
                $stmtAdicionar->bind_param("s", $marca);

                if ($stmtAdicionar->execute()) {
                    echo "Marca adicionada com sucesso!";
                } else {
                    echo "Erro ao adicionar a marca: " . $mysqli->error;
                }

                $stmtAdicionar->close();
            }

            $stmtVerificar->close();
        } else {
            echo "Por favor, insira uma marca.";
        }
    }

    // Eliminar Marca
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['eliminar'])) {
        $idMarca = $_POST['idMarca'];

        if (!empty($idMarca)) {
            $queryEliminar = "DELETE FROM marca WHERE idMarca = ?";
            $stmtEliminar = $mysqli->prepare($queryEliminar);
            $stmtEliminar->bind_param("i", $idMarca);

            if ($stmtEliminar->execute()) {
                echo "Marca eliminada com sucesso!";
            } else {
                echo "Erro ao eliminar a marca: " . $mysqli->error;
            }

            $stmtEliminar->close();
        } else {
            echo "Por favor, selecione uma marca para eliminar.";
        }
    }
    ?>

    <body>

        <h2>Adicionar Marca</h2>
        <form action="marca.php" method="post">
            <label for="marca">Marca:</label>
            <input type="text" id="marca" name="marca" required>
            <button type="submit" name="adicionar">Adicionar</button>
        </form>

        <h2>Eliminar Marca</h2>
        <form action="marca.php" method="post">
            <label for="idMarca">Selecione a Marca:</label>
            <select id="idMarca" style="width: 200px;" name="idMarca" required>
                <option value="">Selecione</option>
                <?php
                $queryMarcas = "SELECT idMarca, marca FROM marca";
                $resultMarcas = $mysqli->query($queryMarcas);

                while ($row = $resultMarcas->fetch_assoc()) {
                    echo "<option value='" . $row['idMarca'] . "'>" . $row['marca'] . "</option>";
                }
                ?>
            </select>
            <button type="submit" name="eliminar">Eliminar</button>
        </form>

        <h2>Lista de Marcas</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Marca</th>
            </tr>
            <?php
            $queryListarMarcas = "SELECT * FROM marca";
            $resultListarMarcas = $mysqli->query($queryListarMarcas);

            while ($row = $resultListarMarcas->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row['idMarca'] . "</td>
                    <td>" . $row['marca'] . "</td>
                  </tr>";
            }
            ?>
        </table>
    </body>
    <!-- Inclua o JavaScript do Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        // Ativar Select2 nos selects
        $(document).ready(function() {
            $('select').select2();
        });
    </script>
    </html>