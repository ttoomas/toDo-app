<?php

include("../../database/db.php");

$todoCreatorId = $_SESSION['id'];
$todoName = mysqli_real_escape_string($conn, $_POST['todoName']);

$todoCheck = selectOne('todos', ['created_by' => $todoCreatorId,'todo_name' => $todoName]);

if($todoCheck){
    echo "error";
}
else{
    $newTodoId = create('todos', ['todo_name' => $todoName, 'created_by' => $todoCreatorId]);
    
    echo $newTodoId;
}