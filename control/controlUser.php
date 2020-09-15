<?php
//Controle de usuario com put/update/delete | todos os comandos são compartilhados pela variavel COMMAND

include_once '../dao/UsuarioDao.php';
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
        $idInstituicao = addslashes($_POST['idInstituicao']);
        $matricula = addslashes($_POST['matricula']);
        $cursoLeciona = addslashes($_POST['cursoLeciona']);

        $senha = addslashes($_POST['senha']);

        $usuarioDao = new UsuarioDao();

        $verifica=$usuarioDao->cadastrar($nome,$endereco, $bairro, $numero, $cidade, $estado, $cep, $telefone, $email, $cpf, $rg, $idInstituicao, $matricula, $cursoLeciona, $senha);

        if ($verifica){
            
            $_SESSION['msg']['usuCadSuccess'] = "<script>Swal.fire('Tudo certo !!!!', 'Seja bem vindo ao SGP, você já pode entrar no sistema :)', 'success')</script>";

            header('location: ../index.php');	

        }else  {

            $_SESSION['msg']['usuCadSuccess'] = "<script> Swal.fire({icon: 'error', title: 'ERRO...', text: 'Email Ja cadastrados ! tente outro email ou tente  fazer login!!'}); </script>";

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
        $id = addslashes($_POST['updateIt']);

        $usuarioDao = new UsuarioDao();

        $verifica = $usuarioDao->atualizar($id, $nome, $endereco, $bairro, $numero, $cidade, $estado, $cep, $contato, $email, $rg);
        
        if ($verifica){       
            $_SESSION['msg']['msgUpdate'] = "<script>Swal.fire({icon: 'success', title: 'Sucesso', text: 'Atualização realizada com sucesso !'})</script>";
            $_SESSION['usuarioLogado'] = $usuarioDao->buscar($id);
            header('location: ../dashboardusu/src/html/usuAtualizar.php');	

        }else  {
            $_SESSION['msg']['msgUpdate'] = "<script> Swal.fire({icon: 'error', title: 'ERRO...', text: 'Ouve um erro ao tentar fazer sua atualização, entre em contato com o suporte !'}); </script>";

            header('location: ../dashboardusu/src/html/usuAtualizar.php');	
        }
    }

}