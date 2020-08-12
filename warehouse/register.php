<?php
require_once('db_config.php');
 $error = array();
if(isset($_POST['first']) && isset($_POST['last']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['pass']) && isset($_POST['pass2']))
{
  $first = $user->testinput($_POST['first']);
  $last = $user->testinput($_POST['last']);
  $email = $user->testinput($_POST['email']);
  $phone = $user->testinput($_POST['phone']);
  $pass1 = $user->testinput($_POST['pass']);
  $pass2 = $user->testinput($_POST['pass2']);
  $status = "null";
  if(!empty($first) && !empty($last) && !empty($email) && !empty($phone) && !empty($pass1) && !empty($pass2))
  {
   
    
    if(!ctype_alpha($first))
    {
        $error[]="Invalid Firstname,can only contain alphabetic characters";
    }
    else if(strlen($first)<3)
    {
        $error[]="Firstname Too short";
    }
     else if(!ctype_alpha($last))
    {
        $error[]="Invalid Lastname,can only contain alphabetic characters!!!!";
    }
    else if(strlen($last)<3)
    {
        $error[]="Lastname Too short!!!!";
    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $error[] = "Please Enter A Valid Email!!!!!";
    }
    else if(!is_numeric($phone))
    {
        $error[] = "Please Enter A Valid Phone Number!!!!";
    }
    else if(strlen($phone)<10)
    {
        $error[] = "Phone Number Too Short!!!!";
    }
    else if(strlen($phone) < 10)
    {
        $error[] = "Phone Too Long!!!!";
    }
    else if(strlen($pass1)<7)
    {
      $error[]  = "Password Too Short";
    }
    else if($pass1 != $pass2)
    {
      $error[] = "Password Mismatch";
    }
    
    else if($user->user_register($first,$last,$email,$phone,$status,$pass1))
    {
      echo "ok";
    }
    
    
    
    
  }
  else
  {
     $error[]="Fill in All The Fields First";
  }
}
else
{
    ?>
    <div class="alert alert-danger w3-padding-16 w3-win-phone-red alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong class="w3-text-red ">Not All Fields Are Set Set Them First!</strong> 
</div>
    <?php
}
    foreach($error as $err)
      {
        ?>
         <div class="alert alert-danger  w3-padding-16 w3-win-phone-red alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong><?php echo $err ;?></strong> 
</div>
        <?php
      
    }
?>