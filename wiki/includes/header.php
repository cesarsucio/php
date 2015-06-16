<?php 
    session_start();
    include('db-connect.php');
    
    //if the user returns here to log out, destroy all sessions and cookies
        if( $_GET['logout'] ){
	      echo 'LOGOUT';
            }
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf=8">
		<meta name="viewport" content="width=device-width, initial-scale=1"></meta>
		<title><?php echo $row['article_title']; ?></title>
        <link href="css/reset.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
	</head>
</html>
<header>
<?php 
	$user_id = $_SESSION['user_id'];
	$query = "SELECT user_id, username
                FROM users
	           WHERE user_id = '$user_id'
               LIMIT 1";
    $result = $db->query($query);
    $row = $result->fetch_assoc();
    ?>
    <a href="<?php echo SITE_URL ?>"><img src="img/hex.png" id="logo"></a>
    <div id="header-headers">
        <h1>IT KnowledgeBase</h1>
        <h4>Your source for the latest tech info</h4>
        <h4><?php echoUsername($row['username']);
        ?></h4>
    </div>
    
</header>