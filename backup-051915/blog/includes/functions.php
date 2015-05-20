<?php
/**
*Convert MySQL datetimeformat into a human readable format
*@param string $date the datetime string like 2015-05-13 19:00:43
*@return string a nice looking date like May 13, 2015
*@since day 7
*/


function convert_date($ugly_date){
    $date = new DateTime($uglydate);
    $nicedate = $date->format('F j Y');
    return $nicedate;
}


/**
*Count the number of comments for any post
*@param int $post_id //any valid post_id to count comments
*@since Day 8 
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
    if($result->num_rows == 1){
        while($row = $result->fetch_assoc()){
            echo $row['total'];
        }
        $result->free();
        
    }
}


/**
*Count the number of pulished posts in any category
*@param int $category_id
*@since Day 8
*/


function count_posts_in_category($cat_id){
    global $db;
    $query =   "SELECT COUNT(*) AS total
                FROM posts
                WHERE category_id = $cat_id
                AND is_published = 1";
    
    $result = $db->query($query);
    //check to see if we get results
    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        echo '(' . $row['total'] . ')';
        $result->free();
    }
}

//no close