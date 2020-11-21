<?php

class Curso{
private $nome;
function __construct() {
        
}
public function getNome() {
    return $this->nome;
}
public function setNome($nome): void {
    $this->nome = $nome;
}
}
