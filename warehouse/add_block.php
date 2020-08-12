<?php
require_once('db_config.php');

  $user_id = $_SESSION['user_session'];
    $stmt=$DB_con->prepare("SELECT * FROM users_content WHERE email =:ema");
    $stmt->bindParam(":ema",$user_id);
    $stmt->execute();
    $results=$stmt->fetch(PDO::FETCH_ASSOC);
	

if(isset($_POST['block_name']) && isset($_POST['block_no']))
{
    $error = array();
    $block_name= $user->testinput($_POST['block_name']);
    $block_no = $user->testinput($_POST['block_no']);
    
    if(empty($block_name) && empty($block_no))
    {
        $error[]="You must Provide All Fields First";
        
    }
    else
    {
        if(strlen($block_name) < 3)
        {
            $error[] = "Block Name Too Short";
        }
       else if(!ctype_alnum($block_name))
        {
            $error[] = "Block Name Invalid";
        }
        else if(!is_numeric($block_no))
        {
            $error[] = "Invalid Block Number";
        }
                
		else if($user->add_block($block_name,$block_no))
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