<?php
/**
 * Convert MySQL datetime format into a human-friendly display date
 * @param  string $date the datetime string like 2015-05-13 19:00:43
 * @return  string a nice looking date like May 13, 2015
 * @since  day 7
 */

function convert_date($uglydate){
	$date = new DateTime($uglydate);
	$nicedate = $date->format('F j Y');
	return $nicedate;
}

/**
 * Count the number of comments for any post
 * @param  int $post_id //any valid post_id to count comments
 * @since Day 8
 */
function count_comments($post_id){
	//access the $db connection from outside this function
	global $db;

	//count all published comments on $post_id
	$query = "SELECT COUNT(*) AS total 
			  FROM comments 
			  WHERE is_approved = 1
			  AND post_id = $post_id";
	$result = $db->query($query);
	//check to make sure we have data COUNT should return one row
	if( $result->num_rows == 1){
		while($row = $result->fetch_assoc()){
			echo $row['total'];
		}
		$result->free();
	}
}

/**
 * Count the number of published posts in any category
 * @param  int $cat_id in any valid category_id
 * @since  Day 8 
 */

function count_posts_in_category($cat_id){
	global $db;
	$query = "SELECT COUNT(*) AS total 
			  FROM posts
			  WHERE category_id = $cat_id
			  AND is_published = 1";

$result = $db->query($query);
//check to see if we get results
if($result->num_rows == 1){
	$row = $result->fetch_assoc();
	echo '('. $row['total'] .')';
    $result->free();
   }
}

/**
 * Display comments for any posts in a list
 * @param  int $post_id - the post you want to show comments for
 * @since  Day 9
 */

function mmc_list_comments($post_id){
global $db;
//get comments from post
$query = "SELECT comments.body, comments.date, users.username 
			FROM comments, users 
			WHERE comments.is_approved = 1
			AND comments.user_id = users.user_id
			AND comments.post_id = $post_id
			ORDER BY comments.date ASC 
			LIMIT 20";
$result = $db->query($query);

if($result->num_rows>=1){ ?>
	<section class="comments">
		<h3>Comments</h3>
		<ul>
<?php  while($row = $result->fetch_assoc()){ ?>
			<li>   
				<h4>From:<b> <?php echo $row['username'];?></b> on 
					<?php echo convert_date($row['date']); ?></h4>
				<p>
					<?php echo $row['body']; ?>
				</p>	
			</li>
<?php 	}//close while loop
		$result->free();
 ?>
		</ul>	
	</section>

<?php } //end if 

	} //end mmc_list_comments

/**
* Clean strings to preparte them for the db
* @param $string $input
* @return string - clean data ready for db
* @since DAY 10 - needed to sanitize comment form
*/


function clean_input($input){
global $db;
return mysqli_escape_string($db, strip_tags($input));              
}

/**
* Display an array as an unordered list
* @param array list to display
* @return string HTML formatted list
* @since DAY 10 - needed to validate form
*/

function cje_show_array($array){
    if(!empty($array)){
        $output = '<ul>';
        foreach($array as $item){
            $output .= '<li>' . $item . '</li>';
        }
        $output .= '</ul>';
        echo $output;
    } else {
        return;
    }
}


//convert timestamp
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

//no close