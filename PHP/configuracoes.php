<?php
include_once '../Include_once/conexao.php';
$titulo = "Configurações";
$pagina = "Winter - " . $titulo;
$logo = "../img/logo.png";
include_once '../Include_once/head.php';

$status = "";
$currentStatus = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['status'])) {
    $newStatus = $_POST['status'];

    $idUser = $_SESSION['idUser'];
    $stmt = $con->prepare("UPDATE user SET status = :newStatus WHERE idUser = :idUser");
    $stmt->bindParam(':newStatus', $newStatus, PDO::PARAM_INT);
    $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);

    if ($stmt->execute()) {
        $status = "Status atualizado com sucesso para $newStatus";
        $currentStatus = $newStatus;
    } else {
        $status = "Erro ao atualizar o status";
    }
}

if (isset($_SESSION['idUser'])) {
    $idUser = $_SESSION['idUser'];
    $stmt = $con->prepare("SELECT status FROM user WHERE idUser = :idUser");
    $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);

    if ($stmt->execute()) {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result !== false && isset($result['status'])) {
            $currentStatus = $result['status'];
        } else {
            $status = "Erro: utilizador não encontrado";
        }
    } else {
        $status = "Erro na consulta do status";
    }
}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<body>
    <div id="configuracoes">
        <h1></h1>
        <p>Fez o login à: <br>
            <?php echo $tempoFormatado; ?></p>
        <h1>Envie um ticket:</h1>
        <a href="ticket.php?assunto=1"> <button>Pedir edição de dados pessoais</button></a><br>
        <a href="ticket.php?assunto=2"> <button style="width: 37%;">Pedir remoção de conta</button </a><br>
            <a href="ticket.php?assunto=3"> <button style="width: 34%;">Outro motivo</button></a><br>
            <a href="ticket.php?assunto=4"> <button style="width: 29% auto;">Verificar tickets
                    existentes</button></a><br>

            <h2>Atualizar Status</h2>

            <?php if (!empty($status)): ?>
                <p><?php echo $status; ?></p>
            <?php endif; ?>

            <form id="updateStatusForm" method="post">
                <label for="statusSelect">Escolha um novo status:</label>
                <select name="status" id="statusSelect">
                    <option value="1" <?php if ($currentStatus == 1)
                        echo "selected"; ?>>🔴 Offline</option>
                    <option value="2" <?php if ($currentStatus == 2)
                        echo "selected"; ?>>🟢 Online</option>
                    <option value="3" <?php if ($currentStatus == 3)
                        echo "selected"; ?>>🔘 Indesponível</option>
                </select>
                <button type="submit" style="width: 20vh;">Atualizar</button>
            </form>
    </div>
    <script>
        $(document).ready(function () {
            $('#updateStatusForm').submit(function (event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: 'configuracoes.php',
                    data: formData,
                    success: function (response) {
                        window.location.href = 'index.php';
                    },
                    error: function () {
                        $('p').text('Erro ao atualizar o status.');
                    }
                });
            });
        });
    </script>
</body>
<?php include_once '../Include_once/footer.php'; ?>

</html>