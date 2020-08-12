<table class="table table-responsive table-hover table-striped">
             <tr>
              <td>Code</td>
              
			  <td>Owner</td>
			  <td>Weight</td>
			  <td>Days Held</td>
			  <td>Block Held</td>
			  <td>Payable Amount</td>
			 
             </tr>
            
<?php
require_once('db_config.php');
$stmt4=$DB_con->prepare("SELECT * FROM charge_plans WHERE plan_name='tone'");
$stmt4->execute();
$rw=$stmt4->fetch(PDO::FETCH_ASSOC);
$charge_by_weight= $rw['cost'];
$stmt5=$DB_con->prepare("SELECT * FROM charge_plans WHERE plan_name='day'");
$stmt5->execute();
$rw5=$stmt5->fetch(PDO::FETCH_ASSOC);
$charge_by_no_days= $rw5['cost'];
$stmt7=$DB_con->prepare("SELECT container_space_bookings.*, received_conts.*,users_content.* FROM container_space_bookings JOIN received_conts ON container_space_bookings.book_id=received_conts.cont_id JOIN users_content ON users_content.email=received_conts.owner");
$stmt7->execute();
while($rwt=$stmt7->fetch(PDO::FETCH_ASSOC))
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
		<td><?php echo $rwt['cont_code'] ?></td>
		<td><?php echo $rwt['owner'] ?></td>
		<td><?php echo $rwt['cont_weight'] ?></td>
		<td><?php echo $no_held ?></td>
		<td><?php echo $rwt['block_nam'] ?></td>
		<td>Kshs <?php echo number_format($total_cost) ?></td>
	</tr>
	<?php
}
?>
</table>