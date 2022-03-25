<?php

include("../../database/db.php");

$todoName = mysqli_real_escape_string($conn, $_POST['todoName']);

create('todos', ['todo_name' => $todoName, 'created_by' => $_SESSION['id']]);