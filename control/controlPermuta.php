<?php
//Controle de permuta com put/update/delete | todos os comandos são compartilhados pela variavel COMMAND

session_start();
include_once '../dao/PermutaDao.php';
include_once '../entidades/Permuta.php';


if(isset($_POST['command'])){
  
	if($_POST['command'] == 'put'){
		$dataDisponivel = date("d/m/Y H:i", strtotime($_POST['dataDisponivel']));
		$permuta = new Permuta();
		$permuta->setDescricao(addslashes($_POST['descricao']));
		$permuta->setProfessorSedente(addslashes($_POST['professorSedente']));
		$permuta->setDataCriacao(addslashes($_POST['dataCriacao']));
		$permuta->setDataDisponivel(addslashes($dataDisponivel));
		$permuta->setStatus("Disponivel");
		
		$turma = $_POST['turma'];
		$disciplina = $_POST['disciplina'];
		$curso = $_POST['curso'];
		
		$permutaDao = new PermutaDao();

		$permutaDao->cadastrar($permuta, $turma, $disciplina, $curso);

		$_SESSION['msg']['permutaCadSuccess'] = "<script>Swal.fire('Tudo certo !!!!', 'Sua permuta está cadastrada, logo alguém mostrará interesse em te substituir nessa aula', 'success')</script>";
		
		header('location: ../dashboardusu/src/html/index.php');
										
	}
}else if(isset($_GET['command'])){
	if($_GET['command'] == 'listPp'){
				
		$permutaDao = new PermutaDao();

		$retorno = $permutaDao->listarPermutaProfessor($_SESSION['usuarioLogado']['id']);

		echo json_encode($retorno);
	}else if($_GET['command'] == 'delete'){
	    echo('<script>console.log('.$_GET['id'].')</script>');
	    $permutaDao = new PermutaDao();
	    $permutaDao->deletar($_GET['id']);
	    
	    json_encode(true);
	}
}
?>