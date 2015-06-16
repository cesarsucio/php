<?php
	session_start();
	session_destroy();
	echo 'Logged Out';
	header('Location:index.php');