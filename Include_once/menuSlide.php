<div class="wui-side-menu " data-wui-theme="dark">
    <div class="wui-side-menu-header">
        <a href="#" class="wui-side-menu-trigger"><i class="fa fa-bars"> Filtros</i></a>
        <a href="#" class="wui-side-menu-pin-trigger"> </a>
    </div>

    <ul class="wui-side-menu-items">
        <?php
        if (isset($_SESSION['idUser']) != null || isset($_SESSION['idUser']) != 0) {
            include_once("filtros.php");
        }
        else{
            echo "Sem login";
        }
        ?>
    </ul>
</div>

<div class="wui-content">
    <div class="wui-content-header">
        <a href="#" class="wui-side-menu-trigger" id="menuFechado"><i class="fa fa-bars"></i> Filtros</a>
        <!-- Menu fechado -->