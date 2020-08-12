<?php
require_once 'db_config.php';

if($_SESSION['user_session'] ="admin@kpa.co.ke")
{
	$user->redirect('container_dashboard.php');
}
else
{
	$user->redirect('client_dashboard.php');
}
if(isset($_GET['logout']) && $_GET['logout']=="true")
{
	$user->logout();
	$user->redirect('login.php');
}
if(!isset($_SESSION['user_session']))
{
	$user->redirect('login.php');
}
?>