<?php

include("../../database/db.php");

$taskId = mysqli_real_escape_string($conn, $_POST['taskId']);

delete('tasks', $taskId);