<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validateUser.php");

$errors = array();
$username = '';
$email = '';
$password = '';
$passwordConf = '';
$table = 'users';

// Login Function
function loginUser($user)
{
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['message'] = 'You are now logged in';
    $_SESSION['type'] = 'success';

    header('location: ' . BASE_URL . '/main.php');
    exit();
}

// Register
if(isset($_POST['register-btn'])){
    $errors = validateUser($_POST);

    if(count($errors) === 0){
        unset($_POST['passwordConf'], $_POST['register-btn']);

        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $user_id = create('$table', $_POST);
        $user = selectOne('$table', ['id' => $user_id]);
        
        loginUser($user);
    }
    else{
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }
}

// Login enter
if(isset($_POST['login-btn'])){
    // sw($_POST);

    $errors = validateLogin($_POST);

    if(count($errors) === 0){
        $user = selectOne($table, ['username' => $_POST['username']]);

        if($user && password_verify($_POST['password'], $user['password'])){
            loginUser($user);
        }
        else{
            array_push($errors, 'Wrong credentials');
        }
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
}