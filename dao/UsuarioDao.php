<?php

include_once 'Conexao.php';

class UsuarioDao{
    
    private $con;
    
    function login($email, $senha) {
        $con = Conexao::getInstance();
        
        $sql = 'SELECT Id, Nome, Flag FROM usuario WHERE email = "'.$email.'" AND senha = "'.$senha.'"';
        $stmt = $con->prepare($sql);
       
        $stmt->execute();
        
        if($stmt->rowCount() == 1){
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return null;
    }

    function cadastrar($nome, $email,$cpf, $senha, $endereco,$uf,$cidade,$dataN,$prof,$flag){

        $con = Conexao::getInstance();

        $sql = "INSERT INTO usuario (Nome,Email,CPF,Senha,Endereco,Estado,Cidade,DataDeNascimento,Profissao,Flag) values ('.$nome.','.$email.','.$cpf.','.$senha.','.$endereco.','.$uf.','.$cidade.','.$dataN.','.$prof.','.$flag.');'";

        $stmt = $con->prepare($sql);
       
        $stmt->execute();

    }
}
?>