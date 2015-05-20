<?php
//connect to the database (includes functions and constants) 
require('db-connect.php'); 
$post_id = $_GET['post_id'];

include(SITE_PATH . '/includes/header.php');
include(SITE_PATH . '/includes/parse-comment.php');

?>
	<main>
		<?php  
		$query = "SELECT posts.title, posts.body, posts.date, users.username, posts.post_id, posts.allow_comments, categories.name 
		FROM posts, users, categories
		WHERE posts.is_published = 1
		AND posts.user_id = users.user_id
		AND posts.category_id = categories.category_id
		AND posts.post_id = $post_id
		LIMIT 1";

		//run the query
		   $result = $db->query($query);
		 //check to make sure we got rows from the database
		 if($result->num_rows >=1 ){
		 	//loop through each row in the $results
		 	while($row = $result->fetch_assoc()){
		?>	
		<article>
			<h2>
					<?php echo $row['title']; ?>
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
		<?php mmc_list_comments($post_id); ?>
        <?php //show form
                if($row['allow_comments']){
                    include(SITE_PATH . '/includes/comment-form.php');
                } else {
                    echo 'Comments Closed.';
                } //end if allow_comments
        ?>
		<?php 
			}//end while
			$result->free(); //clears the data
		 ?>
		 <?php 
		}else{
			echo '<h2>Sorry, no post found</h2>';
			}
		  ?>
	</main>
<?php 
include(SITE_PATH.'/includes/sidebar.php');
include(SITE_PATH.'/includes/footer.php');
 ?>	
