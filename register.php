<?php
include("path.php");
include(ROOT_PATH . "/app/controllers/users.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ToDo App - Register</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>
<body>

<nav class="header container">
    <div class="header__menu">
        <a href="#" class="header__link">Login</a>
        <a href="#" class="header__link">Register</a>
    </div>
</nav>
<main class="main container">
    <form action="register.php" method="POST" class="main__section">
        <h1 class="main__title">Register</h1>
        <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
        <div class="main__box">
            <input type="text" name="username" class="main__input" id="username" placeholder="Username" value="<?php echo $username ?>">
            <label for="username" class="main__label">Username</label>
        </div>
        <div class="main__box">
            <input type="email" name="email" class="main__input" id="email" required autocomplete="email" placeholder="Email" value="<?php echo $email ?>">
            <label for="email" class="main__label">Email</label>
        </div>
        <div class="main__box">
            <input type="password" name="password" class="main__input" id="password" placeholder="Password">
            <label for="password" class="main__label">Password</label>
        </div>
        <div class="main__box">
            <input type="password" name="passwordConf" class="main__input" id="passwordConf" placeholder="PasswordConf">
            <label for="passwordConf" class="main__label">Confirm Password</label>
        </div>
        <div class="main__enterBx">
            <button type="submit" name="register-btn" class="main__enter">Register</button>
        </div>
        <p class="main__or">
            <span>or</span>
        </p>
        <p class="main__dontAcc">Have you already account?<a href="#" class="main__dontLink">Login</a></p>
    </form>
</main>

</body>
</html>