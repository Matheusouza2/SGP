<?php
//Controle de usuario com put/update/delete | todos os comandos são compartilhados pela variavel COMMAND

include_once '../dao/UsuarioDao.php';
include_once '../dao/InstituicaoDao.php';
include_once '../dao/CursoDao.php';
session_start();


if(isset($_POST['command'])){
    if($_POST['command'] == 'put'){
        
        $nome = addslashes($_POST['nome']);
        $endereco = addslashes($_POST['endereco']);
        $bairro = addslashes($_POST['bairro']);
        $numero = addslashes($_POST['numero']);
        $cidade = addslashes($_POST['cidade']);
        $estado = addslashes($_POST['estado']);
        $cep = addslashes($_POST['cep']);
        $telefone = addslashes($_POST['telefone']);
        $email = addslashes($_POST['email']);
        $cpf = addslashes($_POST['cpf']);
        $rg = addslashes($_POST['rg']);
        $senha = addslashes($_POST['senha']);
        
        
        
        $usuarioDao = new UsuarioDao();

        $verifica = $usuarioDao->cadastrar($nome,$endereco, $bairro, $numero, $cidade, $estado, $cep, $telefone, $email, $cpf, $rg, $senha);
        
        if ($verifica){
            
            $_SESSION['msg']['usuCadSuccess'] = "<script>Swal.fire('Tudo certo !!!!', 'Seja bem vindo ao SGP, você já pode entrar no sistema :)', 'success')</script>";
            header('location: ../index.php');
           
        }else  {

            $_SESSION['msg']['usuCadSuccess'] = "<script> Swal.fire({icon: 'error', title: 'ERRO...', text: 'Email ou CPF já cadastrados ! Faça Login na sua conta!!'}); </script>";
            header('location: ../index.php');
           
        }
    }elseif($_POST['command'] == 'update'){
        $nome = addslashes($_POST['nome']);
        $endereco = addslashes($_POST['endereco']);
        $bairro = addslashes($_POST['bairro']);
        $numero = addslashes($_POST['numero']);
        $cidade = addslashes($_POST['cidade']);
        $estado = addslashes($_POST['estado']);
        $cep = addslashes($_POST['cep']);
        $contato = addslashes($_POST['telefone']);
        $contato = str_replace("(", "", $contato);
        $contato = str_replace(")", "", $contato);
        $contato = str_replace("-", "", $contato);
        $contato = str_replace(" ", "", $contato);
        $email = addslashes($_POST['email']);
        $rg = addslashes($_POST['rg']);
        $id = addslashes($_POST['updateId']);
        
        $foto = salvarFoto($id);

        $usuarioDao = new UsuarioDao();

        $verifica = $usuarioDao->atualizar($id, $nome, $endereco, $bairro, $numero, $cidade, $estado, $cep, $contato, $email, $rg, $foto);
        
        if ($verifica){       
            $_SESSION['msg']['msgUpdate'] = "<script>Swal.fire({icon: 'success', title: 'Sucesso', text: 'Atualização realizada com sucesso !'})</script>";
            $_SESSION['usuarioLogado'] = $usuarioDao->buscar($id);
            $lista = new InstituicaoDao();
            $instituicoes = $lista->listar($_SESSION['usuarioLogado']['cpf']);
            if($instituicoes != null){
                $_SESSION['usuarioLogado']['admin'] = true;
            }
            
            $curso = new CursoDao();
            $flag = $curso->cursoCoordenador($_SESSION['usuarioLogado']['id']);
            if($flag != null){
                $_SESSION['usuarioLogado']['coord'] = true;
            }
            header('location: ../dashboardusu/src/html/usuAtualizar.php');	

        }else  {
            $_SESSION['msg']['msgUpdate'] = "<script> Swal.fire({icon: 'error', title: 'ERRO...', text: 'Ouve um erro ao tentar fazer sua atualização, entre em contato com o suporte !'}); </script>";

            header('location: ../dashboardusu/src/html/usuAtualizar.php');	
        }
    }

}




function salvarFoto($id){
    if ( isset($_FILES['userphoto']['name']) && $_FILES['userphoto'][ 'error' ] == 0 ) {
                
        $arquivo_tmp =$_FILES['userphoto'][ 'tmp_name' ];
        $nome = $_FILES['userphoto'][ 'name' ];
        
        $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
        
        $extensao = strtolower ( $extensao );
            
        $novoNome = $id.'.'.$extensao;
            
        $destino = '../assets/img/users/' . $novoNome;
        
        @move_uploaded_file ( $arquivo_tmp, $destino );
        
        return $novoNome;
    }else{
        return $_SESSION['usuarioLogado']['foto'];
    }
}