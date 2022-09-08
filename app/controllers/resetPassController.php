<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/controllers/emailController.php");
include(ROOT_PATH . "/app/helpers/validatePassword.php");

$errors = array();

// Send reset email
if(isset($_POST['forgot-pass-btn'])){
    $email = $_POST['email'];

    $errors = validateEmail($email);

    if(count($errors) == 0){
        $user = selectOne('users', ['email' => $email]);

        $token = $user['token'];
        $curDate = date("Y-m-d H:i:s");

        if(empty($user['pass_exp_date']) || $user['pass_exp_date'] <= $curDate){
            // sw($user);
            
            $id = $user['id'];
            
            $expFormat = mktime(
                date("H")+6, date("i"), date("s"), date("m"), date("d"), date("Y")
            );
            $expDate = date("Y-m-d H:i:s", $expFormat);

            $result = updateById('users', $id, ['password' => "", 'pass_exp_date' => $expDate]);
            
            sendPasswordResetLink($email, $token);
    
            $_SESSION['message'] = 'Email sent successfully, check your email.';
            $_SESSION['type'] = 'success';
        }
        else{
            $_SESSION['message'] = "We've already sent you an email with. Check your email.";
            $_SESSION['type'] = 'error';
        }
    }
}

// Redirect to Reset password page
function resetPassword($userToken)
{
    global $conn;

    $user = selectOne('users', ['token' => $userToken]);

    $_SESSION['email'] = $user['email'];
    $_SESSION['pass_exp_date'] = $user['pass_exp_date'];

    header('location: ' . BASE_URL . '/reset-password.php');
    exit();
}

// Reset password
if(isset($_POST['reset-pass-btn'])){
    $password = $_POST['password'];
    $passwordConf = $_POST['passwordConf'];

    $errors = validatePassword($_POST);

    $password = password_hash($password, PASSWORD_DEFAULT);
    $email = $_SESSION['email'];

    if(count($errors) == 0){
        $token = bin2hex(random_bytes(55));

        $result = updateByEmail('users', $email, ['password' => $password, 'token' => $token, 'pass_exp_date' => NULL]);

        // sw($result);

        if($result){
            $_SESSION['message'] = "Password changed successfully";
            $_SESSION['type'] = "success";

            header('location: ' . BASE_URL . '/');
            exit();
        }
        else{
            $_SESSION['message'] = "Something goes wrong. Please try again later or contact the admin.";
            $_SESSION['type'] = "error";
        }
    }
}