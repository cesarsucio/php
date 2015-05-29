<?php
//connect to the database (includes functions and constants) 
require('db-connect.php'); 
include(SITE_PATH.'/includes/header.php');
?>

<main>
	<?php 
	$query = 	   "SELECT users.username, users.date_joined, users.bio, posts.title, posts.date, posts.body, categories.name
					FROM posts, users, categories
					WHERE posts.is_published = 1
					AND posts.user_id = users.user_id
					AND posts.category_id = categories.category_id
					ORDER BY username ASC";
				
	$result = $db->query($query);
	if($result->num_rows >= 1){
		while($row = $result->fetch_assoc()){
		?>
		<article>
			<h2><?php echo strtoupper($row['username']); ?></h2>
			<p>Active Since: <?php echo $row['date_joined']; ?></p>
			<p>Bio: <?php echo $row['bio']; ?></p>
		</article>



	<?php
		}
	}
	
	?>
	
</main>

<?php
include(SITE_PATH.'/includes/sidebar.php');
include(SITE_PATH.'/includes/footer.php');
 ?>	