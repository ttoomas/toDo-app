<?php

// For development
// $host = 'localhost';
// $user = 'root';
// $db_password = '';
// $db_name = 'todo-app';

// freedb
$host = 'sql.freedb.tech';
$user = 'freedb_todo-user';
$db_name = 'freedb_todo-app';
$db_password = '64!hRB5MMJ&c&vd';


// Conn
$conn = new MySQLi($host, $user, $db_password, $db_name);

if($conn->connect_error){
    die("Database connection error: " . $conn->connect_error);
}