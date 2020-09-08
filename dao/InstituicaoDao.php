<?php

include_once 'Conexao.php';

class InstituicaoDao {

    private $con;
    
    function cadastrar($cnpj, $nome, $fantasia, $cep, $logradouro, $bairro, $cidade, $estado, $contato, $usuCad) {
        try {
            $con = Conexao::getInstance();
            $sql = "SELECT cnpj FROM instituicao WHERE cnpj='$cnpj'";
            $stmt = $con->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return false;
            } else {
                $sql = "INSERT INTO instituicao (cnpj, razao_social, nome_fantasia, cep, endereco, bairro, cidade, estado, contato, usuCad) values ('$cnpj','$nome','$fantasia','$cep','$logradouro','$bairro','$cidade','$estado','$contato','$usuCad')";

                $stmt = $con->prepare($sql);
                $stmt->execute();

                return true;
            }
            mysql_close($con);
        } catch (PDOException $e) {
            echo "Ocorreu um erro! ---  " . $e;
        }
    }

    function listar($cpf){
        $con = Conexao::getInstance();
        $sql = "SELECT * FROM instituicao WHERE usuCad = ".$cpf;
        $stmt = $con->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
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
