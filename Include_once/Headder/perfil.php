<li><a href="../PHP/conta.php?idPag=1">Mensagens</a></li>
<li><a href="../PHP/perfil.php?idUser=<?=$_SESSION['idUser'];?>">Perfil</a></li>
<li class="menu-hasdropdown menu-hasflyout">
    <a href="#">Conta  
        <label title="toggle menu" for="services">
            <i class="fa fa-caret-down menu-downicon"></i>
            <i class="fa fa-caret-right menu-righticon"></i>
        </label>
    </a>
    <input type="checkbox" id="services">
    <ul class="menu-dropdown">
        <li><a href="../PHP/conta.php?idPag=2">Anúncios</a></li>
        <li><a href="../PHP/conta.php?idPag=3">Avaliações</a></li>
        <li><a href="../PHP/conta.php?idPag=4">Dados</a></li>
        <!-- <li><a href="">CV</a></li> -->
    </ul>
</li>