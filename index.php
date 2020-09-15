<?php
session_start();

if(!isset($_SESSION['usuarioLogado']))
    header('location: sgp/view/telaLogin.php');
else
	header('location: sgp/dashboardusu/src/html/index.php');
?>
