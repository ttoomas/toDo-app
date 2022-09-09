<?php

include("../../database/db.php");

$todoId = mysqli_real_escape_string($conn, $_POST['todoId']);

$deleteTodo = delete('todos', $todoId);
$deleteTasks = deleteWhere('tasks', ['todo_id' => $todoId]);