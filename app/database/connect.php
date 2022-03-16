<?php

// For development
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'todo-app';

// For Heroku pages
// $host = 'us-cdbr-east-05.cleardb.net';
// $user = 'ba8579d8c1871f';
// $password = '227db7cf';
// $db_name = 'heroku_c13cf00049fd9db';

$conn = new MySQLi($host, $user, $password, $db_name);

if($conn->connect_error){
    die("Database connection error: " . $conn->connect_error);
}