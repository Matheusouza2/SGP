<?php

class Curso{
private $nome;
private $modalidade;
function __construct() {
        
}
public function getNome() {
    return $this->nome;
}
public function setNome($nome): void {
    $this->nome = $nome;
}
public function getModalidade() {
    return $this->modalidade;
}
public function setModalidade($modalidade): void {
    $this->modalidade = $modalidade;
}
}
