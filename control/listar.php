<?php
  
    include_once '../dao/UsuarioDao.php';

    session_start();

    $usuario = new UsuarioDao();
    
    $consulta = $usuario->buscar($_SESSION['email']);
    
    echo $consulta['nome'];
 
    
?>
