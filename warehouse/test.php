<!DOCTYPE html>
	<html>
		<head>
			<link rel="stylesheet" href="css/style1.css" type="text/css">
			<title>TEST | HTML</title>
		</head>
		<body>
			<div class="form">
				<?php
				if(isset($_POST['user_name']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['phone_no']))
				{
					$user=$_POST['user_name'];
					$email=$_POST['email'];
					$pass=$_POST['pass'];
					$phone=$_POST['phone'];
				}
				?>
				<h1 style="font-family: fantasy;font-size: 24px;text-align: center;text-transform:uppercase;border-bottom: 2px dashed #FFFFFF;">FORM DETAILS REGISTRATION</h1>
				<form method="POST" action="form.php">
					<div class="field">
						<label>Username</label>
						<br>
						<input type="text" name="username"  placeholder="Username" required/> 
					</div>
					<div class="field">
						<label>Email</label>
						<br>
						<input type="email" name="email"  placeholder="Email" required/> 
					</div>
					<div class="field">
						<label>Password</label>
						</br>
						<input type="password" name="pass"  placeholder="Password" required/> 
					</div>
					<div class="field">
						<label>Phone Number</label>
						<br>
						<input type="number" name="phone_no"  placeholder="Phone Number" required/> 
					</div>
					<div class="field5">
						
						<button type="submit" > Submit</button>
					</div>
				</form>
			</div>
		</body>
	</html>