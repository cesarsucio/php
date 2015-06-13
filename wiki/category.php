<?php 
require('db-connect.php');
include('includes/header.php');
include('includes/sidebar.php'); 
?>

<main>
	<?php 
		$category_id = $_GET['category_id'];
		$query = "		SELECT category_name
						FROM categories
						WHERE category_id = $category_id";
						
		$result = $db->query($query);
		if($result->num_rows >= 1){
			$row = $result->fetch_assoc(); ?>
			<h2><?php echo $row['category_name']; ?></h2>
				<?php	} ?>

		<?php
		$query = 	"	SELECT categories.category_id, categories.category_name, categories.category_description, 
						articles.article_title, articles.is_published,  articles.category_id, articles.article_id
						FROM categories, articles
						WHERE articles.category_id = $category_id
						AND categories.category_id = $category_id
						ORDER BY article_title ASC";		
		$result = $db->query($query);
		
		if($result->num_rows >= 1){ 
			while($row = $result->fetch_assoc()){
					?>

					<article>
						<h3><a href="article.php?article_id=<?php echo $row['article_id']; ?>">
						<?php echo $row['article_title']; ?></a></h3>
					<?php } //end while
				$result->free();
			 } else {
				 echo 'Sorry, no categories found.';
			 }
		?>
<?php include('includes/footer.php'); ?>