<aside>	
	<ul>
		<li><a href="<?php echo SITE_URL; ?>"><img src="img/home.png"></a></li>
		<li><a href="categories.php"><img src="img/library.png"></a></li>
        <li id="hamburger"><a href=""><img src="img/menu.png"></a>
            <ul id="submenu">
                <li><a href="">My Profile</a></li>
                <li><a href="">My Articles</a></li>
                <li><a href="">Sub 3</a></li>
            </ul>
        </li>
		<li><a href=""></a></li>
	</ul>
    
    <form method="get" action="<?php echo SITE_URL; ?>search.php">
			<label for="the_phrase" class="screen-reader-text">SEARCH</label>
				<input type="search" name="phrase" id="the_phrase">
				<input type="submit" value="search">
	</form>
</aside>