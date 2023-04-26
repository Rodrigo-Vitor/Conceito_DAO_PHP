<?php 
require('./config.php');
require("./dao/UsuarioDaoMysql.php");
$usuarioDao = new UsuarioDaoMysql($pdo);

$id = filter_input(INPUT_GET, 'id');

// recebendo usuario ja existente para edição
if($usuarioDao->findById($id) === false) {
    header("location:index.php");
    exit;
} else {
    $info = $usuarioDao->findById($id);
}
?>

<form action="update_action.php" method="POST" >
    <input type="hidden" name="id" value="<?=$info['id']?>">
    <p>
        Nome:
        <input type="text" name="name" value="<?=$info['nome']?>">
    </p>
    <p>
        Email: 
        <input type="text" name="email" value="<?=$info['email']?>">
    </p>
    <input type="submit" value="Enviar">
</form>