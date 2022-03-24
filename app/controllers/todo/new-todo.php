<?php

include("../../database/db.php");

$name = mysqli_real_escape_string($conn, $_POST['todoName']);

create('todos', ['todo_name' => $name, 'created_by' => $_SESSION['id']]);