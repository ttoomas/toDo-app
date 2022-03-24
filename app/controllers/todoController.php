<?php

include(ROOT_PATH . '/app/database/db.php');
require_once(ROOT_PATH . '/app/database/connect.php');

$errors = array();

$todos = selectAll('todos', ['created_by' => $_SESSION['id']]);
$user = selectOne('users', ['id' => $_SESSION['id']]);