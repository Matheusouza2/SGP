<?php

include_once '../dao/UsuarioDao.php"';
session_start();

$nome = ($_POST['nome']);
$telefone = ($_POST['telefone']);
$email = ($_POST['email']);
$rg = ($_POST['rg']);
$senha = ($_POST['senha']);


$usuarioDao = new UsuarioDao();

$usuarioDao->atualiazarD($nome, $telefone, $email, $rg, $senha);

header('Location: ../dashboardusu/perfilUser.php');

?>
