<?php   

$nome = [$_POST(nome)];
$email = [$_POST(email)];
$cpf= [$_POST(cpf)];
$senha= [$_POST(senha)];
$endereco= [$_POST(endereco)];
$uf= [$_POST(uf)];
$cidade= [$_POST(cidade)];
$dataN= [$_POST(dataN)];
$prof= [$_POST(prof)];


$userDao = new UsuarioDao;

$userDao->cadastrar($nome,$email,$cpf,$senha,$endereco,$uf,$cidade,$dataN,$prof,0);



?>