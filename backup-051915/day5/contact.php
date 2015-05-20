<?php
	include_once( 'functions.php' );
	//parse the form if it was submitted 
	if($_POST['did_submit']){
		$name = filter_var( $_POST['name'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW );
		$email = filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL );
		$phone = filter_var( $_POST['phone'], FILTER_SANITIZE_NUMBER_INT );
		$reason = filter_var( $_POST['reason'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW );
		$message = filter_var( $_POST['message'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW );
		
		$IP = $_SERVER['REMOTE_ADDR'];
		
		//validation
		$valid = true;
		
		//tes: is name blank
		if( strlen( $name ) == 0 ) {
			$valid = false;
			$errors['name'] = 'Please fill in the name field.';
		}
		
	//test is email invalid
	if( ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ){
		$valid = false;
		$errors['email'] = 'Please provide a valid email address, like bob@gmail.com';
	}
	
	//is the reason not one of the supplied values
	$allowed_reasons = array( 'help', 'hi', 'website issue' );
	if( ! in_array($reason, $allowed_reasons) ){
		$valid = false;
		$errors['reason'] = 'Please choose a reason for contacting me.';
	}
	
	//is message blank
	if( strlen($message) == 0 ){
		$valid = false;
		$errors['message'] = 'Please fill in the message area.';
	}
		
		
	if( $valid ){	
	//prepare to send mail
	$to = 'cesarjesparza@gmail.com';
	$subject = "A PHP contac form submission from $name";
	
	$body = "From: $name \n";
	$body .= "Email Address: $email \n";
	$body .= "Phone Number: $phone \n\n";
	$body .= "Reason for contact: $reason \n\n";
	$body .= "IP Address: $IP \n\n";
	$body .= "Message: $message";
	
	$headers = "CC: $email \r\n";
	$headers .= "Reply-to: $email";
	
	$mail_sent = mail( $to, $subject, $body, $headers );
	}
	
		if( $mail_sent ){
				$feedback = 'Thank you for contacting me, I will be in touch.';
				$css_class = 'success';
			} 
			else { $feedback = 'Something went wrong, your message wasn\'t sent.';
			$css_class = 'error'; }
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Contact Me</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Contact Me</h1>
	<p>Please take a moment to get in touch...</p>
	
	<?php 
		if( isset($feedback) ){
			echo "<div class='$css_class'>$feedback</div>";
			mmc_array_list( $errors );
		}
	 ?>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];  ?>">
	<ol>
		<li>
			<label>Name:</label>
			<input type="text" name="name" id="the_name" value="<?php echo $name ?>">
		</li>
		<li>
			<label>Email:</label>
			<input type="email" name="email" id="the_email" value="<?php echo $email ?>">
		</li>
		<li>
			<label for="the_phone">Phone Number:</label>
			<input type="tel" name="phone" id="the_phone" value="<?php echo $phone ?>">
		</li>
		<li>
			<label for="the_reason">How can I help you?</label>
			<select name="reason" id="the_reason">
				<option>Choose One:</option>
				<option value="help" <?php mmc_selected( $reason, 'help' ) ?>>I need help</option>
				<option value="hi" <?php mmc_selected( $reason, 'hi' ) ?>>I just want to say hi</option>
				<option value="website issue" <?php mmc_selected( $reason, 'website issue' ) ?>>I found an issue on your site</option>
			</select>
		</li>
		<li>
			<label for="the_message">Your message:</label>
				<textarea name="message" id="the_message"><?php echo $message ?></textarea>
		</li>
		<li>
			<input type="submit" Value="Send Message">
			<input type="hidden" name="did_submit" value="1">
		</li>
	</ol>
	</form>
	
	
</body>
</html>