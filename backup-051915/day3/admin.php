<?php
	session_start();
	if( ! $_SESSION['loggedin'] ){
		header('Location:login.php');
		die('You do not have permission to view this page.');
	}	
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
			<title>Admin Panel</title>
	</head>
	<body>
		<h1>Welcome to the admin panel</h1>
		<a href="login.php?logout=true">Log Out</a>
	</body>
</html>