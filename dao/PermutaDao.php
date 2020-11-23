<?php

include_once 'Conexao.php';

class PermutaDao {

	private $con;
	
	function cadastrar($permuta, $turma, $disciplina, $curso) {

        try {
            $con = Conexao::getInstance();
            /**-------------Cadastra a permuta------------------ */
            $sql = 'INSERT INTO permuta(descricao, dataCriacao, dataDisponivel, professorSedente, status,idTurma,qtd) VALUES (?,?,?,?,?,?,?);';

            $stmt = $con->prepare($sql);
			$stmt->execute([$permuta->getDescricao(),$permuta->getDataCriacao(),$permuta->getDataDisponivel(),$permuta->getProfessorSedente(),$permuta->getStatus(),$permuta->getIdTurma(),$permuta->getQtd()]);
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
        $sql = 'SELECT DISTINCT permuta.id as permuta_id, usuario.nome as professor_nome, usuario.email, curso.nome as curso_nome, disciplina.nome as disciplina_nome, disciplina.sigla, permuta.status, permuta.dataDisponivel, turma.nome as turma_nome, permuta.qtd as qtd  FROM permutaRelacoes pr INNER JOIN permuta ON permuta.id = pr.id_permuta INNER JOIN curso ON curso.id = pr.id_curso INNER JOIN disciplina ON disciplina.id = pr.id_disciplina INNER JOIN usuario ON usuario.id = permuta.professorSedente INNER JOIN turma ON turma.id = pr.id_turma WHERE usuario.id = '.$idProfessor;

        $stmt = $con->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function listarPermutaAberta($idProfessor){
        $con = Conexao::getInstance();
            /**-------------pemutas abertas------------------ */
        $sql = "SELECT DISTINCT permuta.id as permuta_id, usuario.nome as professor_nome, usuario.email, curso.nome as curso_nome, disciplina.nome as disciplina_nome, disciplina.sigla, permuta.status, permuta.dataDisponivel, turma.nome as turma_nome, permuta.qtd as qtd  FROM permutaRelacoes pr INNER JOIN permuta ON permuta.id = pr.id_permuta INNER JOIN curso ON curso.id = pr.id_curso INNER JOIN disciplina ON disciplina.id = pr.id_disciplina INNER JOIN usuario ON usuario.id = permuta.professorSedente INNER JOIN turma ON turma.id = pr.id_turma WHERE permuta.status = 'Disponivel' AND usuario.id=".$idProfessor;

        $stmt = $con->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function listarPermutaPega($idProfessor){
        $con = Conexao::getInstance();
            /**-------------pemutas abertas------------------ */
        $sql = "SELECT DISTINCT permuta.id as permuta_id, usuario.nome as professor_nome, usuario.email, curso.nome as curso_nome, disciplina.nome as disciplina_nome, disciplina.sigla, permuta.status, permuta.dataDisponivel, turma.nome as turma_nome, permuta.qtd as qtd  FROM permutaRelacoes pr INNER JOIN permuta ON permuta.id = pr.id_permuta INNER JOIN curso ON curso.id = pr.id_curso INNER JOIN disciplina ON disciplina.id = pr.id_disciplina INNER JOIN usuario ON usuario.id = permuta.professorSedente INNER JOIN turma ON turma.id = pr.id_turma WHERE permuta.professorPresente=".$idProfessor;

        $stmt = $con->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function listarPermutaDisponivel($idProfessor){
        $con = Conexao::getInstance();
            /**-------------Cadastra a permuta------------------ */
        $sql = "SELECT DISTINCT permuta.id as permuta_id, usuario.nome as professor_nome, usuario.email, 
        curso.nome as curso_nome, disciplina.nome as disciplina_nome, disciplina.sigla, permuta.status, permuta.dataDisponivel,
         turma.nome as turma_nome, permuta.qtd as qtd  FROM permutaRelacoes pr 
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
    
    function listarPermutaExpirada($idProfessor){
        $con = Conexao::getInstance();
        
        $sql = "SELECT DISTINCT permuta.id as permuta_id, usuario.nome as professor_nome, usuario.email, curso.nome as curso_nome, disciplina.nome as disciplina_nome, disciplina.sigla, permuta.status, permuta.dataDisponivel, turma.nome as turma_nome, permuta.qtd as qtd  FROM permutaRelacoes pr INNER JOIN permuta ON permuta.id = pr.id_permuta INNER JOIN curso ON curso.id = pr.id_curso INNER JOIN disciplina ON disciplina.id = pr.id_disciplina INNER JOIN usuario ON usuario.id = permuta.professorSedente INNER JOIN turma ON turma.id = pr.id_turma WHERE permuta.status = 'Expirada' AND usuario.id=".$idProfessor;
        
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
    
    function consultarQuant($id){
        $con = Conexao::getInstance();
        $sql = "SELECT (SELECT count(id) FROM permuta WHERE professorPresente = ".$id.") as presente,
                (SELECT count(id) FROM permuta WHERE professorSedente = ".$id." AND status='disponivel') as abertas,
                (SELECT count(id) FROM permuta WHERE professorSedente = ".$id." AND status='Expirada') as expiradas,
                (SELECT count(id) FROM permuta WHERE professorSedente = ".$id." OR professorPresente = ".$id.") as allPermutas
                 FROM permuta WHERE professorPresente = ".$id." GROUP BY professorPresente;";
        
        $stmt = $con->prepare($sql);
        
        $stmt->execute();
        
        return  $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    function updateExpiradas($id){
        $con = Conexao::getInstance();
        $sql = "UPDATE permuta SET status='Expirada' WHERE id = ".$id;
        
        $stmt = $con->prepare($sql);
        
        $stmt->execute();
    }

    function relatorioCoordenador($id){

        $con = Conexao::getInstance();
            /**-------------Cadastra a permuta------------------ */
        $sql = "SELECT us.foto AS foto, us.nome AS nome,us.email AS email,p.status As statu, p.qtd as qtd ,(SELECT nome FROM usuario WHERE id=p.professorPresente ) AS presente,(SELECT foto FROM usuario WHERE id=p.professorPresente ) AS foto_presente,(SELECT email FROM usuario WHERE id=p.professorPresente ) AS email_presente,p.professorSedente AS sedente
        FROM permuta p JOIN usuario us ON p.professorSedente = us.id WHERE p.professorSedente = ANY (SELECT DISTINCT  U.id AS professor  
        FROM usuario AS U JOIN disciplina AS D ON D.id_professor = U.id
        WHERE D.id_curso = (SELECT id_curso FROM coordenadorCurso WHERE id_coordenador=".$id."))ORDER BY p.professorSedente";

        $stmt = $con->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}
?>