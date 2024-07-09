<?php
include_once('conexao.php');

// Adicionar Categoria
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['adicionarCategoria'])) {
    $nomeCategoria = $_POST['nomeCategoria'];

    if (!empty($nomeCategoria)) {
        // Verificar se a categoria já existe
        $queryVerificar = "SELECT * FROM categoria WHERE nome = ?";
        $stmtVerificar = $mysqli->prepare($queryVerificar);
        $stmtVerificar->bind_param("s", $nomeCategoria);
        $stmtVerificar->execute();
        $resultVerificar = $stmtVerificar->get_result();

        if ($resultVerificar->num_rows > 0) {
            echo "A categoria já existe!";
        } else {
            // Adicionar nova categoria
            $queryAdicionar = "INSERT INTO categoria (nome) VALUES (?)";
            $stmtAdicionar = $mysqli->prepare($queryAdicionar);
            $stmtAdicionar->bind_param("s", $nomeCategoria);

            if ($stmtAdicionar->execute()) {
                echo "Categoria adicionada com sucesso!";
                // Redirecionar para a página insercoes.php?idPag=2
                echo "<script>history.back();</script>";
                exit();
            } else {
                echo "Erro ao adicionar a categoria: " . $mysqli->error;
            }

            $stmtAdicionar->close();
        }

        $stmtVerificar->close();
    } else {
        echo "Por favor, insira um nome para a categoria.";
    }
}

// Adicionar Subcategoria
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['adicionarSubcategoria'])) {
    $nomeSubcategoria = $_POST['nomeSubcategoria'];
    $idCategoria = $_POST['idCategoria'];

    if (!empty($nomeSubcategoria) && !empty($idCategoria)) {
        // Verificar se a subcategoria já existe
        $queryVerificar = "SELECT * FROM subcategoria WHERE nome = ? AND idCategoria = ?";
        $stmtVerificar = $mysqli->prepare($queryVerificar);
        $stmtVerificar->bind_param("si", $nomeSubcategoria, $idCategoria);
        $stmtVerificar->execute();
        $resultVerificar = $stmtVerificar->get_result();

        if ($resultVerificar->num_rows > 0) {
            echo "A subcategoria já existe!";
        } else {
            // Adicionar nova subcategoria
            $queryAdicionar = "INSERT INTO subcategoria (nome, idCategoria) VALUES (?, ?)";
            $stmtAdicionar = $mysqli->prepare($queryAdicionar);
            $stmtAdicionar->bind_param("si", $nomeSubcategoria, $idCategoria);

            if ($stmtAdicionar->execute()) {
                echo "Subcategoria adicionada com sucesso!";
                // Redirecionar para a página insercoes.php?idPag=2
                echo "<script>history.back();</script>";
                exit();
            } else {
                echo "Erro ao adicionar a subcategoria: " . $mysqli->error;
            }

            $stmtAdicionar->close();
        }

        $stmtVerificar->close();
    } else {
        echo "Por favor, insira um nome para a subcategoria e selecione uma categoria.";
    }
}

// Adicionar Subsubcategoria
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['adicionarSubsubcategoria'])) {
    $nomeSubsubcategoria = $_POST['nomeSubsubcategoria'];
    $idSubcategoria = $_POST['idSubcategoria'];

    if (!empty($nomeSubsubcategoria) && !empty($idSubcategoria)) {
        // Verificar se a subsubcategoria já existe
        $queryVerificar = "SELECT * FROM subsubcategoria WHERE nome = ? AND idSubcategoria = ?";
        $stmtVerificar = $mysqli->prepare($queryVerificar);
        $stmtVerificar->bind_param("si", $nomeSubsubcategoria, $idSubcategoria);
        $stmtVerificar->execute();
        $resultVerificar = $stmtVerificar->get_result();

        if ($resultVerificar->num_rows > 0) {
            echo "A subsubcategoria já existe!";
        } else {
            // Adicionar nova subsubcategoria
            $queryAdicionar = "INSERT INTO subsubcategoria (nome, idSubcategoria) VALUES (?, ?)";
            $stmtAdicionar = $mysqli->prepare($queryAdicionar);
            $stmtAdicionar->bind_param("si", $nomeSubsubcategoria, $idSubcategoria);

            if ($stmtAdicionar->execute()) {
                echo "Subsubcategoria adicionada com sucesso!";
                // Redirecionar para a página insercoes.php?idPag=2
                echo "<script>history.back();</script>";
                exit();
            } else {
                echo "Erro ao adicionar a subsubcategoria: " . $mysqli->error;
            }

            $stmtAdicionar->close();
        }

        $stmtVerificar->close();
    } else {
        echo "Por favor, insira um nome para a subsubcategoria e selecione uma subcategoria.";
    }
}

// Eliminar Categoria
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['eliminarCategoria'])) {
    $idCategoria = $_POST['idCategoria'];

    if (!empty($idCategoria)) {
        $queryEliminar = "DELETE FROM categoria WHERE id = ?";
        $stmtEliminar = $mysqli->prepare($queryEliminar);
        $stmtEliminar->bind_param("i", $idCategoria);

        if ($stmtEliminar->execute()) {
            echo "Categoria eliminada com sucesso!";
            // Redirecionar para a página insercoes.php?idPag=2
            echo "<script>history.back();</script>";
            exit();
        } else {
            echo "Erro ao eliminar a categoria: " . $mysqli->error;
        }

        $stmtEliminar->close();
    } else {
        echo "Por favor, selecione uma categoria para eliminar.";
    }
}

