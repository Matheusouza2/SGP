<?php
session_start();

if(!isset($_SESSION['usuarioLogado']))
    header('location: /view/telaLogin.php');
else
	header('location: /dashboardusu/src/html/index.php');
?>
