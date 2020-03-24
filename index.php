<?php

if( !isset($_SESSION['nome']) && !isset($_SESSION['email']))
	$template = file_get_contents('view/telaLogin.php');
else
	$template = file_get_contents('dashboardusu/lobDeUser.php');

echo $template

?>