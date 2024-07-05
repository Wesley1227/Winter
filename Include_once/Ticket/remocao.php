<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['idUser']) && isset($_POST['motivo'])) {
        $idUser = $_SESSION['idUser'];
        $motivo = $_POST['motivo'];
        $status = 'Pendente'; // Status inicial do pedido de remoção de conta
        $dataCriacao = date('Y-m-d H:i:s');

        // Prepara a consulta SQL
        $query = "INSERT INTO ticketremocaoconta (idUser, motivo, status, dataCriacao) VALUES (?, ?, ?, ?)";
        $stmt = $con->prepare($query);
        $stmt->execute([$idUser, $motivo, $status, $dataCriacao]);

        if ($stmt) {
            echo "<script> window.location.href = '../PHP/ticket.php?assunto=4';</script>";
            exit; 
        } else {
            echo "<script>alert('Erro ao enviar o ticket.');</script>";
        }
    }
}
?>

<body>
    <form action="" id="formLogin" method="post">
        <div class="login">
            <div class="caixa">
                <h1>Pedido de remoção de conta</h1>
                <br><br><br>
                <input type="text" name="motivo" placeholder="Motivo:" required />
                <button type="submit">Enviar</button><br><br><br><br>
            </div>
        </div>
    </form>
</body>

</html>