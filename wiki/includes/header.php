<?php session_start(); ?>
<!doctype html>
<html>
	<head>
		<meta charset="utf=8">
		<meta name="viewport" content="width=device-width, initial-scale=1"></meta>
		<title><?php echo $row['title']; ?></title>
        <link href="css/reset.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
	</head>
</html>
<header>
<?php
	$user_id = $_SESSION['user_id'];
	$query = "user_id, username, user_pic
           FROM users
	       WHERE user_id = $user_id";
    $result = $db->query($query);
    
    if($result->num_rows > 0){
	$cells = $result->fetch_assoc();
    $username = $cells['username'];
        } ?>

    <a href="<?php echo SITE_URL ?>"><img src="img/hex.png" id="logo"></a>
    <div id="header-headers">
        <h1>IT KnowledgeBase</h1>
        <h4>Your source for the latest tech info</h4>
    </div>
    
    <?php
    echo '<h4>' . $username . '</h4>';
		if($result->num_rows >= 1){
            
            echo '<h4><a href="' . $SITE_URL . 'admin.php?logout"' . 'Logout</a></h4>';
                
			} 
	?>
	
	

</header>