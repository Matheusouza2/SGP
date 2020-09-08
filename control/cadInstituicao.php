<?php

include_once '../dao/InstituicaoDao.php';
session_start();

$cnpj = str_replace(".", "", $_POST['cnpj']);
$cnpj = str_replace("/", "", $cnpj);
$cnpj = str_replace("-", "", $cnpj);

$nome = addslashes($_POST['nome']);
$fantasia = addslashes($_POST['fantasia']);
$cep = str_replace(".", "", $_POST['cep']);
$cep = str_replace("-", "", $cep);
$logradouro = addslashes($_POST['logradouro']);
$bairro = addslashes($_POST['bairro']);
$cidade = addslashes($_POST['cidade']);
$estado = addslashes($_POST['uf']);
$contato = addslashes($_POST['contato']);
$contato = str_replace("(", "", $contato);
$contato = str_replace(")", "", $contato);
$contato = str_replace("-", "", $contato);
$contato = str_replace(" ", "", $contato);
$usuCad = $_POST['usuCad'];

echo "<script>console.log('cadInstituicao: " . $cnpj . "' );</script>";

$instituicaoDao = new InstituicaoDao();

$verifica = $instituicaoDao->cadastrar($cnpj, $nome, $fantasia, $cep, $logradouro, $bairro, $cidade, $estado, $contato, $usuCad);

echo $verifica;
if ($verifica){
	
	$_SESSION['msg']['usuCadSuccess'] = "<script>Swal.fire('Tudo certo !!!!', 'Sua instituição já consta na nossa base de dados ;)', 'success')</script>";

    header('location: /sgp/control/listarInstituicoes.php');	

}else  {

    $_SESSION['msg']['usuCadSuccess'] = "<script> Swal.fire({icon: 'error', title: 'ERRO...', text: 'CNPJ já cadastrado !'}); </script>";
	
	header('location: /sgp/control/listarInstituicoes.php');	
   
}



?>