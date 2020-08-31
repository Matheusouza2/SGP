<?php

class Usuario{
private $nome;
private $endereco;
private $bairro;
private $numero;
private $cidade;
private $estado;
private $cep;
private $telefone;
private $email;
private $cpf;
private $rg;
private $idInstituicao;
private $matricula;
private $cursoLeciona;

private $senha;
    
     function __construct() {
        
    }
    public function getNome() {
        return $this->nome;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getCep() {
        return $this->cep;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getRg() {
        return $this->rg;
    }

    public function getIdInstituicao() {
        return $this->idInstituicao;
    }

    public function getMatricula() {
        return $this->matricula;
    }

    public function getCursoLeciona() {
        return $this->cursoLeciona;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setEndereco($endereco): void {
        $this->endereco = $endereco;
    }

    public function setBairro($bairro): void {
        $this->bairro = $bairro;
    }

    public function setNumero($numero): void {
        $this->numero = $numero;
    }

    public function setCidade($cidade): void {
        $this->cidade = $cidade;
    }

    public function setEstado($estado): void {
        $this->estado = $estado;
    }

    public function setCep($cep): void {
        $this->cep = $cep;
    }

    public function setTelefone($telefone): void {
        $this->telefone = $telefone;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setCpf($cpf): void {
        $this->cpf = $cpf;
    }

    public function setRg($rg): void {
        $this->rg = $rg;
    }

    public function setIdInstituicao($idInstituicao): void {
        $this->idInstituicao = $idInstituicao;
    }

    public function setMatricula($matricula): void {
        $this->matricula = $matricula;
    }

    public function setCursoLeciona($cursoLeciona): void {
        $this->cursoLeciona = $cursoLeciona;
    }

    public function setSenha($senha): void {
        $this->senha = $senha;
    }


    
    }