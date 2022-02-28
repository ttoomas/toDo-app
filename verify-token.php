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
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php if(!$result): ?>
    <!-- THIS IS ONLY FOR DEVELOPMENT ONLY! REAL PAGE WILL BE MADE LATER -->

    <p>THIS IS ONLY FOR DEVELOPMENT ONLY! REAL PAGE WILL BE MADE LATER</p>
    <h1><center>There will be a page if the specified token is invalid</center></h1>
    <p>something like: you got lost? here is index.php. Do you want to change your password but it has expired? forgot-password.php</p>
<?php endif; ?>

</body>
</html>