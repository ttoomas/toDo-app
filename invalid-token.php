<?php
include("path.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invalid Token | ToDo App</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>
<body>

<?php include (ROOT_PATH . '/app/includes/header.php'); ?>
<main class="main container">
    <div class="main__section invalid__section">
        <h1 class="main__title invalid__title">Your token is invalid!</h1>
        <div class="main__textLink">
            <p>If you want to reset your password, enter your email in the</p>
            <a href="<?php echo BASE_URL . '/forgot-password.php' ?>" class="main__dontLink">Forgot password</a>
        </div>
        <p class="main__or">
            <span>or</span>
        </p>
        <a href="<?php echo BASE_URL . '/' ?>" class="main__dontLink">Login</a>
    </div>
</main>

</body>
</html>