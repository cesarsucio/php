<?php 
	
function clean_input( $input ){
global $db;
return mysqli_real_escape_string($db, strip_tags( $input ));
}

function convTimestamp($date){
	$year   = substr($date,0,4);
	$month  = substr($date,5,2);
	$day    = substr($date,8,2);
	$hour   = substr($date,11,2);
	$minute = substr($date,14,2);
	$second = substr($date,17,2);
	$stamp =  date('D, d M Y H:i:s O', mktime($hour, $min, $sec, $month, $day, $year));
	return $stamp;
}

function echoUsername($user_id){
	if($user_id != ''){
		echo '<img src="img/profile_min.png">';
	echo '<h4>Hello, <span>' . $user_id . '</span>!</h4>';
	
	}
}