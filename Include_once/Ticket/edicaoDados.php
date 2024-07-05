<?php
$idUser = $_SESSION['idUser'];
$result = $con->query("SELECT * FROM user WHERE idUser ='$idUser'")->fetchAll();
foreach ($result as $pessoa) {
}
$nif = $pessoa['user'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_SESSION['idUser']) && isset($_POST['motivo']) && isset($_POST['novoEmail']) && isset($_POST['novoNif']) && isset($_POST['novoUser'])) {
        $idUser = $_SESSION['idUser'];
        $motivo = $_POST['motivo'];
        $novoEmail = $_POST['novoEmail'];
        $novoNif = $_POST['novoNif'];
        $novoUser = $_POST['novoUser'];
        $status = 'Pendente';

        $query = "INSERT INTO ticketalteracaodados (idUser, novoEmail, novoNif, novoUser, motivo, status) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($query);

        $stmt->execute([$idUser, $novoEmail, $novoNif, $novoUser, $motivo, $status]);

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
    <form action="" id="formTicket" method="post">
        <div class="ticket">
            <div class="caixa">
                <h1>Pedido de Alteração de Dados</h1>
                <div style="text-align: center;">
                    <h2>Dados Anteriores:</h2>
                    Email: <?php echo $pessoa['email']; ?><br>
                    NIF: <?php echo $pessoa['nif']; ?><br>
                    User: <?php echo $pessoa['user']; ?><br>
                </div>
                <input type="email" minlength="8" maxlength="255" name="novoEmail" placeholder="Novo Email:" required /><br>

                <input type="number" name="novoNif" id="novoNif" placeholder="Novo NIF:" required /><br>
                <span id="error-nif" style="color: red;"></span><br>
                <input type="text" minlength="3" maxlength="255" name="novoUser" placeholder="Novo Nome de Usuário:" required /><br>
                <input type="text" minlength="8" maxlength="255" name="motivo" placeholder="Motivo:" required></input><br>
                <button type="submit">Enviar</button><br><br>
            </div>
        </div>
    </form>
</body>
<script>
    // Função para limitar o número de dígitos no campo novoNif
    document.getElementById('novoNif').addEventListener('input', function() {
        var maxDigits = 9;
        if (this.value.length > maxDigits) {
            this.value = this.value.slice(0, maxDigits);
            document.getElementById('error-nif').textContent = 'O NIF deve tem máximo de 9 dígitos.';
        } else {
            document.getElementById('error-nif').textContent = '';
        }
    });
</script>