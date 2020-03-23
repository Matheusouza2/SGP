<?php

include_once 'Conexao.php';

class UsuarioDao {

    private $con;

    function login($email, $senha) {
        $con = Conexao::getInstance();

        $sql = 'SELECT email, nome FROM usuario WHERE email = "' . $email . '" AND senha = "' . $senha . '"';
        $stmt = $con->prepare($sql);

        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return null;
    }

    function cadastrar($nome, $endereco, $bairro, $numero, $cidade, $estado, $cep, $telefone, $email, $cpf, $rg, $idInstituicao, $matricula, $cursoLeciona, $senha) {

    
    
        $con = Conexao::getInstance();

        $sql = "INSERT INTO usuario (nome,endereco,bairro,numero,cidade,estado,cep,telefone,email,cpf,rg,idinstituicao,matricula,cursoLeciona,senha) values ('$nome','$endereco','$bairro','$numero','$cidade','$estado','$cep','$telefone','$email','$cpf','$rg','$idInstituicao','$matricula','$cursoLeciona','$senha')";

        $stmt = $con->prepare($sql);


        $stmt->execute();
    }
}