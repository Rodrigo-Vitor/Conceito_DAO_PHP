<?php 
require('./config.php');
require_once( "./dao/UsuarioDaoMysql.php");

$usuarioDao = new UsuarioDaoMysql($pdo);

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

//add usuario
if($name && $email) {
    if($usuarioDao->findByEmail($email) === false) {
        $novoUsuario = new Usuario();
        $novoUsuario->setNome($name);
        $novoUsuario->setEmail($email);
        $usuarioDao->add( $novoUsuario );

        header('Location: index.php');
        exit;
    } else {
        header('Location: add.php');
        exit;
    }
} else {
    header('Location: add.php');
    exit;
}

?>