<?php

include("../../database/db.php");

$taskId = mysqli_real_escape_string($conn, $_POST['taskId']);
$newTaskName = mysqli_real_escape_string($conn, $_POST['newTaskName']);

updateById('tasks', $taskId, ['task_name' => $newTaskName]);