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
    function getNome() {
        return $this->nome;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getNumero() {
        return $this->numero;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getEstado() {
        return $this->estado;
    }

    function getCep() {
        return $this->cep;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getEmail() {
        return $this->email;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getRg() {
        return $this->rg;
    }

    function getIdInstituicao() {
        return $this->idInstituicao;
    }

    function getMatricula() {
        return $this->matricula;
    }

    function getCursoLeciona() {
        return $this->cursoLeciona;
    }

    function getSenha() {
        return $this->senha;
    }

    function setNome($nome): void {
        $this->nome = $nome;
    }

    function setEndereco($endereco): void {
        $this->endereco = $endereco;
    }

    function setBairro($bairro): void {
        $this->bairro = $bairro;
    }

    function setNumero($numero): void {
        $this->numero = $numero;
    }

    function setCidade($cidade): void {
        $this->cidade = $cidade;
    }

    function setEstado($estado): void {
        $this->estado = $estado;
    }

    function setCep($cep): void {
        $this->cep = $cep;
    }

    function setTelefone($telefone): void {
        $this->telefone = $telefone;
    }

    function setEmail($email): void {
        $this->email = $email;
    }

    function setCpf($cpf): void {
        $this->cpf = $cpf;
    }

    function setRg($rg): void {
        $this->rg = $rg;
    }

    function setIdInstituicao($idInstituicao): void {
        $this->idInstituicao = $idInstituicao;
    }

    function setMatricula($matricula): void {
        $this->matricula = $matricula;
    }

    function setCursoLeciona($cursoLeciona): void {
        $this->cursoLeciona = $cursoLeciona;
    }

    function setSenha($senha): void {
        $this->senha = $senha;
    }


    
    }