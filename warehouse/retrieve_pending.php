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
$stmt9=$DB_con->prepare("SELECT * FROM container_space_bookings WHERE book_id NOT IN (SELECT cont_id FROM received_conts) AND cont_owner=:em ");
$stmt9->bindParam(":em",$user_id);
$stmt9->execute();
if($stmt9->rowCount()<1)
{
 ?>
 <div class="w3-card-8 w3-padding-16 w3-red">
  <h1 class="w3-xlarge w3-text-white w3-center">You Have No Containers Pending Arrival</h1>
 </div>
 <?php
}
else
{
 
?>
<table class="table table-hover table-responsive">
 <tr>
  <td>Container Code</td>
  <td>Weight in (tones)</td>
  <td>Arriving From </td>
  <td>On</td>
 </tr>
 <?php
 while($rows=$stmt9->fetch(PDO::FETCH_ASSOC))
 {
  //$pic='<img src="upload/' .$rows['pic'].'" style="max-height:70px;max-width:50px;" border-right="2px solid cyan" class="thumbnail" alt="">';
  
  echo '<tr>
  
   <td>'.$rows['cont_code'].'</td>
   <td>'.$rows['cont_weight'].'</td>
   <td>'.$rows['origin'].'</td>
   <td>'.$rows['arrival_date'].'</td>
   
   
  </tr>';
  
  

 }
 ?>
</table>
<?php
}
?>