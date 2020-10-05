<?php 


class Permuta{

	private $id;
	private $dataCriacao;
	private $dataDisponivel;
	private $descricao;
	private $professorSedente;
	private $professorPresente;
	private $status;

	function __construct() {
        
	}
	
	// function __construct($dataCriacao, $dataDisponivel, $descricao, $professorSedente, $professorPresente, $status) {
	// 	$this->dataCriacao = $dataCriacao;
	// 	$this->dataDisponivel = $dataDisponivel;
	// 	$this->descricao = $descricao;
	// 	$this->professorSedente = $professorSedente;
	// 	$this->professorPresente = $professorPresente;
	// 	$this->status = $status;
	// }
	
	public function getId(){
		return $this->id;
	}

	public function getDataCriacao(){
		return $this->dataCriacao;
	}

	public function setDataCriacao($dataCriacao){
		$this->dataCriacao = $dataCriacao;
	}

	public function getDataDisponivel(){
		return $this->dataDisponivel;
	}

	public function setDataDisponivel($dataDisponivel){
		$this->dataDisponivel = $dataDisponivel;
	}

	public function getDescricao(){
		return $this->descricao;
	}

	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}

	public function getProfessorSedente(){
		return $this->professorSedente;
	}

	public function setProfessorSedente($professorSedente){
		$this->professorSedente = $professorSedente;
	}

	public function getProfessorPresente(){
		return $this->professorPresente;
	}

	public function setProfessorPresente($professorPresente){
		$this->professorPresente = $professorPresente;
	}
	
	public function getStatus(){
		return $this->status;
	}

	public function setStatus($status){
		$this->status = $status;
	}
}
?>