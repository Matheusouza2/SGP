<?php
//Controle de permuta com put/update/delete | todos os comandos são compartilhados pela variavel COMMAND
date_default_timezone_set('America/Recife');
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
		$permuta->setIdTurma($turma);
		
		
		$disciplina = $_POST['disciplina'];
		$curso = $_POST['curso'];
		
		$permutaDao = new PermutaDao();

		$permutaDao->cadastrar($permuta, $turma, $disciplina, $curso);

		$_SESSION['msg']['permutaCadSuccess'] = "<script>Swal.fire('Tudo certo !!!!', 'Sua permuta está cadastrada, logo alguém mostrará interesse em te substituir nessa aula', 'success')</script>";
		
		header('location: ../dashboardusu/src/html/index.php');
										
	}else if($_POST['command'] == 'cons'){
	    //Consulta numero de permutas para o contador
	    $permutaDao = new PermutaDao();
	    echo json_encode($permutaDao->consultarQuant($_SESSION['usuarioLogado']['id']));
	    
	    
	}
}else if(isset($_GET['command'])){
	if($_GET['command'] == 'listPp'){
				
		$permutaDao = new PermutaDao();

		$retorno = $permutaDao->listarPermutaProfessor($_SESSION['usuarioLogado']['id']);

		
		
		for($i = 0; $i < count($retorno); $i++){
		    
		    $date = DateTime::createFromFormat('d/m/Y H:i', $retorno[$i]['dataDisponivel']);
		    
		    if(strtotime($date->format('Y-m-d H:i:s')) < strtotime(date('Y-m-d H:i:s')) && $retorno[$i]['status'] == "Disponivel"){
		        $permutaDao->updateExpiradas($retorno[$i]['permuta_id']);
		        $retorno[$i]['status'] = 'Expirada';
		    }
		}
		    		    
		echo json_encode($retorno);
	}else if($_GET['command'] == 'listPd'){
				
		$permutaDao = new PermutaDao();

		$retorno = $permutaDao->listarPermutaDisponivel($_SESSION['usuarioLogado']['id']);

		echo json_encode($retorno);
	}
	
	else if($_GET['command'] == 'delete'){
	    $permutaDao = new PermutaDao();
	    $permutaDao->deletar($_GET['id']);
	    
	}else if($_GET['command'] == 'pegar'){
		$permutaDao = new PermutaDao();
		$permutaDao->pegarPermuta($_GET['id'],$_SESSION['usuarioLogado']['id']);
		
	}else if($_GET['command'] == 'listPA'){
	    $permutaDao = new PermutaDao();

		$retorno = $permutaDao->listarPermutaAberta($_SESSION['usuarioLogado']['id']);

		echo json_encode($retorno);

	}else if($_GET['command'] == 'listPG'){
	    $permutaDao = new PermutaDao();

		$retorno = $permutaDao->listarPermutaPega($_SESSION['usuarioLogado']['id']);

		echo json_encode($retorno);
	}else if($_GET['command'] == 'listEx'){
	    $permutaDao = new PermutaDao();
	    
	    $retorno = $permutaDao->listarPermutaExpirada($_SESSION['usuarioLogado']['id']);
	    
	    echo json_encode($retorno);
	}

}
?>