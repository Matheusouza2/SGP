<?php
session_start();

if(!isset($_SESSION['nome']) && !isset($_SESSION['email']))
    header('location: view/telaLogin.php');
else
	header('location: dashboardusu/LobDeUser.php');

?>