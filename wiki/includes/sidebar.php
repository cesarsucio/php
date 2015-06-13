<aside>
	
	<form method="get" action="<?php echo SITE_URL; ?>search.php">
			<label for="the_phrase" class="screen-reader-text">SEARCH</label>
				<input type="search" name="phrase" id="the_phrase">
				<input type="submit" value="search">
	</form>
	
	<ul>
		<li><a href="<?php echo SITE_URL; ?>"><img src="<?php echo SITE_URL ?>img/home.png" alt="Home"></a></li>
		<li><a href="<?php echo SITE_URL . 'categories.php'; ?>"><img src="<?php echo SITE_URL ?>img/library.png" alt="Library"></a></li>
		<li><a href=""><img src="<?php echo SITE_URL ?>img/cabinet.png" alt="Shelf"></a></li>
	</ul>
</aside>