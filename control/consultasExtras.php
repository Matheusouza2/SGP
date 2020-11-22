<?php
/** Classe responsavel por qualquer consulta que não inclua um objeto diretamente definido.
 * Favor comentar oque cada codigo adicionado faz para não confundir os colegas. 
 */
session_start();

include_once '../dao/ConsultasSelect.php';

$opcao = isset($_GET['opc']) ? $_GET['opc'] : ''; 

if (! empty($opcao)){
	switch ($opcao){
		case 'cursoSelect':
			getCurso();
		break;
		case 'turmaSelect':
		   	getTurma();
			break;
		case 'disciplinaSelect':
			getDisciplina();
			break;
// opçoes de cadastro de diciplinas lista os slects de cadastro de diciplinas
		case 'cadCursoSelec':
			getCadCurso();
			break;
		case 'cadTurmaSelec':
			getCadTurma();
			break;
		case 'cadProfessorSelec':
			getCadProfessor();
			break;
	}
}

// Função que retorna os cursos onde o professor leciona alguma disciplina
function getCurso(){
	$consulta = new ConsultasSelect();
	
	$retorno = $consulta->consultaCurso();
	
	echo json_encode($retorno); 
}

function getCadCurso(){
	$consulta = new ConsultasSelect();
	
	$retorno = $consulta->consultaCadCurso();
	
	echo json_encode($retorno); 
}

function getCadProfessor(){
	$consulta = new ConsultasSelect();
	
	$retorno = $consulta->consultaCadProfessor();
	
	echo json_encode($retorno);
 }

//Função que retorna a turma do professor para a tela de criação de permuta.
function getTurma(){
	$consulta = new ConsultasSelect();
	
	$retorno = $consulta->consultaTurma($_SESSION['usuarioLogado']['id'], $_GET['curso']);
	
	echo json_encode($retorno); 
}
function getCadTurma(){
	$consulta = new ConsultasSelect();
	
	$retorno = $consulta->consultaCadTurma($_GET['curso']);
	
	echo json_encode($retorno); 
}


//Função que retorna a disciplina por Turma para a tela de criação de permuta.
function getDisciplina(){
	$consulta = new ConsultasSelect();
	
	$retorno = $consulta->consultaDisciplina($_GET['turma']);
	
	echo json_encode($retorno); 
}

?>