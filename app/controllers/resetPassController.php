<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/controllers/emailController.php");

$errors = array();

// Send reset email
if(isset($_POST['forgot-pass-btn'])){
    $email = $_POST['email'];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Email address is invalid";
    }
    if(empty($email)){
        $errors['email'] = "Email required";
    }

    if(count($errors) == 0){
        $user = selectOne('users', ['email' => $email]);
        // sw($user);

        $token = $user['token'];
        sendPasswordResetLink($email, $token);

        $_SESSION['message'] = 'Email sent successfully, check your email.';
        $_SESSION['type'] = 'success';
    }
}

// Redirect to Reset password page
function resetPassword($userToken)
{
    global $conn;

    $user = selectOne('users', ['token' => $userToken]);

    $_SESSION['email'] = $user['email'];

    header('location: ' . BASE_URL . '/reset-password.php');
    exit();
}

// Reset password
if(isset($_POST['reset-pass-btn'])){
    $password = $_POST['password'];
    $passwordConf = $_POST['passwordConf'];

    if(empty($password)){
        array_push($errors, 'Password is required');
    }
    if(strlen($password) < 8){
        array_push($errors, 'Password should be at least 8 characters');
}
    if($passwordConf !== $password){
        array_push($errors, 'Password do not match');
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    $email = $_SESSION['email'];

    if(count($errors) == 0){
        $result = updateByEmail('users', $email, ['password' => $password]);

        if($result){
            $_SESSION['message'] = "Password changed successfully";
            $_SESSION['type'] = "success";

            header('location: ' . BASE_URL . '/');
            exit();
        }
        else{
            $_SESSION['message'] = "
            We're sorry, but the password has not been changed. Please try again later or contact the admin.";
            $_SESSION['type'] = "error";
        }
    }
}