<?php
require_once('db_config.php');
/*
  $user_id = $_SESSION['user_session'];
    $stmt=$DB_con->prepare("SELECT * FROM users_content WHERE email =:ema");
    $stmt->bindParam(":ema",$user_id);
    $stmt->execute();
    $results=$stmt->fetch(PDO::FETCH_ASSOC);
	*/

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
    $name_img = $_FILES['img'] ['name'];
    $size = $_FILES['img'] ['size'];
    $type = $_FILES['img'] ['type'];
    $location = "upload/";
    $status = "Pending";
    $reg_no = "SCT-"  . rand() . "/2018";
            $email = $s_name . $f_name . "@students";
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
         else if(is_uploaded_file($_FILES['img']['tmp_name']))
         {
            $valid_formats = array("jpeg","jpg","png","bmp","JPG","PNG","JPEG","BMP");//validate image formats
        list($txt,$ext) = explode(".",$name_img);       
		 if(in_array($ext,$valid_formats))
        {
           if($size<(1024*1024))
             {
                $actual_img_nam = rand();
                $tmp_name = $_FILES['img'] ['tmp_name'];
            if(move_uploaded_file($tmp_name,$location.$actual_img_nam.".png"))
                {
                    $student_photo = $actual_img_nam . ".png";
            if($user->add_users($email,$reg_no,$reg_no) &&
               $user->registerStudents($f_name,$s_name,$l_name,
                                       $reg_no,$id_no,$phone_no,$email,$dob,
                                       $student_photo,$course,$year,$sem,$school,$dept,$n_name,$n_phone,$status))
           {
             echo "ok";
             
           }
            else
                    {
                        ?>
                         <div class="animated swing alert alert-danger alert-dismissal">
        <?php
        echo "Error Registering Student Try Again Please";
        ?>
    </div>
                         <?php
                    }
             }
             }
             else
             {
              $error[]="Photo Size Too Large";
             }
             
        }
    else
		{
			$error[]="Invalid Image Format";
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