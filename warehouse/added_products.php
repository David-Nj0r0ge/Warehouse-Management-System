<?php
require_once('db_config.php');
if(isset($_POST['prod-no-found']))
{
  //$product_code ="#" . substr(rand(),0,4);
    $error = array();
    $reg_no = $_POST['prod-no-found'];
   
    
      
    if(empty($prod_no ))
    {
        $error[]="You must Fill in All Fields First";
        
    }
    else
    {
      
        
         
  
           if(count($error)==0)
           {
             $stmt=$DB_con->prepare("INSERT INTO founds(prod_no)VALUES(:prod)");
    $stmt->bindParam(":reg",$prod_no);

   
      $stmt->execute();
            echo "ok";
            
           }
            else
                    {
                        ?>
                         <div class="animated swing alert alert-danger alert-dismissal">
        <?php
        echo "Error Adding Product Please Try Again ";
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