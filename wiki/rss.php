<?php 
require('db-connect.php');
//this has to be echoed because the <? characters confuse the PHP parser
echo '<?xml version="1.0" encoding="utf-8"?>';
?>
	
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
	<channel>
		<title>IT Wiki&#8217;s Article Feed</title>
		<link><?php echo SITE_URL; ?></link>
		<description>Information Technology KnowledgeBase</description>
		<language>en-us</language>
		<atom:link href="<?php echo SITE_URL; ?>rss.php" rel="self" type="application/rss+xml" />
		<?php  
		//get newest 10 published articles
	
		$query ="SELECT articles.*, users.user_id, users.user_email, users.username 
		FROM articles, users 
		WHERE is_published = 1
		AND articles.user_id = users.user_id
		ORDER BY date_posted DESC 
		LIMIT 10";
		
		$result = $db->query($query);
		if($result->num_rows >= 1){
			while($row = $result->fetch_assoc()){
		?>
			<item>
				<title><?php echo $row['article_title']; ?></title>
				<link><?php echo SITE_URL; ?>article.php?article_id=<?php echo $row['article_id']; ?></link>
				<guid><?php echo SITE_URL; ?>article.php?article_id=<?php echo $row['article_id']; ?></guid>
				<author><?php echo $row['email']; ?>(<?php echo $row['username'] ?>)</author>
				<description><![CDATA[ <?php echo $row['article_body']; ?>]]></description>	
				<pubDate><?php echo convTimestamp($row['date_posted']) ?> </pubDate>
			</item>	
			<?php } //end while
			}//end if post found 
			?>
	</channel>
</rss>
