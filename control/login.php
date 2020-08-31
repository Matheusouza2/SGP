<?php
include_once '..\dao\UsuarioDao.php';

session_start();
$email = addslashes($_POST['email']);
$senha = addslashes($_POST['senha']);

$usuDao = new UsuarioDao();

$usuLogado = $usuDao->login($email, $senha);


if (! empty($usuLogado)) {
	
   // $usuDao->buscar($emal); ver depois nao apagar
   $_SESSION['nome'] = $usuLogado['nome'];
   $_SESSION['email'] = $usuLogado['email'];
   $_SESSION['cpf'] = $usuLogado['cpf'];
   
    header('location: ../dashboardusu/src/html/index.php');

} else {
    $_SESSION['msg']['erroLogin'] = "<script> Swal.fire({icon: 'error', title: 'Oops...', text: 'Email ou senha não cadastrados !'}); </script>";
    header('location: ../view/telaLogin.php');
}
