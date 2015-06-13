<?php 
require('db-connect.php');
include('includes/header.php');
include('includes/sidebar.php'); 
?>

<main>
<?php

$article_id = 5;
$query = "	SELECT article_id, article_title, article_body, user_id, is_published, category_id
			FROM articles
			WHERE article_id = $article_id
		";
		
$result = $db->query($query);
$row = $result->fetch_assoc();

$title = $row['article_title'];
$body = $row['article_body'];
$user_id = $row['user_id'];
$is_published = $row['is_published'];
$category_id = $row['category_id'];

?>
<div id="privacy_policy">
	<h2><?php echo $title; ?></h2>
	<p><?php echo $body; ?></p>	
</div>
	
</main>

<?php include('includes/footer.php') ?>