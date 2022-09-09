<?php

if(isset($_GET['id'])){
    $todoInfo = selectOne('todos', ['id' => $_GET['id']]);
    $tasks = selectAll('tasks', ['todo_id' => $todoInfo['id']]);
}
else{
    header('Location: ' . BASE_URL . '/main.php');
}