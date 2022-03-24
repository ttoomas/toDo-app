<?php

// Todo name validate
function validateTodoName($todoName)
{
    $errors = array();

    if(empty($todoName['todo_name'])){
        array_push($errors, 'ToDo name is required');
    }

    $existingTodo = selectOne('todo', ['todo_name' => $todoName['todo_name']]);
    if(isset($existingTodo)){
        array_push($errors, 'ToDo name already exists');
    }

    return $errors;
}