<?php
echo "<script> console.log ('Inicio do arquivo'); </script>";
include_once '..\dao\UsuarioDao.php';
echo "<script> console.log ('Inclusão do usuarioDAO'); </script>";


session_start();
echo "<script> console.log ('Sessao Iniciada'); </script>";
$email = addslashes($_POST['email']);
$senha = addslashes($_POST['senha']);

echo "<script> console.log ('Infos capturadas-->'".$email."); </script>";

$usuDao = new UsuarioDao();

echo "<script> console.log ('Classe usuDao instanciada'); </script>";

$usuLogado = $usuDao->login($email, $senha);

echo "<script> console.log ('Tentativa de login e retorno'".$usuLogado."); </script>";
if (! empty($usuLogado)) {
	
   // $usuDao->buscar($emal); ver depois nao apagar
   $_SESSION['usuarioLogado'] = $usuLogado;
      
    header('location: ../dashboardusu/src/html/index.php');

} else {
    $_SESSION['msg']['erroLogin'] = "<script> Swal.fire({icon: 'error', title: 'Oops...', text: 'Email ou senha não cadastrados !'}); </script>";
    header('location: ../view/telaLogin.php');
}
