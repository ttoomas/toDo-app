<?php

include("../../database/db.php");

$todoId = mysqli_real_escape_string($conn, $_POST['todoId']);

delete('todos', $todoId);