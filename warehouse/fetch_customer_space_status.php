<?php
require_once('db_config.php');
if(isset($_POST['std_id']))
{
    $input_id = $_POST['std_id'];
    $stmt = $DB_con->prepare("SELECT * FROM student_details WHERE std_id=:std");
$stmt->bindParam(":std",$input_id);
$stmt->execute();
$row= $stmt->fetch(PDO::FETCH_ASSOC);
echo json_encode($row);
}
?>