<?php 
	$page = $_GET['page'];
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
			<title>Simple Interface</title>
	</head>
<body class="<?php echo $page; ?>">
	<h1>Simplest interface with Query string Variables</h1>
	<nav>
		<ul>
			<li><a href="index.php?page=home">Home</a></li>
			<li><a href="index.php?page=about">About</a></li>
			<li><a href="index.php?page=gallery">Gallery</a></li>
			<li><a href="index.php?page=contact">Contact</a></li>
		</ul>
	</nav>
	
	<main>
		<?php
			if(strlen($page) == 0){
				include('content-home.php');
				}
			
			switch( $_GET['page'] ){
				case 'home':
				include('content-home.php');
				break;
				case 'about':
				include('content-about.php');
				break;
				case 'gallery':
				include('content-gallery.php');
				break;
				case 'contact':
				include('content-contact.php');
				break;	
			}
		?>
	</main>
</body>
</html>