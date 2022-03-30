<?php

include("../../database/db.php");

$todoName = mysqli_real_escape_string($conn, $_POST['todoName']);

$todoCheck = selectOne('todos', ['todo_name' => $todoName]);

if($todoCheck){
    echo "error";
}
else{
    $newTodoId = create('todos', ['todo_name' => $todoName, 'created_by' => $_SESSION['id']]);
    
    echo $newTodoId;
}