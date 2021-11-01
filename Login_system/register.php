<?php 

	include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

	$fullname = trim($_POST['name']);
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);
	$confirm_password = trim($_POST['confirm_password']);
	$password_hash = password_hash($password, PASSWORD_BCRYPT);
	/*$password_hash = password_hash($password, PASSWORD_ARGON2I);*/
	//$password_hash = ($password);

	$sql = "SELECT * FROM `users` WHERE email='$email'";
	$result = mysqli_query($db, $sql);
	$rstset = mysqli_num_rows($result);

	if ($rstset == 1) {
		while ($row=mysqli_fetch_assoc($result)) {
			echo '<script> alert ("The email is already registered")</script>';
		}
	}
	else{
		if (strlen("$password") < 8 ) {
		echo '<script> alert ("Password must have atleast 8 chasacters")</script>';			
		}
		else{
			if (empty($confirm_password)) {
		}
		else {
			if (empty($error) && ($password != $confirm_password)) {
				echo '<script> alert ("Password did npt match")</script>';
			}
			else {
				$insertQuery = $db->prepare("INSERT INTO users (name, email, password) VALUES (?,?,?);");
				$insertQuery->bind_param("sss", $fullname, $email, $password_hash);
				$result = $insertQuery->execute();
				if ($result) {	
					echo '<script> alert ("Registered Successf ully")</script>';		
				}
				else {
					echo '<script> alert ("Try again")</script>';	
				}
			}

		}
		}
		

				
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register</title>
</head>
<body>
	<div>
		<div>
			<div>
				<form action="" method="POST">
					<div>
						<label>Full Name</label>
						<input type="text" name="name" required>
					</div>
					<div>
						<label>Email Address</label>
						<input type="text" name="email" required>
					</div>
					<div>
						<label>Password</label>
						<input type="password" name="password" required>
					</div>
					<div>
						<label>Confirm Password</label>
						<input type="password" name="confirm_password" required>
					</div>
					<div>
						<input type="submit" name="submit"  value="Submit">
					</div>
					<p>Already have an account> <a href="login.php">Login Here</a>.</p>
				</form>
				
			</div>
			
		</div>
		
	</div>

</body>
</html>