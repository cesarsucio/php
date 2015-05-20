<!-- Finish the code below to display the message if the user’s age is at least 21 -->

<?php
$message = ‘hooray!  You are over 21’;
$age = $_GET[‘age’];
if($age > 21) {
	echo $message;
	}
?>


<!-- Finish the code below to redirect the user to the file ‘secret-page.php’ if they are logged in. The session variable ‘loggedin’ will be true if they are logged in. -->

<?php
session_start();
$logged_in = $_SESSION[‘loggedin’];
if($logged_in){
	header('Location:secret-page.php');
	}
?>


<!-- Finish the code below to display a success message if the score is higher than the high score. otherwise, show an error message. -->

<?php
$score = $_COOKIE[‘score’];
$high_score = 45,897,146,526; 
if($score > $high_score){
	echo 'CONGRATS!!!';
	} else echo 'FAIL!!!';

?>

<!-- Finish the code below to display a different message for each day of the week.  ( use php.net to look up what date(’w’) means) -->

<?php 
$day = date(‘w’);
switch ($day) {
    case 0:
        echo 'Today was a good day';
        break;
    case 1:
        echo 'I didn\'t even have to use my AK.';
        break;
    case 2:
        echo 'Momma cooked the breakfast with no hog';
        break;
	case 3: 
		echo 'So deep put her ass to sleep';
	    break;
	case 4:
		echo 'I do not know this whole song.';
		break;
	case 5:
		echo 'Remember blimps?';
		break;
	case 6: 
		echo 'Ice Cube was a completely different man twenty years ago.';
		break;
	default: 
		echo 'lolwut';
}

?>

<!-- Finish the code below. The vote represents whether a user answered ‘yes’ or ‘no’.
Add one to the count if the vote is ‘yes’. Add one to the total regardless of whether the user voted ‘yes’ or ‘no’.  -->

<?php
$vote = $_GET[‘vote’];
$count = 0;
$total = 0; 

if ($vote == 'yes'){
	$count++;
} 

$total++;

?>