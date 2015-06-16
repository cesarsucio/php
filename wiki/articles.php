<?php 
require('db-connect.php');
include('includes/header.php');
include('includes/sidebar.php');
session_start(); 
?>

<main id="articles">
<?php

$article_id = $_GET['article_id'];
$user_id = $_SESSION['user_id'];

$query = "	SELECT articles.article_id, articles.date_posted, articles.article_title, articles.article_body, articles.user_id, articles.is_published, articles.allow_comments, articles.category_id,
			users.user_id, users.username, users.user_pic
			FROM articles, users
			WHERE users.user_id = $user_id
			AND articles.user_id - users.user_id";
		$result = $db->query($query);

    if($user_id != ''){
		$cells = $result->fetch_assoc();
            }
		if($result->num_rows > 0){
		?>
			<h2>Current User: <span class="username"><?php echo $cells['username']; ?></span></h2>
			<img src="<?php echo $cells['user_pic'];?> ">
			<h2>Articles written by <span class="username"><?php echo $cells['username']; ?></span></h2>
			<?php			
				while($row = $result->fetch_assoc()){
					?>
					<article>
						<h4><?php echo $row['article_title']; ?></h4>
						<p></p>
					</article>
				<?php
		} //end while
	} //end if
?>

</main>

<?php include('includes/footer.php') ?>