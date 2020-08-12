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
        $data = stripcslashes($data);
        $data = trim($data);
        return $data;
    }
    public function registerStudents($f_name,$surname,$l_name,$id_no,$phone_no,$email,$photo,$status)
    {
        try
        {
            //$reg_no = "SCT-"  . rand() . "/2018";
            //$email = $surname . $f_name . "@students";
           $stmt1 = $this->db->prepare("SELECT * FROM student_details WHERE reg_no =:reg_no");
           $stmt1->bindParam(":reg_no",$reg_no);
           $stmt1->execute();
           if($stmt1->rowCount()>0)
           {
            ?>
				<div class="animated swing alert alert-danger alert-dismissal w3-win-phone-red w3-padding-16">
				 <?php echo $reg_no ?> number already Assigned
				</div>
				<?php
           }
           else
           {
            $stmt2=$this->db->prepare("INSERT INTO student_details(f_name,surname,l_name,reg_no,
                                      id_no,phone_no,email,dob,photo,course,year,sem,school,dept,guardian_name,
                                      guardian_phone,status)VALUES(:f_name,:surname,:l_name,:reg_no,
                                      :id_no,:phone_no,:email,:dob,:photo,:course,:year,:sem,:school,:dept,:guardian_name,
                                      :guardian_phone,:status)");
            
            $stmt2->bindParam(":f_name",$f_name);
            $stmt2->bindParam(":surname",$surname);
            $stmt2->bindParam(":l_name",$l_name);
            $stmt2->bindParam(":reg_no",$reg_no);
            $stmt2->bindParam(":id_no",$id_no);
            $stmt2->bindParam(":phone_no",$phone_no);
            $stmt2->bindParam(":email",$email);
            $stmt2->bindParam(":dob",$dob);
            $stmt2->bindParam(":photo",$photo);
            $stmt2->bindParam(":course",$course);
            $stmt2->bindParam(":year",$year);
            $stmt2->bindParam(":sem",$sem);
            $stmt2->bindParam(":school",$school);
            $stmt2->bindParam(":dept",$dept);
            $stmt2->bindParam(":guardian_name",$guardian_name);
            $stmt2->bindParam(":guardian_phone",$guardian_phone);
            $stmt2->bindParam(":status",$status);

            $stmt2->execute();
            return $stmt2;
           }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function add_users($email,$reg_no,$password)
    {
        $new_password = md5($password);
        try
        {
            $stmt3=$this->db->prepare("INSERT INTO users_content(email,reg_no,password)
                                      VALUES(:email,:reg_no,:password)");
            $stmt3->bindParam(":email",$email);
            $stmt3->bindParam(":reg_no",$reg_no);
            $stmt3->bindParam(":password",$new_password);
            $stmt3->execute();
            return $stmt3;
        }
        catch(PDOException $e)
        {
            echo $e-getMessage();
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