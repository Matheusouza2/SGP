<?php
error_log("Iniciando arquivo");
include_once '..\dao\UsuarioDao.php';
error_log("Inclusão do usuario DAO");


session_start();
error_log("Sessao Iniciada");
$email = addslashes($_POST['email']);
$senha = addslashes($_POST['senha']);

error_log("Info Capturadas --> ".$email);

$usuDao = new UsuarioDao();

error_log("Classe UsuarioDAO Instanciada");

$usuLogado = $usuDao->login($email, $senha);

error_log("Usuario ja logado".$usuLogado['nome']);
if (! empty($usuLogado)) {
	
   // $usuDao->buscar($emal); ver depois nao apagar
   $_SESSION['usuarioLogado'] = $usuLogado;
      
    header('location: ../dashboardusu/src/html/index.php');

} else {
    $_SESSION['msg']['erroLogin'] = "<script> Swal.fire({icon: 'error', title: 'Oops...', text: 'Email ou senha não cadastrados !'}); </script>";
    header('location: ../view/telaLogin.php');
}
