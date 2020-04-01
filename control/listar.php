<?php

include_once '../dao/UsuarioDao.php';
include_once '../dao/Usuario.php';

session_start();

        $usuario = new UsuarioDao();
// sessao tem q ta ativa 
        $consulta = $usuario->buscar($_SESSION['email']);


        $user = new Usuario();

        $user->setNome($consulta['nome']);
        $user->setEndereco($consulta['endereco']);
        $user->setBairro($consulta['bairro']);
        $user->setNumero($consulta['numero']);
        $user->setCidade($consulta['cidade']);
        $user->setEstado($consulta['estado']);
        $user->setTelefone($consulta['telefone']);
        $user->setEmail($consulta['email']);
        $user->setCpf($consulta['cpf']);
        $user->setRg($consulta['rg']);
        $user->setIdInstituicao($consulta['idInstituicao']);
        $user->setMatricula($consulta['matricula']);
        $user->setCursoLeciona($consulta['cursoLeciona']);
        $user->setSenha($consulta['senha']);
        $user->setCep($consulta['cep']);

header('Location: ../dashboardusu/perfilUser.php');

?>
 


