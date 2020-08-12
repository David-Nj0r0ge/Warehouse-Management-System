<?php
require_once('db_config.php');
if(isset($_POST['id-up']) && isset($_POST['status']))
{
  //$product_code ="#" . substr(rand(),0,4);
    $error = array();
    $user_id = $_POST['id-up'];
    $status = $user->testinput($_POST['status']);
    
      
    if(empty($status))
    {
        $error[]="You must Provide All Fields First";
        
    }
    else
    {
      
        
         
  
           if(count($error)==0)
           {
             $stmt=$DB_con->prepare("UPDATE student_details SET status=:status WHERE std_id=:id");
    $stmt->bindParam(":status",$status);
    $stmt->bindParam(":id",$user_id);
   
      $stmt->execute();
            echo "ok";
            
           }
            else
                    {
                        ?>
                         <div class="animated swing alert alert-danger alert-dismissal">
        <?php
        echo "Error Updating Status Try Again Please";
        ?>
    </div>
                         <?php
                    }
             
             
             
        

         
         
		
	
             
        
		
         
    }
}
else
{
    $error[]="Not All Fields Are Set Try Again Please";
    
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