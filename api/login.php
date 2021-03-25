<?php
ini_set("allow_url_fopen", true);
require_once 'rest_init.php';
include_once '../dao/UsuarioDao.php';
include_once '../dao/InstituicaoDao.php';
include_once '../dao/CursoDao.php';
include_once '../dao/UsuarioDao.php';

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    __output_header__(false, "Método de requisição não aceito.", null);
}

$parametros = array();
$parametros = file_get_contents('php://input');
$parametros = json_decode($parametros, true);


$email = $parametros['email'];
$senha = $parametros['senha'];

$dados = array();

$usuDao = new UsuarioDao();

//Pega informações do usuario no banco
$usuLogado = $usuDao->login($email, $senha);

if ($usuLogado) {
   
    $dados = array('usuario' => $usuLogado);
    //Verifica se o usuario é admin de alguma instituição e seta essa informação e as informações de usuario.
    $lista = new InstituicaoDao();
    $instituicoes = $lista->listar($usuLogado['cpf']);
    if($instituicoes != null){
        $dados['admin'] = true;
    }else{
        $dados['admin'] = false;
    }
    
    //Verifica se o usuario é coordenador de algum curso e seta essa informação
    $curso = new CursoDao();
    $flag = $curso->cursoCoordenador($usuLogado['id']);
    if($flag != null){
        $dados['coord'] = true;
    }else{
        $dados['coord'] = false;
    }
    
    //Retorna as infos
    __output_header__(true, 'Logado', $dados);
    
} else {
    //Caso o usuario tenha errado login ou senha, seta a mensagem de erro e redireciona ele para a tela de login.
    __output_header__(false, 'Oops... Este email não está cadastrado ou a senha está errada', null);
}


?>