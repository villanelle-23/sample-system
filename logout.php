<?php  
session_start();
require 'config.php';

//destroy all session and redirect user to home page

session_destroy();
header('location: ' . DOMAIN . 'index.html' );
 
die();