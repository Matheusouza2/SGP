<?php

include_once '../dao/InstituicaoDao.php';
session_start();


$lista = new InstituicaoDao();
$instituicoes = $lista->listar($_SESSION['usuarioLogado']['cpf']);


$_SESSION['inst'] = $instituicoes;

header('location: ../dashboardusu/src/html/instituicao.php');


function Mask($mask,$str){

    $str = str_replace(" ","",$str);

    for($i=0;$i<strlen($str);$i++){
        $mask[strpos($mask,"#")] = $str[$i];
    }

    return $mask;

}

?>