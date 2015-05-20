<?php
//custom helper functions for our site

//display an array as an HTML unordered list
function mmc_array_list( $array ){
	//check to make sure the array exists
	if( is_array( $array ) ){
		echo '<ul>';
		//output one list item per index in the array
		foreach( $array as $item ){
			echo '<li>' . $item . '</li>';
		}
		echo '</ul>';
	}  
}

//help make select dropdown sticky
function mmc_selected( $thing1, $thing2 ){
	if( $thing1 == $thing2 ){
		echo 'selected';
	}
}