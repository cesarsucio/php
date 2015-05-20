<!doctype html>
<head>
	<meta charset="utf-8">
	<title>GET method practice</title>
</head>
<body>
	<?php 
		if($_POST['did_submit']){
		//echo $_GET['name'];
		//echo '. ';
		//echo $_GET['dinner'];
		//echo ' sounds delicious!';
		
		echo 'Hello, ' . $_POST['name'] . '.  ' . $_POST['dinner'] . ' sounds delicious!';
		} else echo 'Form not submitted yet!';
	?>
	
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<label>What is your name?</label>
		<input type="text" name="name" value="<?php echo $name; ?>">
		
		<label>What did you have for dinner?</label>
		<input type="text" name="dinner" value="<?php echo $dinner; ?>">
			
		<input type="submit" value="Send Info">
		<!-- This field will be used to detect whether the form was submitted -->
		<input type="hidden" name="did_submit" value="true">
	</form>
	
</body>
</html>