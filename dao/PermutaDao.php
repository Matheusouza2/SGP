<?php

include_once 'Conexao.php';

class PermutaDao {

	private $con;
	
	function cadastrar($permuta, $turma, $disciplina, $curso) {

        try {
            $con = Conexao::getInstance();
            /**-------------Cadastra a permuta------------------ */
            $sql = 'INSERT INTO permuta(descricao, dataCriacao, dataDisponivel, professorSedente, status,idTurma) VALUES (?,?,?,?,?,?);';

            $stmt = $con->prepare($sql);
			$stmt->execute([$permuta->getDescricao(),$permuta->getDataCriacao(),$permuta->getDataDisponivel(),$permuta->getProfessorSedente(),$permuta->getStatus(),$permuta->getIdTurma()]);
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
    
    
    function listarPermutaProfessor($idProfessor){
        $con = Conexao::getInstance();
            /**-------------Cadastra a permuta------------------ */
        $sql = 'SELECT DISTINCT permuta.id as permuta_id, usuario.nome as professor_nome, usuario.email, curso.nome as curso_nome, disciplina.nome as disciplina_nome, disciplina.sigla, permuta.status, permuta.dataDisponivel, turma.nome as turma_nome  FROM permutaRelacoes pr INNER JOIN permuta ON permuta.id = pr.id_permuta INNER JOIN curso ON curso.id = pr.id_curso INNER JOIN disciplina ON disciplina.id = pr.id_disciplina INNER JOIN usuario ON usuario.id = permuta.professorSedente INNER JOIN turma ON turma.id = pr.id_turma WHERE usuario.id = '.$idProfessor;

        $stmt = $con->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function listarPermutaAberta($idProfessor){
        $con = Conexao::getInstance();
            /**-------------pemutas abertas------------------ */
        $sql = "SELECT DISTINCT permuta.id as permuta_id, usuario.nome as professor_nome, usuario.email, curso.nome as curso_nome, disciplina.nome as disciplina_nome, disciplina.sigla, permuta.status, permuta.dataDisponivel, turma.nome as turma_nome  FROM permutaRelacoes pr INNER JOIN permuta ON permuta.id = pr.id_permuta INNER JOIN curso ON curso.id = pr.id_curso INNER JOIN disciplina ON disciplina.id = pr.id_disciplina INNER JOIN usuario ON usuario.id = permuta.professorSedente INNER JOIN turma ON turma.id = pr.id_turma WHERE permuta.status = 'Disponivel' AND usuario.id=".$idProfessor;

        $stmt = $con->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function listarPermutaPega($idProfessor){
        $con = Conexao::getInstance();
            /**-------------pemutas abertas------------------ */
        $sql = "SELECT DISTINCT permuta.id as permuta_id, usuario.nome as professor_nome, usuario.email, curso.nome as curso_nome, disciplina.nome as disciplina_nome, disciplina.sigla, permuta.status, permuta.dataDisponivel, turma.nome as turma_nome  FROM permutaRelacoes pr INNER JOIN permuta ON permuta.id = pr.id_permuta INNER JOIN curso ON curso.id = pr.id_curso INNER JOIN disciplina ON disciplina.id = pr.id_disciplina INNER JOIN usuario ON usuario.id = permuta.professorSedente INNER JOIN turma ON turma.id = pr.id_turma WHERE permuta.professorPresente=".$idProfessor;

        $stmt = $con->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function listarPermutaDisponivel($idProfessor){
        $con = Conexao::getInstance();
            /**-------------Cadastra a permuta------------------ */
        $sql = "SELECT DISTINCT permuta.id as permuta_id, usuario.nome as professor_nome, usuario.email, 
        curso.nome as curso_nome, disciplina.nome as disciplina_nome, disciplina.sigla, permuta.status, permuta.dataDisponivel,
         turma.nome as turma_nome  FROM permutaRelacoes pr 
         INNER JOIN permuta ON permuta.id = pr.id_permuta
         INNER JOIN curso ON curso.id = pr.id_curso 
         INNER JOIN disciplina ON disciplina.id = pr.id_disciplina INNER JOIN usuario ON usuario.id = permuta.professorSedente 
         INNER JOIN turma ON turma.id = pr.id_turma WHERE pr.id_turma = ANY (SELECT DISTINCT  T.id
        FROM turma AS T
        INNER JOIN disciplina AS D ON T.id = D.id_turma 
        WHERE D.id_professor =".$idProfessor.") AND permuta.status = 'Disponivel' AND usuario.id!=".$idProfessor;

        $stmt = $con->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    function deletar($id){
        $con = Conexao::getInstance();
        $sql = "DELETE FROM permuta WHERE id=$id";
        $stmt = $con->prepare($sql);
        $stmt->execute();
    }


    function pegarPermuta($idPermuta,$idProfpresente){
        $con = Conexao::getInstance();
        $sql = "UPDATE permuta SET professorPresente=$idProfpresente,status='Indisponivel' WHERE id=$idPermuta";
        $stmt = $con->prepare($sql);
        $stmt->execute();
    }
    


    
}
?>