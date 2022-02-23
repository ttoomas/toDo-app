<?php

function validateUser($user)
{
    $errors = array();

    if(empty($user['username'])){
        array_push($errors, 'Username is required');
    }
    if(empty($user['email'])){
        array_push($errors, 'Email is required');
    }
    if(empty($user['password'])){
        array_push($errors, 'Password is required');
    }
    if(strlen($user['password']) < 8){
        array_push($errors, 'Password should be at least 8 characters');
}
    if($user['passwordConf'] !== $user['password']){
        array_push($errors, 'Password do not match');
    }

    $existingUser = selectOne('users', ['email' => $user['email']]);
    if(isset($existingUser)){
        array_push($errors, 'Email already exists');
    }

    return $errors;
}