<?php
include_once '../Include_once/conexao.php';
$titulo = "Ticket";
$pagina = "Winter - " . $titulo;
$logo = "../img/logo.png";
include_once '../Include_once/head.php';
$assunto = $_GET["assunto"];
?>

<body>
    <div id="ticket">
        <h1></h1>
        <div class="menuHistorico">
            <a href="ticket.php?assunto=1">
                <button class="custom-btn" style="width: 100%;" id="
                <?php if ($assunto == "1") {
                    echo "btn_ticket2";
                } ?>">Pedir edição de dados pessoais</button></a>

            <a href="ticket.php?assunto=2">
                <button class="custom-btn" style="width: 100%;" id="
                <?php if ($assunto == "2") {
                    echo "btn_ticket2";
                } ?>">Pedir remoção de conta</button </a>

                <a href="ticket.php?assunto=3">
                    <button class="custom-btn" style="width: 100%;" id="
                    <?php if ($assunto == "3") {
                        echo "btn_ticket2";
                    } ?>">Outro motivo</button></a>
                    
        </div><br>
        <a href="ticket.php?assunto=4">
            <button class="custom-btn" style="width: 40%;" id="
            <?php if ($assunto == "4") {
                echo "btn_ticket2";
            } ?>">Tickets existentes</button></a><br><br>

        <?php
        function getStatusText($status)
        {
            switch ($status) {
                case "Pendente":
                    return "Pendente 🟠";
                case "Resolvido":
                    return "Resolvido 🟢";
                case "Recusado":
                    return "Recusado 🔴";
                case "Apagado":
                    return "Apagado ⚫";
                default:
                    return "ERRO";
            }
        }

        $assunto = $_GET["assunto"];
        if ($assunto == 1) {
            include_once('../Include_once/Ticket/edicaoDados.php');
        }
        if ($assunto == 2) {
            include_once('../Include_once/Ticket/remocao.php');
        }
        if ($assunto == 3) {
            include_once('../Include_once/Ticket/outroMotivo.php');
        }
        if ($assunto == 4) {
            include_once('../Include_once/Ticket/tickets.php');
        }
        ?>
        <br><br>
    </div>
</body>
<?php include_once '../Include_once/footer.php'; ?>

</html>