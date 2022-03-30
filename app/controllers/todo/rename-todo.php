<?php

include("../../database/db.php");

$newTodoName = mysqli_real_escape_string($conn, $_POST['newTodoName']);
$taskId = mysqli_real_escape_string($conn, $_POST['taskId']);

$todoCheck = selectOne('todos', ['todo_name' => $newTodoName]);

if($todoCheck){
    echo "error";
}
else{
    updateById('todos', $taskId, ['todo_name' => $newTodoName]);
}