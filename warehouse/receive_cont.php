<?php
require_once('db_config.php');

  $user_id = $_SESSION['user_session'];
    $stmt=$DB_con->prepare("SELECT * FROM users_content WHERE email =:ema");
    $stmt->bindParam(":ema",$user_id);
    $stmt->execute();
    $results=$stmt->fetch(PDO::FETCH_ASSOC);
	

if(isset($_POST['owner_email']) && isset($_POST['cont_id']) && isset($_POST['block_nam']))
{
    $error = array();
    $cont_owner= $user->testinput($_POST['owner_email']);
    $cont_id = $user->testinput($_POST['cont_id']);
    $block_name = $user->testinput($_POST['block_nam']);
    if( empty($cont_owner) && empty($cont_id) &&  empty($block_name))
    {
        $error[]="You must Provide All Fields First";
        
    }
    else
    {
        
                
		if($user->receive_container($cont_owner,$cont_id,$block_name))
		{
			echo "ok";
			
		}
		else
		{
			?>
			 <div class="animated swing alert alert-danger alert-dismissal">
<?php
echo "Error Receiving Container....Try Again Please";
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