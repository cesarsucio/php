<?php include('admin-header.php'); ?>

<main>
<?php
		$user_id = $_GET['user_id'];
	
		echo $query = 
				"SELECT user_id, username, password, email, userpic, bio
				 FROM users
				 WHERE user_id = $user_id";
				 
		$result = $db->query($query);
		$row = $result->fetch_assoc();
		
		if($_POST['did_post']){
			//sanitize all user input
			$username 			= clean_input($_POST['username']);
			$email 				= clean_input($_POST['email']);
			$bio 				= clean_input($_POST['bio']);
			$password 			= clean_input($_POST['password']);

				$query = "UPDATE users
					SET
					username = '$username',
					email = '$email',
					bio = '$bio',
					password = '$password'
					WHERE user_id = $user_id
					";
					
				$result = $db->query($query);
				if($db->affected_rows >= 1){
				$message = 'Updated Successfully';
					}
					if(isset($message)){
						echo $message;
					}
		}


	?>

		<h2><?php echo $row['username']; ?>'s Dashboard</h2>
		<section class="onehalf panel">

			<h2>Profile Information</h2>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<label>Username</label>
				<input type="text" name="username" value="<?php echo $row['username']; ?>">
				<label>Email Address:</label>
				<input type="text" name="email" value="<?php echo $row['email']; ?>">
				<label>Bio</label>
				<input type="text" name="bio" value="<?php echo $row['bio']; ?>">			
				<label>Update Password</label>
				<input type="text" name="password" value="********">
				<input type="submit">
			</form>
	</main>

<?php include('admin-footer.php'); ?>