<?php 
require('./config.php');
require("./dao/UsuarioDaoMysql.php");
$usuarioDao = new UsuarioDaoMysql($pdo);

$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

//verificando se veio tudo certo
if($id && $email && $name) {
    $u = new Usuario();
    $u->setNome($name);
    $u->setId($id);

    if($usuarioDao->findByEmail($email) !== false) {
        $u->setEmail($email);
    } else {
        $u->setEmail($email);
    }

    $usuarioDao->update($u);

    header('Location:index.php');
    exit;
} else {
    header('Location:index.php');
    exit;
}

?>