<?php
include_once '..\dao\UsuarioDao.php';

session_start();
$email = addslashes($_POST['email']);
$senha = addslashes($_POST['senha']);

$usuDao = new UsuarioDao();

$usuLogado = $usuDao->login($email, $senha);



if (! empty($usuLogado)) {
	
   $_SESSION['nome'] = $usuLogado['nome'];
   $_SESSION['email'] = $usuLogado['email'];
   
    header('location: ../dashboardusu/LobDeUser.php');

} else {
    header('location: ../index.php');
}
