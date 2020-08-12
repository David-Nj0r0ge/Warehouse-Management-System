<?php
require_once('db_config.php');

  $user_id = $_SESSION['user_session'];
    $stmt=$DB_con->prepare("SELECT * FROM users_content WHERE email =:ema");
    $stmt->bindParam(":ema",$user_id);
    $stmt->execute();
    $results=$stmt->fetch(PDO::FETCH_ASSOC);
	

if(isset($_POST['owner']) && isset($_POST['cont-weight']) && isset($_POST['date'])
   && isset($_POST['location']))
{
    $error = array();
    $owner = $user->testinput($_POST['owner']);
    $cont_weight = $user->testinput($_POST['cont-weight']);
    $date = $user->testinput($_POST['date']);
    $product_type = $user->testinput($_POST['product_type']);
    $origin = $user->testinput($_POST['location']);
    $product_name = $user->testinput($_POST['product_name']);
    $name_img = $_FILES['img'] ['name'];
    $size = $_FILES['img'] ['size'];
    $type = $_FILES['img'] ['type'];
    $location = "upload/";
    $cont_code = "GBL-" . rand() . "/2019";
    if(empty($owner) && empty($cont_weight) && empty($date) && empty($origin))
    {
        $error[]="You must Provide All Fields First";
        
    }
    else
    {
        if(strlen($owner) < 3)
        {
            $error[] = "Container Code Too Short";
        }
       
        else if(!is_numeric($cont_weight))
        {
            $error[] = "Invalid Weight";
        }
        
        
		else if(!ctype_alnum($owner))
        {
            $error[] = "Invalid name";
        }
        
       
        else if(is_uploaded_file($_FILES['img']['tmp_name']))
         {
            $valid_formats = array("jpeg","jpg","png","bmp","JPG","PNG","JPEG","BMP","docx","doc","pdf","odt");//validate image formats
        list($txt,$ext) = explode(".",$name_img);
        if(in_array($ext,$valid_formats))
        {
             if($size<(1024*1024))
             {
                $actual_img_nam = rand();
                $tmp_name = $_FILES['img'] ['tmp_name'];
                if(move_uploaded_file($tmp_name,$location.$actual_img_nam.".docx"))
                {
                    $img = $actual_img_nam . ".png";
                    if($user->book_Space($user_id,$owner,$cont_code,$cont_weight,$date,$product_name,$img,$origin,$product_type))
                    {
                        echo "ok";
                        
                    }
                    else
                    {
                        ?>
                         <div class="animated swing alert alert-danger alert-dismissal">
        <?php
        echo "Error Booking Space Try Again Please";
        ?>
    </div>
                         <?php
                    }
                }
             }
        }
		else
		{
			$error[]="Invalid Document Format";
		}
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