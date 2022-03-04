<?php
include("path.php");
include(ROOT_PATH . "/app/controllers/users.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login | ToDo App</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>
<body>

<?php include (ROOT_PATH . '/app/includes/header.php'); ?>

<main class="main container">
    <form action="index.php" method="POST" class="main__section">
        <h1 class="main__title">Sign in</h1>
        <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
        <?php include(ROOT_PATH . '/app/includes/messages.php'); ?>
        <div class="main__box">
            <input type="username" name="username" class="main__input" id="username" required placeholder="Username" value="<?php echo $username; ?>">
            <label for="username" class="main__label">Username or Email</label>
        </div>
        <div class="main__box">
            <input type="password" name="password" class="main__input swPassword" id="password" required placeholder="Password">
            <label for="password" class="main__label">Password</label>
            <img src="assets/images/show.png" alt="show password button" class="sw__password show">
        </div>
        <a href="<?php echo BASE_URL . '/forgot-password.php' ?>" class="main__forgot">Forgot your Password?</a>
        <div class="main__enterBx">
            <button type="submit" name="login-btn" class="main__enter">Login</button>
        </div>
        <p class="main__or">
            <span>or</span>
        </p>
        <p class="main__dontAcc">Don't have an account?<a href="<?php echo BASE_URL . '/register.php' ?>" class="main__dontLink">Register</a></p>
    </form>
</main>

<!-- JS -->
<script defer src="assets/js/main-password.js"></script>

</body>
</html>