<?php
require_once('db_config.php');
/*
  $user_id = $_SESSION['user_session'];
    $stmt=$DB_con->prepare("SELECT * FROM users_content WHERE email =:ema");
    $stmt->bindParam(":ema",$user_id);
    $stmt->execute();
    $results=$stmt->fetch(PDO::FETCH_ASSOC);
	*/
$user_id = $_SESSION['user_session'];
    $stmt=$DB_con->prepare("SELECT * FROM users_content WHERE email =:ema");
    $stmt->bindParam(":ema",$user_id);
    $stmt->execute();
    $results=$stmt->fetch(PDO::FETCH_ASSOC);
    //echo $results['reg_no'];
    $stmt1 = $DB_con->prepare("SELECT * FROM student_details WHERE reg_no = :reg_no");
    $stmt1->bindParam(":reg_no",$results['reg_no']);
    $stmt1->execute();
    $row= $stmt1->fetch(PDO::FETCH_ASSOC);
    

if(isset($_POST['f_name']) && isset($_POST['s_name']) && isset($_POST['l_name'])
   && isset($_POST['id_no']) && isset($_POST['phone_no']) && isset($_POST['dob'])
   && isset($_POST['course']) && isset($_POST['year']) && isset($_POST['sem'])
   && isset($_POST['school']) && isset($_POST['dept'])
   && isset($_POST['n_name']) && isset($_POST['n_phone']))
{
   // $product_code ="#" . substr(rand(),0,4);
    $error = array();
    $f_name= $user->testinput($_POST['f_name']);
    $s_name = $user->testinput($_POST['s_name']);
    $l_name = $user->testinput($_POST['l_name']);
    $id_no = $user->testinput($_POST['id_no']);
    $phone_no = $user->testinput($_POST['phone_no']);
    $dob = $user->testinput($_POST['dob']);
    $course = $user->testinput($_POST['course']);
    $year = $user->testinput($_POST['year']);
    $sem = $user->testinput($_POST['sem']);
    $school = $user->testinput($_POST['school']);
    $dept = $user->testinput($_POST['dept']);
    $n_name = $user->testinput($_POST['n_name']);
    $n_phone = $user->testinput($_POST['n_phone']);
    $email = $s_name . $f_name . "@students";
    $stmt5 = $DB_con->prepare("UPDATE users_content SET email=:em WHERE reg_no=:reg");
    $stmt5->bindParam(":em",$email);
    $stmt5->bindParam(":reg",$results['reg_no']);
      $stmt7 = $DB_con->prepare("UPDATE student_details SET f_name=:fname,surname=:sur,
                                l_name=:lname,id_no=:id,phone_no=:phone,
                                email=:ema,dob=:dob,course=:cs,
                                year=:yr,sem=:sem,school=:sch,
                                dept=:dept,guardian_name=:name,
                                guardian_phone=:phon WHERE reg_no=:re");
    $stmt7->bindParam(":fname",$f_name);
    $stmt7->bindParam(":sur",$s_name);
    $stmt7->bindParam(":lname",$l_name);
    $stmt7->bindParam(":id",$id_no);
    $stmt7->bindParam(":phone",$phone_no);
    $stmt7->bindParam(":ema",$email);
    $stmt7->bindParam(":dob",$dob);
    $stmt7->bindParam(":cs",$course);
    $stmt7->bindParam(":yr",$year);
    $stmt7->bindParam(":sem",$sem);
    $stmt7->bindParam(":sch",$school);
    $stmt7->bindParam(":dept",$dept);
    $stmt7->bindParam(":name",$n_name);
    $stmt7->bindParam(":phon",$n_phone);
        $stmt7->bindParam(":re",$results['reg_no']);

    if(empty($f_name) && empty($s_name) && empty($l_name)
       && empty($id_no) && empty($phone_no) && empty($dob)
       &&  empty($course)  &&  empty($year)  &&  empty($sem)
        &&  empty($school)  &&  empty($dept)  &&  empty($n_name)
        && empty($n_phone))
    {
        $error[]="You must Provide All Fields First";
        
    }
    else
    {
        if(strlen($f_name) < 3)
        {
            $error[] = "Fisrt Name Too Short";
        }
       else if(strlen($s_name) < 3)
        {
            $error[] = "Surname Too Short";
        }
        else if(!is_numeric($phone_no))
        {
            $error[] = "Invalid Phone Number";
        }
             
		 
           
            
            if($stmt5->execute() && $stmt7->execute())
           {
             echo "ok";
             
           }
            else
                    {
                        ?>
                         <div class="animated swing alert alert-danger alert-dismissal">
        <?php
        echo "Error Updating Try Again Please";
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