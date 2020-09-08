<?php

include_once '../dao/UsuarioDao.php"';

$endereco = ($_POST['endereco']);
$bairro = ($_POST['bairro']);
$numero = ($_POST['numero']);
$cidade = ($_POST['cidade']);
$estado = ($_POST['estado']);
$cep = ($_POST['cep']);


$usuarioDao = new UsuarioDao();

$usuarioDao->atualiazarE($endereco,$bairro, $numero, $cidade, $estado, $cep);

header('Location: ../dashboardusu/perfilUser.php');