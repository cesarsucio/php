
<?php 

//connect to the database (includes functions and constants)
require('db-connect.php'); 
include(SITE_PATH . '/includes/header.php');

?>
    <main>
        <?php
            //query to get newest post (newest first)
//            $query =   "SELECT title, body, date, post_id
//                        FROM posts
//                        WHERE is_published = 1
//                        ORDER BY date DESC";

            $query =   "SELECT posts.title, posts.body, posts.date, users.username,
                        posts.post_id, categories.name
                        FROM posts, users, categories 
                        WHERE posts.is_published = 1
                        AND posts.user_id = userS.user_id
                        AND posts.category_id = categories.category_id
                        ORDER BY posts.date DESC
                        LIMIT 2";

            //run the query
            $result = $db->query($query);
            //check to make sure we got rows from the database
            if($result->num_rows >= 1){
                //loop through each row in results
                while($row = $result->fetch_assoc()){
        ?>
        <article>
            <h2>
                <a href="PATH_TO_SINGLE">
                    <?php echo $row['title']; ?>
                    
                </a>
            </h2>
            <p>
                <?php echo $row['body']; ?>
            </p>
            <footer class="post-info">
                <span class="author">
                    Posted by <?php echo $row['username']; ?>
                </span>
                <time class="date" datetime="<?php echo $row['date']; ?>">
                    on <?php echo convert_date($row['date']); ?>
                </time>
                <span class="category">
                    in the category <?php echo $row['name']; ?> 
                </span>
                <span class="comments-number">
                    <?php count_comments($row['post_id']); ?>
                </span>
            </footer>
        </article>
        
        <?php
                }//end while
                $result->free();
        ?>
        
        <a href="blog.php" class="button">Read all the blog posts...</a>
        
        <?php
            } else { echo '<h2>Sorry, no posts found</h2>'; }
            
            ?>
        
    </main>

<?php include(SITE_PATH . '/includes/sidebar.php'); ?>
<?php include(SITE_PATH . '/includes/footer.php'); ?>