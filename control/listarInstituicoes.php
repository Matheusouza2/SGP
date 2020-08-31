<?php

include_once '../dao/InstituicaoDao.php';
session_start();


$lista = new InstituicaoDao();
$instituicoes = $lista->listar($_SESSION['cpf']);

$_SESSION['inst'] = $instituicoes;

header('location: /sgp/dashboardusu/src/html/instituicao.php');	

?>