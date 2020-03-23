<?php

include_once '../dao/UsuarioDao.php"';


$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$numero = $_POST['numero'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$idInstituicao = $_POST['idInstituicao'];
$matricula = $_POST['matricula'];
$cursoLeciona = $_POST['cursoLeciona'];

$senha = $_POST['senha'];



	

$usuarioDao = new UsuarioDao();
$usuarioDao->cadastrar($nome,$endereco, $bairro, $numero, $cidade, $estado, $cep, $telefone, $email, $cpf, $rg, $idInstituicao, $matricula, $cursoLeciona, $senha);




//header('location: ../view/telaLogin.php');