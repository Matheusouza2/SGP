<?php
require_once 'rest_init.php';
include_once '../dao/UsuarioDao.php';

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    __output_header__(false, "Método de requisição não aceito.", null);
}

$parametros = array();
$parametros = file_get_contents('php://input');
$parametros = json_decode($parametros, true);

$nome = $parametros['nome'];
$endereco = $parametros['endereco'];
$bairro = $parametros['bairro'];
$numero = $parametros['numero'];
$cidade = $parametros['cidade'];
$estado = $parametros['estado'];
$cep = $parametros['cep'];
$telefone = $parametros['telefone'];
$email = $parametros['email'];
$cpf = $parametros['cpf'];
$rg = $parametros['rg'];
$senha = $parametros['senha'];

$usuarioDao = new UsuarioDao();

$verifica = $usuarioDao->cadastrar($nome, $endereco, $bairro, $numero, $cidade, $estado, $cep, $telefone, $email, $cpf, $rg, $senha);

if ($verifica) {
    __output_header__(true, 'Seja bem vindo ao SGP, você já pode entrar no sistema :)', null);
} else {
    __output_header__(false, 'Email ou CPF já cadastrados ! Faça Login na sua conta!!', null);
}

?>