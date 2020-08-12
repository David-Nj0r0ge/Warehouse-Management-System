<?php
require_once('db_config.php');
if(!$user->is_loggedin())
{
	$user->redirect('login.php');
}
else
{
    $user_id = $_SESSION['user_session'];
    $stmt=$DB_con->prepare("SELECT * FROM users_content WHERE email =:ema");
    $stmt->bindParam(":ema",$user_id);
    $stmt->execute();
    $results=$stmt->fetch(PDO::FETCH_ASSOC);
    if($results['email'] =="admin@global.co.ke")
    {
        $user->redirect('container_dashboard.php');
    }
    else
    {
        $user->redirect('client_dashboard.php');
    }
   
}
?>
