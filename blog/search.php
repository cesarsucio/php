<?php
//connect to db
require('db-connect.php');
include(SITE_PATH . '/includes/header.php');

//configure pagination
$per_page = 5; //number of posts per page
$page_number = 1; //default page to start with

//what did the user search for
$phrase = $_GET['phrase'];
?>

<main>
<?php
//get all the published posts that match the search phrase
$query = "
	SELECT post_id, title, body
	FROM posts
	WHERE is_published = 1
	AND (title LIKE '%$phrase%'
	OR body LIKE '%$phrase%' )";
//run the query
$result = $db->query($query);
//make sure one post has been found
$total = $result->num_rows;

if($total >= 1){
//calculate for pagination
//how many pages do we need
$total_pages = ceil($total / $per_page);

//what page are we on
//the url looks like: search.php?phrase=blah&page=2
if($_GET['page']){
	$page_number = $_GET['page'];
}
//make sure we are viewing a valid page
if($page_number <= $total_pages){
	//pagination modify the original query with a LIMIT x, y
	//figure out the offset(x)
	$offset = ($page_number - 1) * $per_page;
	
	$query_modified = $query . " LIMIT $offset, $per_page";
	
	//run modified quert
	$result_modified = $db->query($query_modified);
	?>
<h1>Search Results</h1>
<p class="info"><?php echo $total; ?> results found for <b><?php echo $phrase; ?></b> . 
Showing page <?php echo $page_number;?> of <?php echo $total_pages ?></p>
<?php 
	while($row = $result_modified->fetch_assoc()){?>
	<article>
		<h2><a href="<?php echo SITE_URL ?>/single.php?post_id=<?php echo $row['post_id']; ?>">
		<?php echo $row['title']; ?></a>
		</h2>
		<p>
			<?php echo substr(strip_tags($row['body']), 0, 100); ?>&hellip;
		</p>
	</article>
<?php	
	} //end while
$result->free();
?>
<?php
//set up pagination
$prev_page = $page_number - 1;
$next_page = $page_number + 1;
?>

<section class="pagination">
<?php
//show previous button if not on page 1
if($page_number > 1){?>
<a class="prev button" href="?phrase=<?php echo $phrase ?>&amp;page=<?php echo $prev_page ?>">&larr; Previous</a>
<?php } //end page_number greater than 1 ?>
<?php 
if($page_number < $total_pages){ ?>
<a class="next button" href="?phrase=<?php echo $phrase ?> &amp;page=<?php echo $next_page ?>">Next &rarr;</a>
<?php } //end if $page_number < $total_pages ?>
</section>

<?php	
	} //end if valid page
	else{
		echo 'invalid page';
	}
} // end if posts found ($total)
else{
	echo 'Sorry, no posts match your search terms.';
}?>

</main>

<?php
include(SITE_PATH . '/includes/sidebar.php');
include(SITE_PATH . '/includes/footer.php')
?>