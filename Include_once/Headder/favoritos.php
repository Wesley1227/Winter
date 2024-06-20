<li class="menu-hasdropdown">
    <?php include_once '../Include_once/Headder/numFavoritos.php'; ?>
    <a href="#" title="Favoritos">❤<div class="mensagensNaoLidas"><?= $numFavoritos ?></div></a>
    <input type="checkbox" id="about">
    <ul class="menu-dropdown">
        <li><a href="../PHP/favoritos.php">Anúncios</a></li>
        <!-- <li><a href="../PHP/favoritos.php?idPag=2">Pesquisas</a></li> -->
        <li><a href="../PHP/historico.php">Histórico</a></li>
    </ul>
</li>