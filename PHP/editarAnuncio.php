<div id="editarAnuncioPopup" style="display: none;">
    <form method="POST" action="../Include_once/atualizarAnuncio.php" enctype="multipart/form-data">
        <input type="hidden" name="idAnuncio" value="<?= $idAnuncio ?>">
        <input type="text" minlength="10" name="titulo" value="<?= $titulo ?>"><br><br>
        <textarea minlength="10" style="width: 60%; height: 150px; padding: 10px;" name="descricao"><?= $result['descricao'] ?></textarea><br>
        <input type="number" min="0" style="width: 10%; text-align: center;" name="preco" value="<?php echo $result['preco']; ?>"><br><br>
        <input type="text" minlength="0" maxlength="255" style="width: 30%;" name="linkYT" value="<?= $result['linkYT'] ?>"><br><br>
        <input type="file" accept="image/*" name="imagem" style="width: 30%;"><br><br>
        <button type="submit">Salvar Alterações</button>
        <button>Fechar</button>
    </form>
</div>

