<?php
require_once('db_config.php');
if(!$user->is_loggedin())
{
    $user->redirect('login.php');
}
  $user_id = $_SESSION['user_session'];
    $stmt=$DB_con->prepare("SELECT * FROM users_content WHERE email =:ema");
    $stmt->bindParam(":ema",$user_id);
    $stmt->execute();
    $results=$stmt->fetch(PDO::FETCH_ASSOC);
    $stmt9=$DB_con->prepare("SELECT  * FROM blocks");

$stmt9->execute();

?>
<table class="table table-hover table-responsive">
 <tr>
	 <tr>
 <td>Block</td>
 <td>Total Spaces for Containers</td>
 <td>Available Spaces  Containers</td>
 <td>Occupied Spaces</td>
 </tr>
 <?php
 while($rows=$stmt9->fetch(PDO::FETCH_ASSOC))
 {
  //$pic='<img src="upload/' .$rows['pic'].'" style="max-height:70px;max-width:50px;" border-right="2px solid cyan" class="thumbnail" alt="">';
  $stmt2=$DB_con->prepare("SELECT * FROM received_conts WHERE block_nam=:blck AND cont_id NOT IN (SELECT cont_d FROM released)");
  $stmt2->bindParam(":blck",$rows['block_name']);
  $stmt2->execute();
  $occupied= $stmt2->rowCount();
  
  $free_blocks=$rows['no_containers'] - $stmt2->rowCount();
  echo '<tr>
  <td>'.$rows['block_name'] . '</td>
  <td>'.$rows['no_containers'].'</td>
  <td>'.$free_blocks.'</td>
  <td>'.$occupied.'</td>
  </tr>';
  
  

 }
 ?>
</table>	