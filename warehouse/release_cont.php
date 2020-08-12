<?php
require_once('db_config.php');
if(isset($_POST['id']))
{
	$cont_id=$_POST['id'];
	$stmt=$DB_con->prepare("INSERT INTO released(cont_d)VALUES(:cont)");
	$stmt->bindParam(":cont",$cont_id);
	if($stmt->execute())
	{
		echo "YES";
	}
	else
	{
		echo "Error";
	}
}
?>