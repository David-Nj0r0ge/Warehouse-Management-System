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
$stmt9=$DB_con->prepare("SELECT  container_space_bookings.*, users_content.* FROM container_space_bookings
                        JOIN users_content ON container_space_bookings.cont_owner=users_content.email WHERE container_space_bookings.book_id NOT IN (SELECT cont_id FROM received_conts)");

$stmt9->execute();

?>
<table class="table table-hover table-responsive">
 <tr>
	 <tr>
 <td>Owner</td>
 
  <td>Code</td>
  <td>Weight in (tones)</td>
  <td>Arriving From </td>
  <td>On</td>

 </tr>
 <?php
 while($rows=$stmt9->fetch(PDO::FETCH_ASSOC))
 {
  //echo date("Y");
  //$pic='<img src="upload/' .$rows['pic'].'" style="max-height:70px;max-width:50px;" border-right="2px solid cyan" class="thumbnail" alt="">';
  $dates=explode(',',$rows['arrival_date']);
  $year=$dates[1];
  $date1= explode(' ', $dates[0]);
  //echo $date1[0];
  $day=$date1[0];
  $month=$date1[1];
  $mydate = array($year,$month,$day);
  $newdate = implode('-',$mydate);
  //echo $newdate;
  echo '<tr>
  <td>'.$rows['first_name']. " " . $rows['last_name'] .'</td>

   <td>'.$rows['cont_code'].'</td>
   <td>'.$rows['cont_weight'].'</td>
   <td>'.$rows['origin'].'</td>
   <td>'.$rows['arrival_date'].'</td>';
   
 
    echo '<td><a onclick="GetCont('.$rows['book_id'].')" data-toggle="modal" data-target="#myModal" class="button modal-trigger button-tiny button-action button-pill view">Receive</a></td>';
  
  echo '</tr>';
  
  

 }
 ?>
</table>	
