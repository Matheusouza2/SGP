<?php

include_once 'Conexao.php';

class UsuarioDao {

    private $con;

    function login($email, $senha) {
        $con = Conexao::getInstance();

        $sql = 'SELECT email, nome, cpf FROM usuario WHERE email = "' . $email . '" AND senha = "' . $senha . '"';

        $stmt = $con->prepare($sql);

        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
        mysql_close($con);
    }

    function cadastrar($nome, $endereco, $bairro, $numero, $cidade, $estado, $cep, $telefone, $email, $cpf, $rg, $idInstituicao, $matricula, $cursoLeciona, $senha) {


        // verifica se esta cadastrado
        try {
            $con = Conexao::getInstance();
            $sql = "SELECT email FROM usuario WHERE email='$email'";
            $stmt = $con->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return false;
            } else {

                $sql = "INSERT INTO usuario (nome,endereco,bairro,numero,cidade,estado,cep,telefone,email,cpf,rg,idinstituicao,matricula,senha) values ('$nome','$endereco','$bairro','$numero','$cidade','$estado','$cep','$telefone','$email','$cpf','$rg','$idInstituicao','$matricula','$senha')";

                $stmt = $con->prepare($sql);
                $stmt->execute();

                return true;
            }
            mysql_close($con);
        } catch (PDOException $e) {
            echo "Ocorreu um erro! ---  " . $e;
        }
    }

    public function atualiazarD($nome, $telefone, $email, $rg, $senha) {

        try {
            $con = Conexao::getInstance();

            $sql = "UPDATE usuario set nome='$nome',telefone='$telefone',email='$email', rg='$rg', senha='$senha' where email='$email'";

            $stmt = $con->prepare($sql);
            $stmt->execute();


            
        } catch (PDOException $e) {
            echo "Ocorreu um erro! ---  " . $e;
        }
    }

    public function atualiazarE($endereco, $bairro, $numero, $estado, $cep) {

        try {
            session_start();
            $email = $_SESSION['email'];

            $con = Conexao::getInstance();

            $sql = "UPDATE usuario set endereco='$endereco',bairro='$bairro',numero='$numero' ,estado= '$estado', cep='$cep' where email='$email'";

            $stmt = $con->prepare($sql);
            $stmt->execute();
            
        } catch (PDOException $e) {
            echo "Ocorreu um erro! ---  " . $e;
        }
    }

    public function deletar($email) {

        $con = Conexao::getInstance();
        $sql = "DELETE FROM usuario WHERE email=$email";
        $stmt = $con->prepare($sql);
        $stmt->execute();
    }

    public function buscar($email) {

        $con = Conexao::getInstance();


        $sql = "SELECT * FROM usuario WHERE email='$email'";

        $stmt = $con->prepare($sql);

        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }

        mysql_close($con);
    }

}
