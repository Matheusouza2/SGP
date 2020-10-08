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
}
	
?>