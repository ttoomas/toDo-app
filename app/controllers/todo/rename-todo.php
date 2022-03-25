<?php

include("../../database/db.php");

$newTodoName = mysqli_real_escape_string($conn, $_POST['newTodoName']);

updateById('todos', '92', ['todo_name' => $newTodoName]);