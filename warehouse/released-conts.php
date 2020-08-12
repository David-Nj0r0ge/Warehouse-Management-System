<?php
require_once('db_config.php');
$stmt10= $DB_con->prepare("SELECT container_space_bookings.*,released.*,users_content.* FROM container_space_bookings JOIN released ON released.cont_d=container_space_bookings.book_id JOIN
						  users_content ON container_space_bookings.cont_owner=users_content.email");
$stmt10->execute();
?>
<table class="table table-hover table-bordered ">
	<tr>
		<td>
			Container Code
		</td>
		<td>Owner</td>
		<td>Owner Phone Number</td>
		<td>Owner Email</td>
		<td>Weight</td>
	</tr>
	<?php
	while($rows=$stmt10->fetch(PDO::FETCH_ASSOC))
	{
		?>
		<tr>
			<td><?php echo $rows['cont_code']?></td>
			<td><?php echo $rows['first_name'] . " " . $rows['last_name']?></td>
			
			<td><?php echo 0 . $rows['phone_no']?></td>
			<td><?php echo $rows['email']?></td>
			<td><?php echo $rows['cont_weight']?></td>
		</tr>
		<?php
	}
	?>
</table>
<?php
?>