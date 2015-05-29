<?php
//connect to the database (includes functions and constants) 
require('db-connect.php'); 
include(SITE_PATH.'/includes/header.php');
?>

<main>
	<?php 
	$query = 	   "SELECT links.title, links.url, links.description
					FROM links
					ORDER BY title ASC";
				
	$result = $db->query($query);
	if($result->num_rows >= 1){
		while($row = $result->fetch_assoc()){
		?>
		<article>
			<h2><a href="<?php echo $row['url']; ?>"><?php echo $row['title']; ?></a></h2>
			<p>Description: <?php echo $row['description']; ?></p>
		
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