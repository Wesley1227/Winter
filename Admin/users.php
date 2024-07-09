<?php
include('../login/protect.php');
include_once '../Include_once/conexao.php';
$titulo = "Utilizadores";
$pagina = "Admin - " . $titulo;
include_once '../Include_once/head.php';
?>
<body>
    
<?php


$query = "SELECT * FROM user";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>Email</th>
                <th>Nome</th>
                <th>Apelido</th>
                <th>Nível</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['idUser']}</td>
                <td>{$row['user']}</td>
                <td>{$row['email']}</td>
                <td>{$row['nome']}</td>
                <td>{$row['apelido']}</td>
                <td>
                    <a href='editarUser.php?id={$row['idUser']}'>Editar</a> |
                    <a onclick='return confirm('Quer mesmo sair? 🙁')' href='deleteUser.php?id={$row['idUser']}'>Deletar</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum usuário encontrado.";
}
?>
<a href="criarUser.php">Adicionar user</a>

</body>
</html>