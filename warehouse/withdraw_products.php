<?php
require_once('db_config.php');
if(isset($_POST['reg-no']))
{
  //$product_code ="#" . substr(rand(),0,4);
    $error = array();
    $reg_no = $_POST['prod-no'];
   
    
      
    if(empty($reg_no ))
    {
        $error[]="You must Provide All Fields First";
        
    }
    else
    {
      
        
         
  
           if(count($error)==0)
           {
             $stmt=$DB_con->prepare("INSERT INTO losts(prod_no)VALUES(:prod)");
    $stmt->bindParam(":prod",$prod_no);

   
      $stmt->execute();
            echo "ok";
            
           }
            else
                    {
                        ?>
                         <div class="animated swing alert alert-danger alert-dismissal">
        <?php
        echo "Error Adding Product Try Again Please";
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