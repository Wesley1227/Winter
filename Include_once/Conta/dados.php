<form action="../Include_once/atualizarDados.php" class="formDados" method="post" enctype="multipart/form-data">
    <div class="gridDados">
        <div id="dadosPrivados">
            <h1>Dados privados</h1>
            Nome:<input type="text" name="nome" placeholder="<?php echo $pessoa['nome'] ?>" class="nomeApelido" id="search-bar">
            Apelido:<input type="text" name="apelido" placeholder="<?php echo $pessoa['apelido']; ?>" class="nomeApelido" id="search-bar"><br>
            NIF:<input disabled type="text" name="nif" maxlength="9" placeholder="<?php echo $pessoa['nif']; ?>" class="dadosUser" style="width: 20%;" id="search-bar">

            <select name="genero" class="dropdown-select" id="">
                <option value="">Género</option>
                <option value="1">Masculino</option>
                <option value="2">Feminimo</option>
                <option value="3">Outro</option>
            </select><br>

            Email:<input disabled type="text" name="email" placeholder="<?php echo $pessoa['email']; ?>" class="dadosEmail" id="search-bar"><br>
            Morada:<input type="text" name="morada" placeholder="<?php echo $pessoa['morada']; ?>" class="inputDados" id="search-bar"><br>
            Código postal:<input type="text" minlength="8" maxlength="8" name="cod_postal" placeholder="<?php echo $pessoa['cod_postal'] ?>" class="dadosCodPostal" id="search-bar">
            <input type="text" name="localidade" placeholder="<?php echo $pessoa['localidade'] ?>" class="nomeApelido" id="search-bar"><br><br>

            Tipo de negócio: <br>
            <?php if ($pessoa['tipo_negocio'] == "s") { ?>
                <input type="radio" name="tipo_negocio" value="s" checked> Particular
                <input type="radio" name="tipo_negocio" value="n"> Profissional
            <?php } else { ?>
                <input type="radio" name="tipo_negocio" value="s"> Particular
                <input type="radio" name="tipo_negocio" value="n" checked> Profissional
            <?php } ?>
        </div>

        <div id="dadosPublicos">
            <h1>Dados públicos</h1>
            <?php if ($_SESSION['fotoPerfil'] == null) {
                $_SESSION['fotoPerfil'] = "semFotoPerfil.png";
            } ?>
            <img src="../uploads/<?= $_SESSION['fotoPerfil'] ?>" class="upload-img" /><br>
            <button class="custom-btn" id="fotoPerfil">
                <input type="file" name="fotoPerfil" />
            </button><br>
            User:<input disabled type="text" maxlength="12" name="user" placeholder="<?php echo $pessoa['user']; ?>" class="dadosUser" id="search-bar" /><br>
            Telemóvel:<input maxlength="9" type="text" name="telemovel" placeholder="<?php echo $pessoa['telemovel']; ?>" class="dadosTelemovel" id="search-bar"><br>
            <br>
            ID: <?php echo $id ?>
        </div>
    </div>
    <button type="submit" value="upload" class="custom-btn" name="submit">Atualizar</button>
</form>