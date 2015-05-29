<?php
//connect to the database (includes functions and constants) 
require('db-connect.php'); 
$cat_id = $_GET['cat_id'];
include(SITE_PATH.'/includes/header.php');
?>

<main>
	<?php 
	$query = 	   "SELECT users.username, posts.title, posts.date, posts.body, categories.name, categories.category_id
					FROM posts, users, categories
					WHERE posts.is_published = 1
					AND posts.user_id = users.user_id
					AND posts.category_id = categories.category_id
					AND posts.category_id = $cat_id
					ORDER BY username ASC";
				
		   $result = $db->query($query);
		 //check to make sure we got rows from the database
		 if($result->num_rows >=1 ){
		 	//loop through each row in the $results
		 	while($row = $result->fetch_assoc()){
		?>	
		<article>
			<h2>
				<a href="single.php?post_id=<?php echo $row['post_id'];  ?>">
					<?php echo $row['title']; ?>
				</a>
			</h2>
			<p>
				<?php echo $row['body']; ?>
			</p>
			<footer class="post-info">
				<span class="author">
					Posted by <?php echo $row['username']; ?>
				</span>	
				<time class="date" datetime="<?php echo $row['date']; ?>">
					on <?php echo convert_date($row['date']); ?>
				</time>
				<span class="category">
					in the category <?php echo $row['name']; ?>
				</span>
				<span class="comments-number">
					<?php count_comments($row['post_id']); ?>
				</span>

			</footer>
		</article>
		<?php 
			}//end while
			$result->free(); //clears the data
		 ?>
		 <?php 
		}else{
			echo '<h2>Sorry, no posts found</h2>';
			}
		  ?>

	</main>
<?php 
include(SITE_PATH.'/includes/sidebar.php');
include(SITE_PATH.'/includes/footer.php');
 ?>	
