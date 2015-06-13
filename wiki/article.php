<?php 
require('db-connect.php');
include('includes/header.php');
include('includes/sidebar.php');
session_start();
?>

<main>
<?php

$article_id = $_GET['article_id'];
$query = "	SELECT article_id, date_posted, article_title, article_body, user_id, is_published, allow_comments, category_id
			FROM articles
			WHERE article_id = $article_id
			LIMIT 1";
		
		$result = $db->query($query);
		
		if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					?>
					<article>
						<h2><?php echo $row['article_title']; ?></h2>
						<p><?php echo $row['article_body']; ?></p>
					</article>
				<?php
		} //end while
	} //end if
?>

</main>

<?php include('includes/footer.php') ?>