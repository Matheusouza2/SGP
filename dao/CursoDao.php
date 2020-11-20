<?php

include_once 'Conexao.php';

class CursoDao {

    private $con;

    function cursoCoordenador($idCoordenador) {
        $con = Conexao::getInstance();

        $sql = 'SELECT * FROM coordenadorCurso WHERE id_coordenador	 = "' . $idCoordenador . '"';

        $stmt = $con->prepare($sql);

        $stmt->execute();
		
        if ($stmt->rowCount() == 1) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
        mysql_close($con);
	
    }

    function cadastrarCurso($curso)
    {
        $nome=$curso->getNome();
        try {
            $con = Conexao::getInstance();
            $sql = "SELECT * FROM curso WHERE nome='$nome'";
            $stmt = $con->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return false;
            } else {

                $sql = "INSERT INTO curso (nome) values ('$nome')";

                $stmt = $con->prepare($sql);
                $stmt->execute();

                return true;
            }
            mysql_close($con);
        } catch (PDOException $e) {
            echo "Ocorreu um erro! ---  " . $e;
        }
    }
}
	
?>