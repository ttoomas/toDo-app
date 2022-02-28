<?php

function validateEmail($user)
{
    $errors = array();

    if(!filter_var($user, FILTER_VALIDATE_EMAIL)){
        array_push($errors, 'Email address is invalid');
    }
    if(empty($user)){
        array_push($errors, 'Email required');
    }

    $checkMail = selectOne('users', ['email' => $user]);
    
    if(empty($checkMail)){
        array_push($errors, 'This email is not registered');
    }

    return $errors;
}

function validatePassword($user)
{
    $errors = array();

    if(empty($user['password'])){
        array_push($errors, 'Password is required');
    }
    if(strlen($user['password']) < 8){
        array_push($errors, 'Password should be at least 8 characters');
}
    if($user['passwordConf'] !== $user['password']){
        array_push($errors, 'Password do not match');
    }

    return $errors;
}