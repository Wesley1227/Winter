<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_SESSION['idUser']) && isset($_POST['mensagem'])) {
        $idUser = $_SESSION['idUser'];
        $mensagem = $_POST['mensagem'];
        $status = 'Pendente';

        $query = "INSERT INTO ticket (idUser, mensagem, status) VALUES (?, ?, ?)";
        $stmt = $con->prepare($query);

        if ($stmt->execute([$idUser, $mensagem, $status])) {
            echo "<script> window.location.href = '../PHP/ticket.php?assunto=4';</script>";
            exit; 
        } else {
            echo "<script>alert('Erro ao enviar o ticket.');</script>";
        }
    }
}
?>


<body>
    <form action="" id="formTicket" method="post">
        <div class="ticket">
            <div class="caixa">
                <h1>Criação de Ticket</h1>
                <br><br><br>
                <input type="text" name="mensagem" placeholder="Mensagem:" required /><br>
                <h3 style="text-align: center;">Provas (opcional):</h3> <input id="provas" name="print" type="file"><br>
                <button type="submit">Enviar</button><br><br>
            </div>
        </div>
    </form>
</body>

</html>