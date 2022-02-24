<?php
include("path.php");
include(ROOT_PATH . "/app/controllers/users.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ToDo App - Login</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>
<body>

<?php include (ROOT_PATH . '/app/includes/header.php'); ?>

<main class="main container">
    <form action="index.php" method="POST" class="main__section">
        <h1 class="main__title">Sign in</h1>
        <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
        <div class="main__box">
            <input type="username" name="username" class="main__input" id="username" required autocomplete="username" placeholder="Username" value="<?php echo $username; ?>">
            <label for="username" class="main__label">Username</label>
        </div>
        <div class="main__box">
            <input type="password" name="password" class="main__input" id="password" required placeholder="Password">
            <label for="password" class="main__label">Password</label>
        </div>
        <a href="#" class="main__forgot">Forgot your Password?</a>
        <div class="main__enterBx">
            <button type="submit" name="login-btn" class="main__enter">Login</button>
        </div>
        <p class="main__or">
            <span>or</span>
        </p>
        <p class="main__dontAcc">Don't have an account?<a href="#" class="main__dontLink">Register</a></p>
    </form>
</main>

</body>
</html>