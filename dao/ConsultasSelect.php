<?php 

include_once 'Conexao.php';

class ConsultasSelect {

    private $con;

    function consultaCurso(){
        $con = Conexao::getInstance();

        $sql = 'SELECT DISTINCT curso.id as id_curso, curso.nome as nome_curso FROM curso, disciplina WHERE curso.id = disciplina.id_curso AND disciplina.id_professor = '.$_SESSION['usuarioLogado']['id'];

        $stmt = $con->prepare($sql);

        $stmt->execute();
		
		return $stmt->fetchAll();
    }

    function consultaTurma($idProfessor, $idCurso) {
        $con = Conexao::getInstance();

        $sql = 'SELECT DISTINCT turma.id as turma_id, turma.nome as turma_nome FROM turma INNER JOIN relacaoTurmaDisciplina rtd ON rtd.id_turma = turma.id INNER JOIN disciplina ON disciplina.id = rtd.id_disciplina WHERE disciplina.id_professor = '.$idProfessor.' AND disciplina.id_curso = '.$idCurso;

        $stmt = $con->prepare($sql);

        $stmt->execute();
		
		return $stmt->fetchAll();
		
    }

     function consultaDisciplina($turma) {
        $con = Conexao::getInstance();

        $sql = 'SELECT DISTINCT disciplina.id as disciplina_id, disciplina.nome as disciplina_nome FROM disciplina INNER JOIN relacaoTurmaDisciplina rtd ON rtd.id_disciplina = disciplina.id INNER JOIN turma ON turma.id = rtd.id_turma WHERE disciplina.id_professor = '.$_SESSION['usuarioLogado']['id'].' AND rtd.id_turma = '.$turma;

        $stmt = $con->prepare($sql);

        $stmt->execute();
		
		return $stmt->fetchAll();
		
    }
}

?>