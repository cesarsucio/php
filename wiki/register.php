<?php 
require('db-connect.php');
include('includes/header.php');
include('includes/sidebar.php'); 
?>

<main>
<?php
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
		
		$email_check = 		"SELECT user_email
					 		 FROM users
					 		 WHERE user_email = '$email'";
							  
		$email_result = $db->query($email_check);
		
		if($email_result->num_rows >= 1){
			$valid = false;
			$message .= "Email address taken!<br />";
		}
	
	if($valid){
		$query = "INSERT INTO users
		(username, user_email, user_password, date_joined)
		VALUES
		('$username', '$email', sha1('$password'), now())";
		
		$result = $db->query($query);
		if($db->affected_rows == 1){
			$message = 'SUCCESSFULLY REGISTERED!!!';
		}
	}

} //end if


?>
	<h2>Create an account</h2>
	
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="register_form">
		<label for="username">Choose a Username:</label>
			<input type="text" name="username" value="<?php echo $username; ?>" size="50">

		<label>Email Address:</label>
			<input type="email" name="email" value="<?php echo $email; ?>" size="50">

		<label>Create your password:</label>
			<input type="password" name="password">

		<label>I agree to the <a href="#" target="_blank">Terms of Service</a></label>
			<input type="checkbox" name="policy" value="1">

			<input type="submit" value="Sign Up!">
			<input type="hidden" name="did_register" value="1">
	</form>
	
	<?php
		if(isset($message)){
			echo '<br /><br /><br />' . $message;
		}	
	?>

<?php include('includes/footer.php'); ?>