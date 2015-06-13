<?php 
require('db-connect.php');
include('includes/header.php');
include('includes/sidebar.php'); 
session_start();
?>

<main>
	
	<?php 
		$query = "SELECT category_id, category_name
						FROM categories
						WHERE category_id != 4
						ORDER BY category_name ASC";
		$result = $db->query($query);
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
		?>	
		<div class="category">
			<h2><a href="category.php?category_id=<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></a></h2>
		</div>
		<?php } 
	} ?>
	

<?php include('includes/footer.php'); ?>