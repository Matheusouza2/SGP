<?php

include_once 'Conexao.php';

class PermutaDao {

	private $con;
	
	function cadastrar($permuta, $turma, $disciplina, $curso) {

        try {
            $con = Conexao::getInstance();
            /**-------------Cadastra a permuta------------------ */
            $sql = 'INSERT INTO permuta(descricao, dataCriacao, dataDisponivel, professorSedente, status) VALUES (?,?,?,?,?);';

            $stmt = $con->prepare($sql);
			$stmt->execute([$permuta->getDescricao(),$permuta->getDataCriacao(),$permuta->getDataDisponivel(),$permuta->getProfessorSedente(),$permuta->getStatus()]);
			/**---------------Pega o ID da permuta que acabou de ser cadastrada---------------- */			
			$sql = "SELECT max(id) as id FROM permuta;";
            $stmt = $con->prepare($sql);
			$stmt->execute();
            $idPermuta = $stmt->fetch(PDO::FETCH_ASSOC);
            
			/**------------Grava as informações na tabela PermutaRelacoes------------------- */
			$sql = 'INSERT INTO permutaRelacoes(id_permuta, id_turma, id_curso, id_disciplina) VALUES ('.$idPermuta['id'].','.$turma.','.$curso.','.$disciplina.')';
            $stmt = $con->prepare($sql);
			$stmt->execute();
			
        } catch (PDOException $e) {
            echo "Ocorreu um erro! ---  " . $e;
        }
    }


}
?>