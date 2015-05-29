<?php
//host  //username  //password  //database name
$db = new mysqli('localhost','wikiadmin','3e4mWP464f7b8uP2','wiki');

//handle any errors by stopping the page
if($db->connect_errno > 0) {
    die('Unable to connect to the Database');
}

//define constants
define('SITE_URL', 'http://localhost/php/wiki/');

//use in includes
define('SITE_PATH', 'C:/www/php/wiki/');

//control error reporting
error_reporting(E_ALL & ~E_NOTICE);

//load custom functions
include_once(SITE_PATH . 'functions.php');













//no close php