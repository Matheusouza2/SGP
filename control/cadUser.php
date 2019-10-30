<?php

$nome = [$_GET(nome)];
$email = [$_GET(email)];
$cpf= [$_GET(cpf)];
$senha= [$_GET(senha)];
$endereco= [$_GET(endereco)];
$uf= [$_GET(uf)];
$cidade= [$_GET(cidade)];
$dataN= [$_GET(dataN)];
$prof= [$_GET(prof)];


$userDao = new UsuarioDao;

$userDao->cadastrar($nome,$email,$cpf,$senha,$endereco,$uf,$cidade,$dataN,$prof,0);



?>