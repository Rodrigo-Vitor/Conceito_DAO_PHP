<?php 
require('./config.php');
require('./dao/UsuarioDaoMysql.php');

$userDao = new UsuarioDaoMysql($pdo);
//pegando todos os usuarios
$lista = $userDao->findAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="add.php">Adicionar usuario</a>
    <table border="1" width="100%">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php foreach($lista as $user): ?>
            <tr>
                <td><?php echo $user->getId() ?></td>
                <td><?php echo $user->getNome() ?></td>
                <td><?php echo $user->getEmail(); ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $user->getId() ?>">[ Editar ]</a>
                    <a href="delete.php?id=<?php echo $user->getId() ?>" onclick="return confirm('tem certeza?')">[ Excluir ]</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

