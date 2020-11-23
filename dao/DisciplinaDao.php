<?php

include_once 'Conexao.php';

class DisciplinaDao {

    private $con;
    
    function cadastrar($diciplina) {

        $nome=$diciplina->getNome();
        $professor=$diciplina->getProfessor();
        $curso=$diciplina->getCurso();
        $turma=$diciplina->getTurma();
        $sigla=$diciplina->getSigla();


        try {
            $con = Conexao::getInstance();
            $sql = "SELECT * FROM disciplina WHERE nome='$nome'";
            $stmt = $con->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return false;
            } else {
                $sql = "INSERT INTO disciplina (nome, id_professor, id_curso, sigla, id_turma) values ('$nome','$professor','$curso','$sigla','$turma')";

                $stmt = $con->prepare($sql);
                $stmt->execute();

              //busca id ultima disciplina
             $sql = "SELECT max(id) as id FROM disciplina;";
            $stmt = $con->prepare($sql);
			$stmt->execute();
            $idDisciplina = $stmt->fetch(PDO::FETCH_ASSOC);

//inseri informaçoes na tabela turma disciplina
            $sql = 'INSERT INTO relacaoTurmaDisciplina(id_turma,id_disciplina) VALUES ('.$turma.','.$idDisciplina['id'].')';
            $stmt = $con->prepare($sql);
			$stmt->execute();


                return true;
            }
            mysql_close($con);
        } catch (PDOException $e) {
            echo "Ocorreu um erro! ---  " . $e;
        }
    }

    function list($curso) {
        try{
            $con = Conexao::getInstance();
            $sql = "SELECT d.id, d.nome FROM disciplina d INNER JOIN curso c ON c.id = d.id_curso WHERE c.id = ".$curso;
            
            $stmt = $con->prepare($sql);
            
            $stmt->execute();
            
            if($stmt->rowCount() > 0){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }else{
                return 0;
            }
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }
}