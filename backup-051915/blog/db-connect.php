<?php
/*
Database connection credentials - this represensts the whole site connecting to the database on the server. 
It is different from the users table in your db that reference 
*/

//host  //username  //password  //database name
$db = new mysqli('localhost','cesarjesparza','ean5AH5NqhhjqExA','blog_cesar');

//handle any errors by stopping the page
if($db->connect_errno > 0) {
    die('Unable to connect to the Database');
}

//define constants - pieces of data that will not change
//use in links and sec attributes
define('SITE_URL', 'http://localhost/cesar/php/blog/');

//use in includes
define('SITE_PATH', 'C:/xampp/htdocs/cesar/php/blog/');

//control error reporting
error_reporting(E_ALL & ~E_NOTICE);

//load our custom functions
include_once(SITE_PATH . 'includes/functions.php');













//no close php