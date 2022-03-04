<?php
include("path.php");
require_once(ROOT_PATH . "/app/controllers/resetPassController.php");

// Reset password by token
if(isset($_GET['password-token'])){
    $result = selectOne('users', ['token' => $_GET['password-token']]);
    
    if($result){
        $passwordToken = $_GET['password-token'];
        resetPassword($passwordToken);
    }
    else{
        header('location: ' . BASE_URL . '/invalid-token.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account verification | ToDo App</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>
<body>

<main class="main container">
    <h1 class="main__title invalid__title">Please wait, we will redirect you!</h1>
</main>

</body>
</html>