<?php

// For development
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'todo-app';

$conn = new MySQLi($host, $user, $password, $db_name);


// For Heroku pages
// require_once ('app/config/public-constants.php');

// $host = 'remotemysql.com';
// $user = 'pv5Gz3yfhB';
// $db_name = 'pv5Gz3yfhB';

// $conn = new MySQLi($host, $user, dbPassword, $db_name);

// if($conn->connect_error){
//     die("Database connection error: " . $conn->connect_error);
// }