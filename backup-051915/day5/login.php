<?php 
	session_start();
	//parse the form if it was submitted
	if( $_POST['did_login'] ){
	//extract the data
	$username = strip_tags( trim($_POST['username'] ) );
	$password = strip_tags( trim($_POST['password'] ) );
	
	//check for correct credentials
	$correct_username = 'boberick';
	$correct_password = 'phprules';
	
	//validate
	$valid = true;
	
	//test to see if username is the right length (5 - 20)
	if( strlen( $username ) <= 5 OR strlen( $username ) >=20 ){
		$valid = false;
	}
	
	//test to see if password wrong length
	if( strlen( $password ) < 8 ){
		$valid = false;
	}
	
	if($valid){
	if( $username == $correct_username && $password == $correct_password){
		$message = 'Success! You are now logged in.';
		//keep them logged in for one week
		setcookie( 'loggedin', true, time() + 60 * 60 * 24 * 7 );
		$_SESSION['loggedin'] = true;
	} else $message = 'Incorrect login info. Try again.'; 
	//keep them logged in for 1 week if login successful
			$message = 'Invalid login info. Try again';
		} // endif valid
		$message = 'Invalid login info. Please try again';
	} // endif 
	
//if the user returns here to logout, destroy all sessions and cookies
if($_GET['logout']){
	session_destroy();
	unset($_SESSION['loggedin']);
	setcookie('loggedin','',time() - 9999999);
}

//if the user returns to this page and they still have a valid cookie, use it to re-create the session	
if($_COOKIE['loggedin'] == true) {
	$_SESSION['loggedin'] = true;
}	
	
//if the user views this page and is logged in, redirect them to admin	
if($_SESSION['loggedin']){
	header('Location:admin.php');
}	

 ?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
			<title>Simple login form with cookies and sessions</title>
	</head>
<body>
	<h1>Log In</h1>
	<?php 
		if(isset($message)){
			echo "<div class='message'>$message</div>";
		}
	?>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

		<label>Username:</label>
		<input type="text" name="username" id="the_username" required>
			
		<label for="the_password">Password:</label>
		<input type="password" name="password" id="the_password" required>
			
		<input type="submit" value="Log In">
		<input type="hidden" name="did_login" value="true">
	</form>
</body>
</html>