<table class="table table-responsive table-hover table-striped">
             <tr>
              <td>Charge Plan</td>
              <td>Cost</td>
             </tr>
            
<?php
require_once('db_config.php');
$stmt=$DB_con->prepare("SELECT * FROM charge_plans");
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
	?>
	<tr>
		<td>Per <?php echo $row['plan_name']?></td>
		<td><?php echo $row['cost']?></td>
	</tr>
<?php	
}
?>
</table>