<?php
require_once('db_config.php');
if(isset($_POST['id']))
{
	$cont_id = $_POST['id'];
	$stmt = $DB_con->prepare("SELECT container_space_bookings.*,users_content.* FROM container_space_bookings JOIN users_content ON container_space_bookings.cont_owner=users_content.email WHERE book_id=:id");
	$stmt->bindParam(":id",$cont_id);
	$stmt->execute();
	$object = json_encode($stmt->fetch(PDO::FETCH_ASSOC));
	echo $object;
}
?>