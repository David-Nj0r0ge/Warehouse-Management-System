<?php
require_once('db_config.php');
$stmt3= $DB_con->prepare("SELECT student_details.*,losts.* FROM student_details JOIN losts ON student_details.reg_no=losts.reg_no");
$stmt3->execute();
$rows= $stmt3->fetchAll();
$output = '';
foreach($rows as $row)
{
    /*
    if($row['status'] == "Pending")
    {
        $class="w3-red";
    }
    else if($row['status'] == "Ready")
    {
        $class = "w3-green";
    }
    */
    $output .='<div class="col-md-3 w3-card-4" style="margin-top:12px;background-color:#f1f1f1;">  
            <div class="" style="background-color:#f1f1f1; border-radius:5px; padding:10px;" align="center">
             <img src="upload/'.$row["photo"].'" style="height:100px;width:100px;" class="img-responsive" /><br />
             <h6 class="">Name '.$row["surname"]. " " . $row['f_name'] . " " . $row['l_name'] .'</h6>
             <h6 class="">Reg No '.$row["reg_no"] .'</h6>
             <h6 class="">Email '.$row["email"] .'</h6>
             <h6 class="">Course '.$row["course"] .' Dept '. $row['dept'] .'</h6>
         <h6 class="">Year '.$row["year"] .' Sem '. $row['sem'] .'</h6>

             <input type="hidden" name="hidden_name" id="name'.$row["std_id"].'"/>
   
            </div>
        </div>';
}
echo $output;
?>