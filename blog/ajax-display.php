<?php
/*
* Display Output for AJAX demo
* This file stays on the server and handles
* getting hte posts for our interface
* not that it as no doctpe and is not intended to standalone
*/

require('db-connect.php');

//which user should we get the posts for
$user_id = $_GET['user_id'];

//get the published posts for that user
$query = "	SELECT title, body
			FROM posts
			WHERE is_published = 1
			AND user_id = $user_id
			ORDER BY date DESC";
$result = $db->query($query);
if($result->num_rows >= 1){
	//display posts
	while($row = $result->fetch_assoc()){ ?>
		<article>
			<h2><?php echo $row['title']; ?></h2>
			<p><?php echo $row['body']; ?></p>
		</article>
	<?php
	}
} else {
	echo '<h1>This user has not written any posts.</h1>';
}













//no close PHP