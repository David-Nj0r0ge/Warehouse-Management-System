<?php
require_once('db_config.php');
if(isset($_POST['reg-no']))
{
  //$product_code ="#" . substr(rand(),0,4);
    $error = array();
    $reg_no = $_POST['prod-no'];
   
    $stmt2= $DB_con->prepare("SELECT * FROM founds WHERE reg_no=:reg");
    $stmt2->bindParam(":prod",$prod_no);
    $stmt2->execute();
    $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
    if($stmt2->rowCount()>0)
    {
$stmt3 = $DB_con->prepare("SELECT * FROM student_details WHERE prod_no = :prod_no");
$stmt3->bindParam(":prod_no",$row2['found_by']);
$stmt3->execute();
$row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
?>
<?php
        ?>
       
        <?php
    }
    else
    {
      ?>
      '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <span class="glyphicon glyphicon-info-sign">
        
      </span> &nbsp; Product Not Found Check Out Later</div>
      <?php
    }
    if(empty($reg_no ))
    {
        $error[]="You must Provide All Fields First";
        
    }
    else
    {
      
        
         
  
           if(count($error)==0)
           {
            if($stmt2->rowCount()>0)
    {
$stmt3 = $DB_con->prepare("SELECT * FROM student_details WHERE prod_no = :prod_no");
$stmt3->bindParam(":prod_no",$row2['found_by']);
$stmt3->execute();
$row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
?>
<?php
        ?>
        <table class="table table-responsive table-bordered">
            <tr>
                <td>Product Delivered</td>
                <td>Delivered By</td>
                <td>Phone No</td>
                <td>Email</td>
            </tr>
            <tr>
                <td><?php echo $prod_no?></td>
                <td><?php echo $row3['surname'] . " " . $row3['f_name'] . " " . $row3['l_name']?></td>
                <td><?php echo 0 . $row3['phone_no']?></td>
                <td><?php echo  $row3['email']?></td>
            </tr>
        </table>
        <?php
    }
    else
    {
      ?>
      <div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <span class="glyphicon glyphicon-info-sign">
        
      </span> &nbsp; Phone Not Found Check Out Later</div>
      <?php
      
             $stmt4=$DB_con->prepare("INSERT INTO withdraw_products(prod_no)VALUES(:prod)");
    $stmt4->bindParam(":prod",$prod_no);

   
      $stmt4->execute();
      
    }
            //echo "ok";
            
           }
            else
                    {
                        ?>
                         <div class="animated swing alert alert-danger alert-dismissal">
        <?php
        echo "Error Withdrawing Product Please Try Again";
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