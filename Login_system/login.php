<?php 

		include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

	$email = trim($_POST['email']);
	$password = trim($_POST['password']);

	$sql = "SELECT * FROM `users` WHERE email='$email'";
	$result = mysqli_query($db, $sql);
	$num = mysqli_num_rows($result);

	if ($num == 1) {
		while ($row=mysqli_fetch_assoc($result)) {
			if (password_verify($password, $row['password'])){
				echo '<script> alert ("Login Successful")</script>';
			}
			else{
				echo '<script> alert ("wrong")</script>';
			}
		}
	}
	else {
		echo '<script> alert ("Account not found")</script>';
	}

	
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
</head>
<body>
	<div>
		<div>
			<div>
				
				<form action="" method="POST">
					<div>
						<label>Email Address</label>
						<input type="text" name="email" required>
					</div>
					<div>
						<label>Password</label>
						<input type="password" name="password" required>
					</div>
					<div>
						<input type="submit" name="submit" value="Login">
					</div>
					<p>Don't have an accoumt? <a href="register.php">Reister Here</a></p>
				</form>
			</div>
		</div>
		
	</div>

</body>
</html>