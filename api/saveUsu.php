<?php
require_once 'rest_init.php';
include_once '../dao/UsuarioDao.php';

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    __output_header__(false, "Método de requisição não aceito.", null);
}

$nome = addslashes($_POST['nome']);
$endereco = addslashes($_POST['endereco']);
$bairro = addslashes($_POST['bairro']);
$numero = addslashes($_POST['numero']);
$cidade = addslashes($_POST['cidade']);
$estado = addslashes($_POST['estado']);
$cep = addslashes($_POST['cep']);
$telefone = addslashes($_POST['telefone']);
$email = addslashes($_POST['email']);
$cpf = addslashes($_POST['cpf']);
$rg = addslashes($_POST['rg']);
$senha = addslashes($_POST['senha']);

$usuarioDao = new UsuarioDao();

$verifica = $usuarioDao->cadastrar($nome, $endereco, $bairro, $numero, $cidade, $estado, $cep, $telefone, $email, $cpf, $rg, $senha);

if ($verifica) {
    __output_header__(true, 'Seja bem vindo ao SGP, você já pode entrar no sistema :)', null);
} else {
    __output_header__(false, 'Email ou CPF já cadastrados ! Faça Login na sua conta!!', null);
}

?>