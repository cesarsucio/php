	<aside class="sidebar">
<?php 
//get title, and post_id
	$query = "SELECT title, post_id
		      FROM posts
		      WHERE is_published = 1
		      ORDER BY date DESC
		      LIMIT 5";
//run the query
		      $result = $db->query($query);
		      //see if there are rows.... there should be
		      if($result->num_rows >= 1){
 ?>
		<section>
			<h2>Latest Posts</h2>
			<ul>
				<?php //output each post as a list item
				while($row = $result->fetch_assoc()){
				 ?>
				<li>
					<a href="#"><?php echo $row['title']; ?></a> 
					<?php count_comments($row['post_id']); ?>
				</li>	
				<?php }//end while
				$result->free(); ?>
			</ul>
		</section>
<?php }//end if posts are found ?>
<?php  
	$query = "SELECT category_id, name 
			  FROM categories
			  ORDER BY RAND()";
			  $result = $db->query($query);

	//check for rows
	if($result->num_rows >= 1){
?>
		<section>
			<h2>Post Categories</h2>
			<ul>
				<?php  //output each category as a list item
				while ( $row = $result->fetch_assoc()) {
				 ?>
				<li>
					<a href="#"><?php echo $row['name']; ?></a>
					<?php count_posts_in_category($row['category_id']); ?>
				</li>	
				<?php } //end while 
					$result->free();
				?>
			</ul>
			<?php } //end if categories ?>
		</section>
		<?php 
//get the titles and URLs of up to 10 links  
$query	 = "SELECT title, url 
			FROM links 
			LIMIT 10";
$result = $db->query($query);
if( $result->num_rows >= 1 ){ ?>

	<section>
		<h2>Links</h2>
		<ul>
			<?php while( $row = $result->fetch_assoc() ) { ?>
			<li>
				<a href="<?php echo $row['url']; ?>">
					<?php echo $row['title'] ?>
				</a>
			</li>
			<?php } //end while
			$result->free(); ?>
		</ul>
	</section>

<?php } //end if links ?>
	</aside>
