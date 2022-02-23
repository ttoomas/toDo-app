<?php

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

<nav class="header container">
    <div class="header__menu">
        <a href="#" class="header__link">Login</a>
        <a href="#" class="header__link">Register</a>
    </div>
</nav>
<main class="main container">
    <form action="index.php" method="POST" class="main__section">
        <h1 class="main__title">Sign in</h1>
        <div class="main__box">
            <input type="email" name="email" class="main__input" required autocomplete="email" placeholder="Email">
            <label for="email" class="main__label">Email</label>
        </div>
        <div class="main__box">
            <input type="password" name="password" class="main__input" required placeholder="Password">
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