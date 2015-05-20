<?php
//pase the comment if the form was submitted

if($_REQUEST['did_comment']){
//extract and clean the data
$body = clean_input($_POST['body']);
 
//validate
$valid - true;    

//check for an empty body
    if($body == ''){
        $valid = false;
        $message = 'Please fill in the comment body';
    }
//check if still valid
    if($valid){
        //add to db, setup query
        //TODO: change the user_id to the logged in person
     $query = "INSERT INTO comments
        (body, user_id, date, is_approved, post_id)
        VALUES
        ('$body', 1, now(), 1, $post_id)";
//run it
        
$result = $db->query($query);
//check if it worked
        if($db->affected_rows == 1){
            $message = 'Thank you for your comment.';
        } else {
            $message = 'Your comment was NOT added. Try again.';
        }//end if affected rows       

    } //end if valid
}

?>