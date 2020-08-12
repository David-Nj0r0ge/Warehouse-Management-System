<?php
require_once('db_config.php');

  $user_id = $_SESSION['user_session'];
    $stmt=$DB_con->prepare("SELECT * FROM users_content WHERE email =:ema");
    $stmt->bindParam(":ema",$user_id);
    $stmt->execute();
    $results=$stmt->fetch(PDO::FETCH_ASSOC);
$stmt4=$DB_con->prepare("SELECT * FROM charge_plans WHERE plan_name='tone'");
$stmt4->execute();
$rw=$stmt4->fetch(PDO::FETCH_ASSOC);
$charge_by_weight= $rw['cost'];
$stmt5=$DB_con->prepare("SELECT * FROM charge_plans WHERE plan_name='day'");
$stmt5->execute();
$rw5=$stmt5->fetch(PDO::FETCH_ASSOC);
$charge_by_no_days= $rw5['cost'];


if(isset($_POST['mpesa_code']) && isset($_POST['amount_paid']) && isset($_POST['contid']))
{
    $error = array();
    $mpesa_code= $user->testinput($_POST['mpesa_code']);
    $amount_paid = $user->testinput($_POST['amount_paid']);
    $contid = $user->testinput($_POST['contid']);
	$stmt7=$DB_con->prepare("SELECT container_space_bookings.*, received_conts.*,users_content.* FROM container_space_bookings JOIN received_conts ON container_space_bookings.book_id=received_conts.cont_id JOIN
						users_content ON users_content.email=received_conts.owner WHERE cont_id=:cont");
$stmt7->bindParam(":cont",$contid);
$stmt7->execute();
$rwt=$stmt7->fetch(PDO::FETCH_ASSOC);
$end = date_create();
$start = date_create($rwt['received_on']);
$diff = date_diff($start,$end);
//echo $start;

$no_held=$diff->d;
$payable_day =$no_held * $charge_by_no_days;
	$payable_weight=$charge_by_weight*$rwt['cont_weight'];
	$total_cost=$payable_day + $payable_weight;
	$balance=$total_cost-$amount_paid;
    if(empty($mpesa_code) && empty($amount_paid) && empty($contid))
    {
        $error[]="You must Provide All Fields First";
        
    }
    else
    {
        if(strlen($mpesa_code) < 7)
        {
            $error[] = "MPESA CODE INVALID";
        }
       else if(!ctype_alnum($mpesa_code))
        {
            $error[] = "Mpesa Code Invalid";
        }
        else if(!is_numeric($amount_paid))
        {
            $error[] = "Invalid amount";
        }
                
		else if($user->add_payments($mpesa_code,$user_id,$amount_paid,$balance,$total_cost,$contid))
		{
			echo "ok";
			
		}
		else
		{
			?>
			 <div class="animated swing alert alert-danger alert-dismissal">
<?php
echo "Error Adding Block Try Again Please";
?>
</div>
			 <?php
		}
	
             
        
		
         
    }
}
else
{
    $error[]="Not All Fields Are Try Again Please";
    
}
foreach($error as $err)
{
    ?>
    <div class="row">
        <div class="col-sm-12 col-lg-12 col-md-12">
    <div style="width: auto;" class="alert alert-danger alert-dismissal">
        <?php echo $err ; ?>
    </div>
    </div>
    </div>
    <?php
}
?>