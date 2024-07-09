<?php
include_once 'conexao.php';

$titulo = "Tickets";
$pagina = "Admin - " . $titulo;
include_once '../Include_once/head.php';

$stmt_ticket = $con->prepare("SELECT * FROM ticket WHERE status != 'Apagado'");
$stmt_ticket->execute();
$tickets_ticket = $stmt_ticket->fetchAll(PDO::FETCH_ASSOC);

// Função para pegar a foto de perfil do user
function getUserPhoto($con, $idUser)
{
    $stmt = $con->prepare("SELECT fotoPerfil FROM user WHERE idUser = ?");
    $stmt->execute([$idUser]);
    return $stmt->fetchColumn();
}
?>

<body>
    <div class="pagTickets">
        <?php foreach ($tickets_ticket as $ticket) :
            // Tickets
            $fotoPerfil = getUserPhoto($con, $ticket['idUser']);
            $status = getStatusText($ticket['status']); ?>
            <div class="ticket">
                ID: <?= $ticket['idTicket'] ?><br>
                ID user: <?= $ticket['idUser'] ?>
                <a href="../PHP/perfil.php?idUser=<?= $ticket['idUser'] ?>">
                    <img src="../uploads/<?= $fotoPerfil ?>" class="miniFotoPerfil" id="ticketFoto" />
                </a><br><br>
                Mensagem: <?= $ticket['mensagem'] ?><br><br>
                Status: <?= $status ?><br>
                Data: <?= $ticket['dataCriacao'] ?><br>
                <button title="Cancelar pedido" class="cancelarBtn">❌</button>
            </div><br>
        <?php endforeach; ?>

        <?php
        // Alteração de dados
        $stmt_alteracao = $con->prepare("SELECT * FROM ticketalteracaodados");
        $stmt_alteracao->execute();
        $tickets_alteracao = $stmt_alteracao->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <h1>Pedidos de alteração de dados</h1>
        <?php foreach ($tickets_alteracao as $ticket) :
            $fotoPerfil = getUserPhoto($con, $ticket['idUser']);
            $status = getStatusText($ticket['status']); ?>
            <div class="ticket">
                ID: <?= $ticket['idTicketAlteracaoDados'] ?><br>
                ID user: <?= $ticket['idUser'] ?>
                <a href="../PHP/perfil.php?idUser=<?= $ticket['idUser'] ?>">
                    <img src="../uploads/<?= $fotoPerfil ?>" class="miniFotoPerfil" id="ticketFoto" />
                </a><br><br>
                Novo Email: <?= $ticket['novoEmail'] ?><br>
                Novo NIF: <?= $ticket['novoNif'] ?><br>
                Novo User: <?= $ticket['novoUser'] ?><br><br>
                Motivo: <?= $ticket['motivo'] ?><br><br>
                Status: <?= $status ?><br>
                Data: <?= $ticket['dataCriacao'] ?><br>
                <button title="Cancelar pedido" class="cancelarBtn">❌</button>
            </div><br>
        <?php endforeach; ?>

        <?php
        // Remoção de dados
        $stmt_remocao = $con->prepare("SELECT * FROM ticketremocaoconta");
        $stmt_remocao->execute();
        $tickets_remocao = $stmt_remocao->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <h1>Pedidos de remoção de conta</h1>
        <?php foreach ($tickets_remocao as $ticket) :
            $fotoPerfil = getUserPhoto($con, $ticket['idUser']);
            $status = getStatusText($ticket['status']); ?>
            <div class="ticket">
                ID: <?= $ticket['idTicketRemocaoConta'] ?><br>
                ID user: <?= $ticket['idUser'] ?>
                <a href="../PHP/perfil.php?idUser=<?= $ticket['idUser'] ?>">
                    <img src="../uploads/<?= $fotoPerfil ?>" class="miniFotoPerfil" id="ticketFoto" />
                </a><br><br>
                Motivo: <?= $ticket['motivo'] ?><br><br>
                Status: <?= $status ?><br>
                Data: <?= $ticket['dataCriacao'] ?><br>
                <button title="Cancelar pedido" class="cancelarBtn">❌</button>
            </div><br>
        <?php endforeach; ?>

    </div>

</body>

</html>

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
        default:
            return "";
    }
}
?>