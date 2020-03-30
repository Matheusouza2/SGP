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
                    
        }else{
           return null; 
        }
        mysql_close($con);
    }

    function cadastrar($nome, $endereco, $bairro, $numero, $cidade, $estado, $cep, $telefone, $email, $cpf, $rg, $idInstituicao, $matricula, $cursoLeciona, $senha) {

    
    // verifica se esta cadastrado
        try {
            $con = Conexao::getInstance();
            $sql= "SELECT email FROM usuario WHERE email='$email'";
            $stmt = $con->prepare($sql);
            $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return false;

        }else{             

        $sql = "INSERT INTO usuario (nome,endereco,bairro,numero,cidade,estado,cep,telefone,email,cpf,rg,idinstituicao,matricula,cursoLeciona,senha) values ('$nome','$endereco','$bairro','$numero','$cidade','$estado','$cep','$telefone','$email','$cpf','$rg','$idInstituicao','$matricula','$cursoLeciona','$senha')";

        $stmt = $con->prepare($sql);
        $stmt->execute();

            return true;
        }
        mysql_close($con);

        } catch (PDOException $e) {
          echo "Ocorreu um erro! ---  ".$e;  
        }
        
    }

    public function atualiaza(Usuario $u){
    
    }

    public function deletar(Usuario $email){

      $con = Conexao::getInstance();
      $sql= "DELETE FROM usuario WHERE email=?" ;
      $stmt = $con->prepare($sql);
      $stmt->execute();
    }




    public function buscar($email){

    $con = Conexao::getInstance();
// colocar retono e parametros para usar funçao em outras paginasus

    // testar funçao no login php e passa dados pela sessao!
        $sql = 'SELECT * FROM usuario WHERE email=$email';

        $stmt = $con->prepare($sql);

        $stmt->execute();

        if ($stmt->rowCount() == 1): 
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        else:
        return [];
        endif;
    }
}