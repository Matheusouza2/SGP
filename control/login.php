<?php
include_once '../dao/UsuarioDao.php';
include_once '../dao/InstituicaoDao.php';
include_once '../dao/CursoDao.php';

session_start();

$email = addslashes($_POST['email']);
$senha = addslashes($_POST['senha']);

$usuDao = new UsuarioDao();

//Pega informações do usuario no banco 
$usuLogado = $usuDao->login($email, $senha);

if (! empty($usuLogado)) {
    //se login e senha estavam corretos seta informações do usuario na sessão
	$_SESSION['usuarioLogado'] = $usuLogado;
    
    //Verifica se o usuario é admin de alguma instituição e seta essa informação.
    $lista = new InstituicaoDao();
    $instituicoes = $lista->listar($usuLogado['cpf']);
    if($instituicoes != null){
        $_SESSION['usuarioLogado']['admin'] = true;
    }

    //Verifica se o usuario é coordenador de algum curso e seta essa informação
    $curso = new CursoDao();
    $flag = $curso->cursoCoordenador($usuLogado['id']);
    if($flag != null){
        $_SESSION['usuarioLogado']['coord'] = true;
    }
    
    //Redireciona o usuario para o index.
    header('location: ../dashboardusu/src/html/index.php');

} else {
    //Caso o usuario tenha errado login ou senha, seta a mensagem de erro e redireciona ele para a tela de login. 
    $_SESSION['msg']['erroLogin'] = "<script> Swal.fire({icon: 'error', title: 'Oops...', text: 'Email ou senha não cadastrados !'}); </script>";
    header('location: ../view/telaLogin.php');
}
