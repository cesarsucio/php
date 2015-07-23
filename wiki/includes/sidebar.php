<aside>
	<?php 
	session_start();
    include(SITE_PATH . 'db-connect.php');
	$user_id = $_SESSION['user_id'];

	$query = "SELECT user_id, username
                FROM users
	           WHERE user_id = '$user_id'
               LIMIT 1";
    $result = $db->query($query);
	if($result->num_rows > 0){
		$row = $result->fetch_assoc();
	}
	
	?>	

	<ul>
		<li><a href="<?php echo SITE_URL; ?>"><img src="img/home.png"></a></li>
		<li><a href="categories.php"><img src="img/library.png"></a></li>
        <?php
			if(isset($row)){
				?>
				<li id="hamburger"><a href="logout.php"><img src="img/logout.png"></a></li>	
			<?php } else { ?>
				<li id="hamburger"><a href="admin.php"><img src="img/login.png"></a></li>
			<?php }	?>
	</ul>

    <form method="get" action="<?php echo SITE_URL; ?>search.php">
			<label for="the_phrase" class="screen-reader-text">SEARCH</label>
				<input type="search" name="phrase" id="the_phrase">
				<input type="submit" value="search">
	</form>
</aside>