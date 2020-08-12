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
$stmt7=$DB_con->prepare("SELECT container_space_bookings.*, received_conts.*,users_content.* FROM container_space_bookings JOIN received_conts ON container_space_bookings.book_id=received_conts.cont_id
                        JOIN users_content ON users_content.email=received_conts.owner WHERE received_conts.cont_id=:cont");
$stmt7->bindParam(":cont",$id);
$stmt7->execute();
$rwt=$stmt7->fetch(PDO::FETCH_ASSOC);

	//$end = date_create();
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
		
		<td><?php echo $rwt['cont_weight'] ?></td>
		<td><?php echo $no_held ?></td>
		<td><?php echo $rwt['block_nam'] ?></td>
		<td>Kshs <?php echo number_format($total_cost) ?></td>
		<?php
		echo '<td><a onclick="PayCont('.$rwt['book_id'].')" href="#modal2" class="button modal-trigger button-3d button-action button-pill view">Pay</a></td>
   ';
		?>
		
	</tr>
	<?php
}
if(isset($_POST['id']))
{
	$cont_id = $_POST['id'];
	$stmt = $DB_con->prepare("SELECT container_space_bookings.*,users_content.* received_conts FROM container_space_bookings JOIN users_content ON container_space_bookings.cont_owner=users_content.email WHERE book_id=:id");
	$stmt->bindParam(":id",$cont_id);
	$stmt->execute();
	$object = json_encode($stmt->fetch(PDO::FETCH_ASSOC));
	echo $object;
}
?>