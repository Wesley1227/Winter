<?php
include_once 'conexao.php';

$titulo = "Tickets";
$pagina = "Admin - " . $titulo;
include_once '../Include_once/head.php';

// Função para pegar a foto de perfil do user
function getUserPhoto($con, $idUser)
{
    $stmt = $con->prepare("SELECT fotoPerfil FROM user WHERE idUser = ?");
    $stmt->execute([$idUser]);
    return $stmt->fetchColumn();
}

// Função para pegar o texto do status
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

// Processa o formulário de atualização de status
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['idTicket']) && isset($_POST['status'])) {
    $idTicket = $_POST['idTicket'];
    $novoStatus = $_POST['status'];
    $queryUpdate = "UPDATE ticket SET status = ? WHERE idTicket = ?";
    $stmtUpdate = $con->prepare($queryUpdate);
    if ($stmtUpdate->execute([$novoStatus, $idTicket])) {
        echo "Status atualizado com sucesso.";
    } else {
        echo "Erro ao atualizar status.";
    }
}

$stmt_ticket = $con->prepare("SELECT * FROM ticket WHERE status != 'Apagado'");
$stmt_ticket->execute();
$tickets_ticket = $stmt_ticket->fetchAll(PDO::FETCH_ASSOC);
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

                <!-- Formulário para atualizar o status -->
                <form method="post" action="">
                    <input type="hidden" name="idTicket" value="<?= $ticket['idTicket'] ?>">
                    <label for="status">Alterar Status:</label>
                    <select name="status" id="status">
                        <option value="Pendente" <?= $ticket['status'] == "Pendente" ? 'selected' : ''; ?>>Pendente 🟠</option>
                        <option value="Resolvido" <?= $ticket['status'] == "Resolvido" ? 'selected' : ''; ?>>Resolvido 🟢</option>
                        <option value="Recusado" <?= $ticket['status'] == "Recusado" ? 'selected' : ''; ?>>Recusado 🔴</option>
                    </select>
                    <button type="submit">Atualizar</button>
                </form>

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

                <!-- Formulário para atualizar o status -->
                <form method="post" action="">
                    <input type="hidden" name="idTicket" value="<?= $ticket['idTicketAlteracaoDados'] ?>">
                    <label for="status">Alterar Status:</label>
                    <select name="status" id="status">
                        <option value="Pendente" <?= $ticket['status'] == "Pendente" ? 'selected' : ''; ?>>Pendente 🟠</option>
                        <option value="Resolvido" <?= $ticket['status'] == "Resolvido" ? 'selected' : ''; ?>>Resolvido 🟢</option>
                        <option value="Recusado" <?= $ticket['status'] == "Recusado" ? 'selected' : ''; ?>>Recusado 🔴</option>
                    </select>
                    <button type="submit">Atualizar</button>
                </form>

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

                <!-- Formulário para atualizar o status -->
                <form method="post" action="">
                    <input type="hidden" name="idTicket" value="<?= $ticket['idTicketRemocaoConta'] ?>">
                    <label for="status">Alterar Status:</label>
                    <select name="status" id="status">
                        <option value="Pendente" <?= $ticket['status'] == "Pendente" ? 'selected' : ''; ?>>Pendente 🟠</option>
                        <option value="Resolvido" <?= $ticket['status'] == "Resolvido" ? 'selected' : ''; ?>>Resolvido 🟢</option>
                        <option value="Recusado" <?= $ticket['status'] == "Recusado" ? 'selected' : ''; ?>>Recusado 🔴</option>
                    </select>
                    <button type="submit">Atualizar</button>
                </form>

                <button title="Cancelar pedido" class="cancelarBtn">❌</button>
            </div><br>
        <?php endforeach; ?>

    </div>
</body>

</html>
