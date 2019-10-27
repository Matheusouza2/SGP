<?php
include_once '..\dao\UsuarioDao.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

$usuDao = new UsuarioDao();

$usuLogado = $usuDao->login($email, $senha);

if (! empty($usuLogado)) {
    $_SESSION['id'] = $usuLogado['Id'];
    $_SESSION['nome'] = $usuLogado['Nome'];
} else {
    header('location: ../index.html');
}

?>