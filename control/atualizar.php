<?php

include_once '../dao/UsuarioDao.php"';
session_start();

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
$idInstituicao = addslashes($_POST['idInstituicao']);
$matricula = addslashes($_POST['matricula']);
$cursoLeciona = addslashes($_POST['cursoLeciona']);
$senha = addslashes($_POST['senha']);

$usuarioDao = new UsuarioDao();

$verifica=$usuarioDao->atualiazar($nome,$endereco, $bairro, $numero, $cidade, $estado, $cep, $telefone, $email, $cpf, $rg, $idInstituicao, $matricula, $cursoLeciona, $senha);



?>
