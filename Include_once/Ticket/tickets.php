<?php
$idUser = $_SESSION['idUser'];
$query_ticket = "SELECT * FROM ticket WHERE idUser = ? ORDER BY status ASC";
$stmt_ticket = $con->prepare($query_ticket);
$stmt_ticket->execute([$idUser]);
$tickets_ticket = $stmt_ticket->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
    <div class="pagTickets">
        <?php foreach ($tickets_ticket as $ticket) : ?>
            <div class="ticket">
                ID: <?php echo $ticket['idTicket']; ?>
                <a href="../PHP/perfil.php?idUser=<?= $ticket['idUser']; ?>"> <img src="../uploads/<?= $_SESSION['fotoPerfil'] ?>" class="miniFotoPerfil" id="ticketFoto" /></a><br><br>
                Mensagem: <?php echo $ticket['mensagem']; ?><br><br>
                <?php $status = getStatusText($ticket['status']); ?>Status: <?= $status ?><br>
                Data: <?php echo $ticket['dataCriacao']; ?><br>
                <button title="Cancelar pedido" class="cancelarBtn">❌</button>
            </div><br>
        <?php endforeach; ?>

        <?php
        // Consulta SQL para selecionar os tickets da tabela ticketalteracaodados para o utilizador com login feito
        $query_alteracao = "SELECT * FROM ticketalteracaodados WHERE idUser = ?";
        $stmt_alteracao = $con->prepare($query_alteracao);
        $stmt_alteracao->execute([$idUser]);
        $tickets_alteracao = $stmt_alteracao->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <h1>Pedidos de alteração de dados</h1>
        <?php foreach ($tickets_alteracao as $ticket) : ?>
            <div class="ticket">
                ID: <?php echo $ticket['idTicketAlteracaoDados']; ?>
                <a href="../PHP/perfil.php?idUser=<?= $ticket['idUser']; ?>"> <img src="../uploads/<?= $_SESSION['fotoPerfil'] ?>" class="miniFotoPerfil" id="ticketFoto" /></a><br><br>
                Novo Email: <?php echo $ticket['novoEmail']; ?><br>
                Novo NIF: <?php echo $ticket['novoNif']; ?><br>
                Novo User: <?php echo $ticket['novoUser']; ?><br><br>
                Motivo: <?php echo $ticket['motivo']; ?><br><br>
                <?php $status = getStatusText($ticket['status']); ?>Status: <?= $status ?><br>
                Data: <?php echo $ticket['dataCriacao']; ?><br>
                <button title="Cancelar pedido" class="cancelarBtn">❌</button>
            </div><br>
        <?php endforeach; ?>

        <?php
        // Consulta SQL para selecionar os tickets da tabela ticketremocaoconta para o utilizador com login feito
        $query_remocao = "SELECT * FROM ticketremocaoconta WHERE idUser = ? ";
        $stmt_remocao = $con->prepare($query_remocao);
        $stmt_remocao->execute([$idUser]);
        $tickets_remocao = $stmt_remocao->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <h1>Pedidos de remoção de conta</h1>
        <?php foreach ($tickets_remocao as $ticket) : ?>
            <div class="ticket">
                ID: <?php echo $ticket['idTicketRemocaoConta']; ?>
                <a href="../PHP/perfil.php?idUser=<?= $ticket['idUser']; ?>"> <img src="../uploads/<?= $_SESSION['fotoPerfil'] ?>" class="miniFotoPerfil" id="ticketFoto" /></a><br><br>
                Motivo: <?php echo $ticket['motivo']; ?><br><br>
                <?php $status = getStatusText($ticket['status']); ?>Status: <?= $status ?><br>
                Data: <?php echo $ticket['dataCriacao']; ?><br>
                <button title="Cancelar pedido" class="cancelarBtn">❌</button>
            </div><br>
        <?php endforeach; ?>

        <?php
        // Consulta SQL para selecionar as denuncias da tabela denuncias para o utilizado com login feito
        $query_remocao = "SELECT * FROM denuncias WHERE idUser = ?";
        $stmt_remocao = $con->prepare($query_remocao);
        $stmt_remocao->execute([$idUser]);
        $tickets_remocao = $stmt_remocao->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <h1>Denúncias feitas</h1>
        <?php foreach ($tickets_remocao as $ticket) : ?>
            <div class="ticket">
                ID: <?php echo $ticket['idDenuncia']; ?>
                <a href="../PHP/perfil.php?idUser=<?= $ticket['idUser']; ?>"> <img src="../uploads/<?= $_SESSION['fotoPerfil'] ?>" class="miniFotoPerfil" id="ticketFoto" /></a><br><br>
                Motivo: <?php echo $ticket['motivo']; ?><br><br>
                <?php $status = getStatusText($ticket['status']); ?>Status: <?= $status ?><br>
                Data: <?php echo $ticket['dataDenuncia']; ?><br>
                <button title="Cancelar pedido" class="cancelarBtn">❌</button>
            </div><br>
        <?php endforeach; ?>
    </div>

</body>

</html>