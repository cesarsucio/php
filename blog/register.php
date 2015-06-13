<?php
require('db-connect.php');

if($_POST['did_register']){
	$username 	= clean_input( $_POST['username'] );
	$email 		= clean_input( $_POST['email'] );
	$password 	= clean_input( $_POST['password'] );
	$terms 		= $_POST['policy'];

$valid = true;

	if(strlen($username) < 5 OR strlen($username) > 20){
		
		$message = "Please enter a valid username.<br />";
		$valid = false;
	}
	
	if(strlen($password) < 8){
		$message .= " Please enter a valid password.<br />";
		$valid = false;
	}
	
	if($terms != 1){
		$message .= "Please check the box indicating you read the Terms of Service.<br /><br />";
		$valid = false;
	}
	
		$username_check = 	"SELECT username
					 	 	 FROM users
					 		 WHERE username = '$username'";
							  
		$user_result = $db->query($username_check);
		
		if($user_result->num_rows >= 1){
			$valid = false;
			$message .= "Username already exists!<br />";
		}
		
		$email_check = 		"SELECT email
					 		 FROM users
					 		 WHERE email = '$email'";
							  
		$email_result = $db->query($email_check);
		
		if($email_result->num_rows >= 1){
			$valid = false;
			$message .= "Email address taken!<br />";
		}
	
	if($valid){
		$query = "INSERT INTO users
		(username, email, password, date_joined)
		VALUES
		('$username', '$email', sha1('$password'), now())";
		
		$result = $db->query($query);
		if($db->affected_rows == 1){
			$message = 'SUCCESSFULLY REGISTERED!!!';
		}
	}

} //end if


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sign up for an account</title>
	<link rel="stylesheet" type="text/css" href="css/login-style.css">
</head>
<body class="register">
	<main>
	<h1>Create an account</h1>
	<?php
		if(isset($message)){
			echo $message;
		}	
	?>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<label>Create a username:</label>
		<input type="text" name="username">

		<label>Email Address:</label>
		<input type="email" name="email">

		<label>Create your password:</label>
		<input type="password" name="password">

		<label>
			<input type="checkbox" name="policy" value="1">
			I agree to the <a href="#" target="_blank">Terms of Service</a>
		</label>

		<input type="submit" value="Sign Up!">
		<input type="hidden" name="did_register" value="1">
	</form>
</main>
</body>
</html>