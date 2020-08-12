<?php
require_once('db_config.php');

  $user_id = $_SESSION['user_session'];
    $stmt=$DB_con->prepare("SELECT * FROM users_content WHERE email =:ema");
    $stmt->bindParam(":ema",$user_id);
    $stmt->execute();
    $results=$stmt->fetch(PDO::FETCH_ASSOC);
	

if(isset($_POST['plan_name']) && isset($_POST['plan_charge']))
{
    $error = array();
    $plan_name= $user->testinput($_POST['plan_name']);
    $plan_charge = $user->testinput($_POST['plan_charge']);
    
    if(empty($plan_name) && empty($plan_charge))
    {
        $error[]="You must Provide All Fields First";
        
    }
    else
    {
        if(strlen($plan_name) < 3)
        {
            $error[] = "Plan Name Too Short";
        }
       
        else if(!is_numeric($plan_charge))
        {
            $error[] = "Invalid Charges";
        }
                
		else if($user->add_plans($plan_name,$plan_charge))
		{
			echo "ok";
			
		}
		else
		{
			?>
			 <div class="animated swing alert alert-danger alert-dismissal">
<?php
echo "Error Adding Charge Plan Try Again Please";
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