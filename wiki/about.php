<?php 
require('db-connect.php');
include('includes/header.php');
include('includes/sidebar.php'); 
?>

<main>
<?php

$article_id = 4;
$query = "	SELECT article_id, date_posted, article_title, article_body, user_id, is_published, allow_comments, category_id
			FROM articles
			WHERE article_id = $article_id
		";
		
$result = $db->query($query);
$row = $result->fetch_assoc();

$date_posted = $row['date_posted'];
$title = $row['article_title'];
$body = $row['article_body'];
$user_id = $row['user_id'];
$is_published = $row['is_published'];
$allow_comments = $row['allow_comments'];
$category_id = $row['category_id'];

?>
<div id="about_section">
	<h2><?php echo $title; ?></h2>
	<p><?php echo $body; ?></p>	
</div>



	
</main>

<?php include('includes/footer.php') ?>