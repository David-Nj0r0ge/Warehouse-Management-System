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
	$stmt8=$DB_con->prepare("SELECT container_space_bookings.*, received_conts.*,users_content.*,payments.* FROM container_space_bookings JOIN received_conts ON container_space_bookings.book_id=received_conts.cont_id JOIN
						users_content ON users_content.email=received_conts.owner JOIN payments ON payments.cont_cod=received_conts.cont_id WHERE container_space_bookings.book_id NOT IN (SELECT cont_d FROM released)");
	
	$stmt8->execute();
	
$rw5=$stmt5->fetch(PDO::FETCH_ASSOC);
$charge_by_no_days= $rw5['cost'];
	if($stmt8->rowCount()<1)
	{
		?>
		<div class="w3-card-8 w3-padding-16 w3-red">
			<h1 class="w3-text-white w3-center w3-xlarge"> No Payments Paid Yet</h1>
		</div>
		<?php
	}
	else
	{
		?>
	<table class="table table-responsive">
		<tr>
			<td>Owned By</td>
			<td>Container Code</td>
			<td>MPESA CODE</td>
			<td>Amount Paid</td>
			<td>Balance </td>
			<td>Total Payable Amount</td>
			<td>No of Days Held </td>
			<td>Weight</td>
		</tr>
	
	<?php
	while($rwt=$stmt8->fetch(PDO::FETCH_ASSOC))
	{
		$end = date_create();
$start = date_create($rwt['received_on']);
$diff = date_diff($start,$end);
//echo $start;

$no_held=$diff->d;
$payable_day =$no_held * $charge_by_no_days;
	$payable_weight=$charge_by_weight*$rwt['cont_weight'];
	$total_cost=$payable_day + $payable_weight;
		?>
		<tr>
			<td><?php echo $rwt['first_name'] . " " . $rwt['last_name'] ?></td>
		<td><?php echo $rwt['cont_code'] ?></td>
		<td><?php echo $rwt['mpesa_code'] ?></td>
		<td>Kshs <?php echo number_format($rwt['amount_paid']) ?></td>
		<td>Kshs <?php echo number_format($rwt['balance']) ?></td>
		<td>Kshs <?php echo number_format($total_cost) ?></td>
		<td><?php echo $no_held ?></td>
		<td><?php echo $rwt['cont_weight'] ?> tons</td>
			<?php
		echo '<td><a onclick="ReleaseCont('.$rwt['book_id'].')" href="#modal2" class="button modal-trigger button-3d button-action button-pill view">Release</a></td>
   ';
		?>
		</tr>
		<?php
	}
?>
</table>
	<?php
	}
	?>