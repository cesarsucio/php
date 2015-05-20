<h2></h2>
<?php echo date('1, F j, Y g:i a'); ?><br />
<?php echo $_SERVER['HTTP_USER_AGENT']; ?><br />
<?php echo $_SERVER['HTTP_HOST']; ?><br />
<?php echo $_SERVER['SERVER_SIGNATURE']; ?><br />
<?php if('localhost' == $_SERVER['HTTP_HOST']){
	echo 'Only do thsi stuff if we\'re looking at the development version';
} ?> <br />
<?php 
	if($status == 'success'){
		echo 'Congrats on your success';
	} else {
		echo 'Sorry, not successful :( ';
	} ?>