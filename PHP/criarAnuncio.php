<?php
include_once '../Include_once/conexao.php';
$query = "SELECT * FROM categoria ORDER BY nome";
$queryMarca = "SELECT marca FROM marca ORDER BY marca";
$result = $conn->query($query);
$resultadoMarca = $conn->query($queryMarca);
$titulo = "Visual ainda desenvolvimento";
$pagina = "Winter - " . $titulo;
include_once '../Include_once/head.php';
?>

<body>
    <form method="POST" action="../Include_once/inserir.php" enctype="multipart/form-data">
        <div class="formAnuncio">

            <input type="text" name="titulo" class="tituloAnuncio" id="search-bar" minlength="2" required placeholder="Título do seu anuncio:"><br>
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
            </select> <br>

            <select name="subSubCategoria" id="subSubCategoria" class="dropdown-select">
                <option value="">Sub-Subcategoria</option>
            </select>

            <select name="marca" id="marca" class="dropdown-select">
                <option value="">Marca</option>
                <option value="Outro">Outro</option>
                <?php
                if ($resultadoMarca->num_rows > 0) {
                    while ($row = $resultadoMarca->fetch_assoc()) {
                        echo '<option value=' . $row['marca'] . '>' . $row['marca'] . '</option>';
                    }
                } ?>
            </select> <br>

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
                <option value="2">Trocar</option>
                <option value="3">Doar</option>
                <option value="4">Comprar</option>
            </select> <br>

            <div id="opcao1" style="display: none;">
                <input type="text" for="preco" name="preco" class="preco" id="search-bar" placeholder="Preço">
            </div><!-- Transforma o "Preço" em POP-UP -->

            <input type="text" name="localizacao" class="localizacao" id="search-bar" minlength="2" placeholder="Localização:"><br>

            <input type="file" name="imagem">


            <button type="submit" class="custom-btn" id="anunciar" name="submit" value="upload">Anunciar</button>
        </div>
    </form><br><br><br>

</body>
<?php include_once '../Include_once/footer.php'; ?>

</html>

<!-- ||||||||||||||||||||||| JAVA SCRIPT \\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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