// Eliminar Subcategoria
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['eliminarSubcategoria'])) {
    $idSubcategoria = $_POST['idSubcategoria'];

    if (!empty($idSubcategoria)) {
        $queryEliminar = "DELETE FROM subcategoria WHERE id = ?";
        $stmtEliminar = $mysqli->prepare($queryEliminar);
        $stmtEliminar->bind_param("i", $idSubcategoria);

        if ($stmtEliminar->execute()) {
            echo "Subcategoria eliminada com sucesso!";
            // Redirecionar para a página insercoes.php?idPag=2
            echo "<script>history.back();</script>";
            exit();
        } else {
            echo "Erro ao eliminar a subcategoria: " . $mysqli->error;
        }

        $stmtEliminar->close();
    } else {
        echo "Por favor, selecione uma subcategoria para eliminar.";
    }
}

// Eliminar Subsubcategoria
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['eliminarSubsubcategoria'])) {
    $idSubsubcategoria = $_POST['idSubsubcategoria'];

    if (!empty($idSubsubcategoria)) {
        $queryEliminar = "DELETE FROM subsubcategoria WHERE id = ?";
        $stmtEliminar = $mysqli->prepare($queryEliminar);
        $stmtEliminar->bind_param("i", $idSubsubcategoria);

        if ($stmtEliminar->execute()) {
            echo "Subsubcategoria eliminada com sucesso!";
            // Redirecionar para a página insercoes.php?idPag=2
            echo "<script>history.back();</script>";
            exit();
        } else {
            echo "Erro ao eliminar a subsubcategoria: " . $mysqli->error;
        }

        $stmtEliminar->close();
    } else {
        echo "Por favor, selecione uma subsubcategoria para eliminar.";
    }
}
?>



<body>

    <h2>Adicionar Categoria</h2>
    <form action="insercoes.php?idPag=2" method="post">
        <label for="nomeCategoria">Nome da Categoria:</label>
        <input type="text" id="nomeCategoria" name="nomeCategoria" required>
        <button type="submit" name="adicionarCategoria">Adicionar</button>
    </form>

    <h2>Adicionar Subcategoria</h2>
    <form action="insercoes.php?idPag=2" method="post">
        <label for="idCategoria">Selecione a </label>
        <select id="idCategoria" style="width: 200px;" name="idCategoria" required>
            <option value="">Categoria:</option>
            <?php
            $queryCategorias = "SELECT id, nome FROM categoria";
            $resultCategorias = $mysqli->query($queryCategorias);

            while ($row = $resultCategorias->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
            }
            ?>
        </select>
        <label for="nomeSubcategoria">Nome da Subcategoria:</label>
        <input type="text" id="nomeSubcategoria" name="nomeSubcategoria" required>
        <button type="submit" name="adicionarSubcategoria">Adicionar</button>
    </form>

    <h2>Adicionar Subsubcategoria</h2>
    <form action="insercoes.php?idPag=2" method="post">
        <label for="idSubcategoria">Selecione a </label>
        <select id="idSubcategoria" style="width: 200px;" name="idSubcategoria" required>
            <option value="">Subcategoria:</option>
            <?php
            $querySubcategorias = "SELECT id, nome FROM subcategoria";
            $resultSubcategorias = $mysqli->query($querySubcategorias);

            while ($row = $resultSubcategorias->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
            }
            ?>
        </select>
        <label for="nomeSubsubcategoria">Nome da Subsubcategoria:</label>
        <input type="text" id="nomeSubsubcategoria" name="nomeSubsubcategoria" required>
        <button type="submit" name="adicionarSubsubcategoria">Adicionar</button>
    </form><br><br><br>
    <h2>Eliminar Categoria</h2>
    <form action="insercoes.php?idPag=2" method="post">
        <label for="idCategoriaEliminar">Selecione a Categoria:</label>
        <select id="idCategoriaEliminar" style="width: 200px;" name="idCategoria" required>
            <option value="">Categoria:</option>
            <?php
            $queryCategorias = "SELECT id, nome FROM categoria";
            $resultCategorias = $mysqli->query($queryCategorias);

            while ($row = $resultCategorias->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
            }
            ?>
        </select>
        <button type="submit" name="eliminarCategoria">Eliminar</button>
    </form>

    <h2>Eliminar Subcategoria</h2>
    <form action="insercoes.php?idPag=2" method="post">
        <label for="idSubcategoriaEliminar">Selecione a </label>
        <select id="idSubcategoriaEliminar" style="width: 200px;" name="idSubcategoria" required>
            <option value="">Subcategoria:</option>
            <?php
            $querySubcategorias = "SELECT id, nome FROM subcategoria";
            $resultSubcategorias = $mysqli->query($querySubcategorias);

            while ($row = $resultSubcategorias->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
            }
            ?>
        </select>
        <button type="submit" name="eliminarSubcategoria">Eliminar</button>
    </form>

    <h2>Eliminar Subsubcategoria</h2>
    <form action="insercoes.php?idPag=2" method="post">
        <label for="idSubsubcategoriaEliminar">Selecione a </label>
        <select id="idSubsubcategoriaEliminar" style="width: 200px;" name="idSubsubcategoria" required>
            <option value="">Subsubcategoria:</option>
            <?php
            $querySubsubcategorias = "SELECT id, nome FROM subsubcategoria";
            $resultSubsubcategorias = $mysqli->query($querySubsubcategorias);

            while ($row = $resultSubsubcategorias->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
            }
            ?>
        </select>
        <button type="submit" name="eliminarSubsubcategoria">Eliminar</button>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('select').select2();
        });
    </script>