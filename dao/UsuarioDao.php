<?php
include_once 'Conexao.php';

class UsuarioDao
{

    private $con;

    function login($email, $senha)
    {
        $con = Conexao::getInstance();

        $sql = 'SELECT * FROM usuario WHERE email = "' . $email . '" AND senha = "' . $senha . '"';

        $stmt = $con->prepare($sql);

        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }

    function cadastrar($nome, $endereco, $bairro, $numero, $cidade, $estado, $cep, $telefone, $email, $cpf, $rg, $senha, $foto)
    {
        try {
            $con = Conexao::getInstance();
            $sql = "SELECT * FROM usuario WHERE cpf='$cpf' OR email='$email'";
            $stmt = $con->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return false;
            } else {

                $sql = "INSERT INTO usuario (nome,logradouro,bairro,numero,cidade,uf,cep,contato,email,cpf,rg,senha, foto) values ('$nome','$endereco','$bairro','$numero','$cidade','$estado','$cep','$telefone','$email','$cpf','$rg','$senha', '$foto')";

                $stmt = $con->prepare($sql);
                $stmt->execute();

                return true;
            }
            mysql_close($con);
        } catch (PDOException $e) {
            echo "Ocorreu um erro! ---  " . $e;
        }
    }

    function atualizar($id, $nome, $endereco, $bairro, $numero, $cidade, $estado, $cep, $telefone, $email, $rg, $foto)
    {
        try {
            $con = Conexao::getInstance();

            $sql = "UPDATE usuario set nome=?, logradouro=?, bairro=?, numero=?, cidade=?, uf=?, cep=?, contato=?, email=?, rg=?, foto=? where id=?";

            $stmt = $con->prepare($sql);
            $stmt->execute([
                $nome,
                $endereco,
                $bairro,
                $numero,
                $cidade,
                $estado,
                $cep,
                $telefone,
                $email,
                $rg,
                $foto,
                $id
            ]);
            return true;
        } catch (PDOException $e) {
            echo "Ocorreu um erro! ---  " . $e;
            return false;
        }
    }
    
    function list($curso){
        try{
            $con = Conexao::getInstance();
            $sql = "SELECT u.id, u.nome as professor, u.email, u.foto, c.nome as curso, d.nome as disciplina, d.sigla, t.nome as turma FROM disciplina d INNER JOIN usuario u ON u.id = d.id_professor INNER JOIN curso c ON c.id = d.id_curso INNER JOIN turma t ON t.id = d.id_turma WHERE c.id = ".$curso;
            
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

    public function deletar($id)
    {
        $con = Conexao::getInstance();
        $sql = "DELETE FROM usuario WHERE id=$id";
        $stmt = $con->prepare($sql);
        $stmt->execute();
    }

    public function buscar($id)
    {
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
    
    function search($cpf){
        $con = Conexao::getInstance();
        
        $sql = 'SELECT * FROM usuario WHERE cpf = '.$cpf;
        
        $stmt = $con->prepare($sql);
                
        $stmt->execute();
        
        if ($stmt->rowCount() == 1) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }
    
    function setInst($id, $inst){
        try {
            $con = Conexao::getInstance();
            $sql = "SELECT * FROM relacaoProfessorInstituicao WHERE id_professor=".$id." AND id_instituicao=".$inst;
            $stmt = $con->prepare($sql);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                return 'Professor já vinculado a instituição selecionada';
            } else {
                
                $sql = "INSERT INTO relacaoProfessorInstituicao (id_professor,id_instituicao) values ('$id','$inst')";
                
                $stmt = $con->prepare($sql);
                $stmt->execute();
                
                return 'Professor vinculado com sucesso';
            }
        } catch (PDOException $e) {
            echo "Ocorreu um erro! ---  " . $e;
        }
    }
}