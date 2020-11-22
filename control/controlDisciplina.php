<?php
session_start();
include_once '../dao/DisciplinaDao.php';
include_once '../entidades/Disciplina.php';


if($_POST['list']){
    
    $disciplinaDao = new DisciplinaDao();
    
    $retorno = $disciplinaDao->list($_POST['curso']);
  
    echo json_encode($retorno);
    
    return null;
}


$disciplina = new Disciplina();

$disciplina->setNome(addslashes($_POST['nome']));
$disciplina->setProfessor(addslashes($_POST['professor']));
$disciplina->setCurso(addslashes($_POST['curso']));
$disciplina->setTurma(addslashes($_POST['turma']));
$disciplina->setSigla(addslashes($_POST['sigla']));

$disciplinaDao = new DisciplinaDao();

$verifica = $disciplinaDao->cadastrar($disciplina);
if ($verifica) {

    $_SESSION['msg']['usuCadSuccess'] = "<script>Swal.fire('Tudo certo !!!!', 'Disciplina Cadastrado:)', 'success')</script>";

    header('location: ../dashboardusu/src/html/cursosedisciplinas.php');
} else {

    $_SESSION['msg']['usuCadSuccess'] = "<script> Swal.fire({icon: 'error', title: 'ERRO...', text: 'Disciplina Ja cadastrado!'}); </script>";
    header('location: ../dashboardusu/src/html/cursosedisciplinas.php');
}	
										
