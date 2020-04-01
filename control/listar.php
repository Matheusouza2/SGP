<?php
  
    include_once '../dao/UsuarioDao.php';

    session_start();

    $usuario = new UsuarioDao();
    // sessao tem q ta ativa 
    $consulta = $usuario->buscar($_SESSION['email']);
    
    echo $consulta['nome'];
 
    header('Location: ../dashboardusu/perfilUser.php');
    
?>
 
    

