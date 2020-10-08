<?php
include_once 'Conexao.php';

class UsuarioDao {

    private $con;

    function login($email, $senha) {
        $con = Conexao::getInstance();

        $sql = 'SELECT * FROM usuario WHERE email = "' . $email . '" AND senha = "' . $senha . '"';

        $stmt = $con->prepare($sql);

        $stmt->execute();
		
        if ($stmt->rowCount() == 1) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
        mysql_close($con);
    }

    function cadastrar($nome, $endereco, $bairro, $numero, $cidade, $estado, $cep, $telefone, $email, $cpf, $rg, $senha) {

        try {
            $con = Conexao::getInstance();
            $sql = "SELECT * FROM usuario WHERE cpf='$cpf' OR email='$email'";
            $stmt = $con->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return false;
            } else {

                $sql = "INSERT INTO usuario (nome,logradouro,bairro,numero,cidade,uf,cep,contato,email,cpf,rg,senha) values ('$nome','$endereco','$bairro','$numero','$cidade','$estado','$cep','$telefone','$email','$cpf','$rg','$senha')";

                $stmt = $con->prepare($sql);
                $stmt->execute();

                return true;
            }
            mysql_close($con);
        } catch (PDOException $e) {
            echo "Ocorreu um erro! ---  " . $e;
        }
    }

    function atualizar($id, $nome, $endereco, $bairro, $numero, $cidade, $estado, $cep, $telefone, $email, $rg) {

        try {
            $con = Conexao::getInstance();

            $sql = "UPDATE usuario set nome=?, logradouro=?, bairro=?, numero=?, cidade=?, uf=?, cep=?, contato=?, email=?, rg=? where id=?";

            $stmt = $con->prepare($sql);
            $stmt->execute([$nome, $endereco, $bairro, $numero, $cidade, $estado, $cep, $telefone, $email, $rg, $id]);
            return true;
        } catch (PDOException $e) {
            echo "Ocorreu um erro! ---  " . $e;
            return false;
        }
    }

    public function deletar($id) {

        $con = Conexao::getInstance();
        $sql = "DELETE FROM usuario WHERE id=$id";
        $stmt = $con->prepare($sql);
        $stmt->execute();
    }

    public function buscar($id) {

        $con = Conexao::getInstance();

        $sql = "SELECT * FROM usuario WHERE id='$id'";

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