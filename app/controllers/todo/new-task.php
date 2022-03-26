<?php

include("../../database/db.php");

$todoName = mysqli_real_escape_string($conn, $_POST['taskName']);
$todoId = mysqli_real_escape_string($conn, $_POST['todoId']);

create('tasks', ['task_name' => $todoName, 'todo_id' => $todoId, 'user_id' => $_SESSION['id']]);