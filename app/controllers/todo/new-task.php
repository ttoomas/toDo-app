<?php

include("../../database/db.php");

$todoName = mysqli_real_escape_string($conn, $_POST['taskName']);

create('tasks', ['task_name' => $todoName, 'todo_id' => '1', 'user_id' => $_SESSION['id']]);