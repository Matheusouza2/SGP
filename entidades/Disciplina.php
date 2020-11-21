<?php 


class Disciplina{

	
	private $nome;
	private $professor;
	private $curso;
	private $turma;
    private $sigla;


	function __construct() {
        
	}
    public function getNome(){
		return $this->nome;
	}public function getProfessor(){
		return $this->professor;
	}public function getCurso(){
		return $this->curso;
	}public function getTurma(){
		return $this->turma;
	}public function getSigla(){
		return $this->sigla;
    }
    

    public function setNome($nome){
		$this->nome = $nome;
	}public function setProfessor($professor){
		$this->professor = $professor;
	}public function setCurso($curso){
		$this->curso = $curso;
	}public function setTurma($turma){
		$this->turma = $turma;
	}public function setSigla($sigla){
		$this->sigla = $sigla;
	}
    
}
