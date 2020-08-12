<?php
require_once('db_config.php');
$user_id = $_SESSION['user_session'];
    $stmt5=$DB_con->prepare("SELECT * FROM users_content WHERE email =:ema");
    $stmt5->bindParam(":ema",$user_id);
    $stmt5->execute();
    $results=$stmt5->fetch(PDO::FETCH_ASSOC);
    //echo $results['reg_no'];
    $stmt1 = $DB_con->prepare("SELECT * FROM student_details WHERE prod_no = :prod_no");
    $stmt1->bindParam(":prod_no",$results['prod_no']);
    $stmt1->execute();
    $row= $stmt1->fetch(PDO::FETCH_ASSOC);
if(isset($_POST['prod-no-found']))
{
  //$product_code ="#" . substr(rand(),0,4);
    $error = array();
    $reg_no = $_POST['prod-no-found'];
   
    
      
    if(empty($prod_no ))
    {
        $error[]="You must Provide All Fields First";
        
    }
    else
    {
      
        
         
  
           if(count($error)==0)
           {
             $stmt=$DB_con->prepare("INSERT INTO founds(prod_no,found_by)VALUES(:prod,:found)");
    $stmt->bindParam(":prod",$prod_no);
    $stmt->bindParam(":found",$results['prod_no']);
   if($stmt->execute())
     {
        $stmt7 = $DB_con->prepare("SELECT * FROM student_details WHERE prod_no=:prodno");
        $stmt7->bindParam(":prodno",$reg_no);
        $stmt7->execute();
        $row4 = $stmt7->fetch(PDO::FETCH_ASSOC);
        if($stmt7->rowCount()>0)
        {
            ?>
            <h5 style="text-align: center;font-family: cursive;">
                The is Owned By The Following Customer
            </h5>
            <table class="table table-responsive table-bordered">
            <tr>
                <td>Delivered  By</td>
                
                <td>Phone No</td>
                <td>Email</td>
            </tr>
            <tr>
               
                <td><?php echo $row4['surname'] . " " . $row4['f_name'] . " " . $row4['l_name']?></td>
                <td><?php echo 0 . $row4['phone_no']?></td>
                <td><?php echo  $row4['email']?></td>
            </tr>
        </table>
            <?php
        }
        else
        {
            ?>
            <div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <span class="glyphicon glyphicon-info-sign">
        
      </span> &nbsp;  Owner Not Found</div>
            <?php
        }
     }
           
            
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