<?php
include_once('../Include_once/conexao.php');
include_once('../Login/protect.php');
$idUser = $_SESSION['idUser'];
$idAnuncio = $_GET['idAnuncio'];
$result = $con->query("SELECT * FROM chat WHERE idUser = '$idUser'AND idAnuncio = '$idAnuncio'")->fetchAll();
foreach ($result as $chat) {
    echo "😊" . $chat['nome']; ?> <br>
    <?php
    echo $chat['mensagem']; ?> <br><br>
<?php
}
?>