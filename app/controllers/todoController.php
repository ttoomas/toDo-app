<?php

include(ROOT_PATH . '/app/database/db.php');
require_once(ROOT_PATH . '/app/database/connect.php');

$errors = array();

$user = selectOne('users', ['id' => $_SESSION['id']]);
$todos = selectAll('todos', ['created_by' => $_SESSION['id']]);

if(isset($_GET['id'])){
    $todoInfo = selectOne('todos', ['id' => $_GET['id']]);
    $tasks = selectAll('tasks', ['todo_id' => $todoInfo['id']]);
}