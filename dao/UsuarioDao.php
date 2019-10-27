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
}
?>