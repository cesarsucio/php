<?php 
	if($_POST['did_submit']){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$reason = $_POST['reason'];
		$message = $_POST['message'];
		$IP = $_SERVER['REMOTE_ADDR'];
	
	//TODO: Validation
	
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
		}
	 ?>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];  ?>">
	<ol>
		<li>
			<label>Name:</label>
			<input type="text" name="name" id="the_name">
		</li>
		<li>
			<label>Email:</label>
			<input type="email" name="email" id="the_email">
		</li>
		<li>
			<label for="the_phone">Phone Number:</label>
			<input type="tel" name="phone" id="the_phone">
		</li>
		<li>
			<label for="the_reason">How can I help you?</label>
			<select name="reason" id="the_reason">
				<option>Choose One:</option>
				<option value="help">I need help</option>
				<option value="hi">I just want to say hi</option>
				<option value="website issue">I found an issue on your site</option>
			</select>
		</li>
		<li>
			<label for="the_message">Your message:</label>
				<textarea name="message" id="the_message"></textarea>
		</li>
		<li>
			<input type="submit" Value="Send Message">
			<input type="hidden" name="did_submit" value="1">
		</li>
	</ol>
	</form>
	
	
</body>
</html>