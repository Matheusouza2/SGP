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
        
    }

    function cadastrar($nome, $endereco, $bairro, $numero, $cidade, $estado, $cep, $telefone, $email, $cpf, $rg, $idInstituicao, $matricula, $cursoLeciona, $senha) {

    
    // verifica se esta cadastrado
        try {
           $con = Conexao::getInstance();
        $sql= "SELECT email FROM usuario WHERE email='$email'";
        $stmt = $con->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "ja cadastrado";

        }else{             

        $sql = "INSERT INTO usuario (nome,endereco,bairro,numero,cidade,estado,cep,telefone,email,cpf,rg,idinstituicao,matricula,cursoLeciona,senha) values ('$nome','$endereco','$bairro','$numero','$cidade','$estado','$cep','$telefone','$email','$cpf','$rg','$idInstituicao','$matricula','$cursoLeciona','$senha')";

        $stmt = $con->prepare($sql);
        $stmt->execute();
        }

        } catch (PDOException $e) {
          echo "Ocorreu um erro! ---  <br>".$e;  
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




    public function mostrar(){

    $con = Conexao::getInstance();

        $sql = 'SELECT * FROM usuario';

        $stmt = $con->prepare($sql);

        $stmt->execute();

        if ($stmt->rowCount() == 1): 
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        else:
        return [];
        endif;
    }
}