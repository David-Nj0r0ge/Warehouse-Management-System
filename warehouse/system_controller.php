<?php
class USER
{
	private $db;

	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}
		public function testinput($data)
	{
		$data = htmlspecialchars($data);
		$data=stripslashes($data);
		$data=trim($data);
		return $data;

	}
	public function receive_container($owner,$cont_id,$block_nam)
	{
		try
		{
			//$new_password = MD5($pass);
			$stmt2=$this->db->prepare("SELECT * FROM received_conts WHERE cont_id=:id");
			$stmt2->bindParam(":id",$cont_id);
			$stmt2->execute();
			if($stmt2->rowCount()>0)
			{
				?>
				<div class="animated swing alert alert-danger alert-dismissal w3-win-phone-red w3-padding-16">
				 <?php echo $cont_id  ?> already Received
				</div>
				<?php
			}
			else
			{
			$stmt = $this->db->prepare("INSERT INTO received_conts(owner,cont_id,block_nam)
		                                               VALUES(:owner,:cont_id,:block_nam)");

			$stmt->bindparam(":owner", $owner);
			$stmt->bindparam(":cont_id", $cont_id);
		    $stmt->bindparam(":block_nam", $block_nam);
			$stmt->execute();

			return $stmt;
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	public function add_payments($mpesa_code,$owner,$amount_paid,$balance,$total_payable,$cont_cod)
	{
		try
		{
			
			$stmt = $this->db->prepare("INSERT INTO payments(mpesa_code,owner,amount_paid,balance,total_payable,cont_cod)
		                                               VALUES(:mpesa_code,:owner,:amount_paid,:balance,:total_payable,:cont_cod)");

			$stmt->bindparam(":mpesa_code", $mpesa_code);
			$stmt->bindparam(":owner", $owner);
		    $stmt->bindparam(":amount_paid", $amount_paid);
			$stmt->bindparam(":balance", $balance);
			$stmt->bindparam(":total_payable", $total_payable);
			$stmt->bindparam(":cont_cod", $cont_cod);
			$stmt->execute();

			return $stmt;
			
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function add_plans($plan_name,$cost)
	{
		try
		{
			//$new_password = MD5($pass);
			$stmt2=$this->db->prepare("SELECT * FROM charge_plans WHERE plan_name=:nam");
			$stmt2->bindParam(":nam",$plan_name);
			$stmt2->execute();
			if($stmt2->rowCount()>0)
			{
				?>
				<div class="animated swing alert alert-danger alert-dismissal w3-win-phone-red w3-padding-16">
				 <?php echo $plan_name  ?>  Charge Plan Already Exists
				</div>
				<?php
			}
			else
			{
			$stmt = $this->db->prepare("INSERT INTO charge_plans(plan_name,cost)
		                                               VALUES(:plan_name,:cost)");

			$stmt->bindparam(":plan_name", $plan_name);
			$stmt->bindparam(":cost", $cost);
		
			$stmt->execute();

			return $stmt;
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	public function add_block($block_name,$no_containers)
	{
		try
		{
			//$new_password = MD5($pass);
			$stmt2=$this->db->prepare("SELECT * FROM blocks WHERE block_name=:nam");
			$stmt2->bindParam(":nam",$block_name);
			$stmt2->execute();
			if($stmt2->rowCount()>0)
			{
				?>
				<div class="animated swing alert alert-danger alert-dismissal w3-win-phone-red w3-padding-16">
				 <?php echo $block_name  ?>  name already exists try different one
				</div>
				<?php
			}
			else
			{
			$stmt = $this->db->prepare("INSERT INTO blocks(block_name,no_containers)
		                                               VALUES(:block_name,:no_containers)");

			$stmt->bindparam(":block_name", $block_name);
			$stmt->bindparam(":no_containers", $no_containers);
		
			$stmt->execute();

			return $stmt;
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	public function add_user($user_name,$email,$pass)
	{
		try
		{
			$new_password = MD5($pass);
			$stmt2=$this->db->prepare("SELECT * FROM users WHERE email=:ema");
			$stmt2->bindParam(":ema",$email);
			$stmt2->execute();
			if($stmt2->rowCount()>0)
			{
				?>
				<div class="animated swing alert alert-danger alert-dismissal w3-win-phone-red w3-padding-16">
				 <?php echo $email  ?>  email already exists try different one
				</div>
				<?php
			}
			else
			{
			$stmt = $this->db->prepare("INSERT INTO users(username,email,password)
		                                               VALUES(:user_name,:email,:password)");

			$stmt->bindparam(":user_name", $user_name);
			$stmt->bindparam(":email", $email);
			$stmt->bindparam(":password", $new_password);
			$stmt->execute();

			return $stmt;
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	
	public function book_Space($cont_owner,$owner,$cont_code,$cont_weight,$arrival_date,$product_name,$verification_doc,$origin,$product_type)
	{
		try
		{
			//$new_password = MD5($pass);
			$stmt2=$this->db->prepare("SELECT * FROM container_space_bookings WHERE cont_code=:code");
			$stmt2->bindParam(":code",$cont_code);
			$stmt2->execute();
			if($stmt2->rowCount()>0)
			{
				?>
				<div class="animated swing alert alert-danger alert-dismissal w3-win-phone-red w3-padding-16">
				 <?php echo $cont_code  ?>  Container Code Already Exists
				</div>
				<?php
			}
			else
			{
			$stmt = $this->db->prepare("INSERT INTO container_space_bookings(cont_owner,cont_code,owner,cont_weight,arrival_date,product_name,verification_doc,origin,product_type)
		                                               VALUES(:cont_owner,:cont_code,:owner,:cont_weight,:arrival_date,:product_name,:verification_doc,:origin,:product_type)");

			$stmt->bindparam(":cont_owner", $cont_owner);
			$stmt->bindparam(":cont_code", $cont_code);
			$stmt->bindparam(":owner", $owner);
			$stmt->bindparam(":cont_weight", $cont_weight);
			$stmt->bindparam(":arrival_date", $arrival_date);
			$stmt->bindparam(":product_name", $product_name);
            $stmt->bindparam(":verification_doc", $verification_doc);
			$stmt->bindParam(":origin",$origin);
            $stmt->bindParam(":product_type",$product_type);


			$stmt->execute();

			return $stmt;
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	

	public function user_register($first_name,$last_name,$email,$phone,$status,$pass)
	{
		try
		{
			$new_password = MD5($pass);
			$stmt2=$this->db->prepare("SELECT * FROM users_content WHERE email=:ema");
			$stmt2->bindParam(":ema",$email);
			$stmt2->execute();
			if($stmt2->rowCount()>0)
			{
				?>
				<div class="animated swing alert alert-danger alert-dismissal w3-win-phone-red w3-padding-16">
				 <?php echo $email  ?>  email already exists try different one
				</div>
				<?php
			}
			else
			{
			$stmt = $this->db->prepare("INSERT INTO users_content(first_name,last_name,email,phone_no,status,password)
		                                               VALUES(:first_name,:last_name,:email,:phone_no,:st,:password)");

			$stmt->bindparam(":first_name", $first_name);
			$stmt->bindparam(":last_name", $last_name);
			$stmt->bindparam(":email", $email);
			$stmt->bindparam(":phone_no", $phone);
            $stmt->bindparam(":st", $status);
			$stmt->bindParam(":password",$new_password);



			$stmt->execute();

			return $stmt;
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	public function login($umail,$upass)
	{
		try
		{
			$stmt = $this->db->prepare("SELECT * FROM users_content WHERE email=:ema LIMIT 1");
		    $stmt->bindParam(":ema",$umail);
			$stmt->execute();
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() > 0)
			{
				if($userRow['password']==MD5($upass))
				{
					$_SESSION['user_session'] = $userRow['email'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}

	public function redirect($url)
	{
		header("Location: $url");
	}

	public function logout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}
}
?>
