<?php
//Controle de usuario com put/update/delete | todos os comandos são compartilhados pela variavel COMMAND

include_once '../dao/UsuarioDao.php';
include_once '../dao/InstituicaoDao.php';
include_once '../dao/CursoDao.php';
include_once '../entidades/Curso.php';
session_start();



        $curso = new Curso();
        $curso->setNome(addslashes($_POST['nome']));
        $curso->setModalidade(addslashes($_POST['Modalidade']));
                
        $cursoDao = new CursoDao();
     

        $verifica = $cursoDao->cadastrarCurso($curso);
        
        if ($verifica){
            
            $_SESSION['msg']['usuCadSuccess'] = "<script>Swal.fire('Tudo certo !!!!', 'Curso Cadastrado:)', 'success')</script>";

            header('location: ../dashboardusu/src/html/cursosedisciplinas.php');
          
           
        }else  {

            $_SESSION['msg']['usuCadSuccess'] = "<script> Swal.fire({icon: 'error', title: 'ERRO...', text: 'Curso Ja cadastrado!'}); </script>";
            header('location: ../dashboardusu/src/html/cursosedisciplinas.php');
        }
 

    






