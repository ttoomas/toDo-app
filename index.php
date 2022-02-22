<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>

<nav class="header container">
    <div class="header__menu">
        <a href="#" class="header__link">Login</a>
        <a href="#" class="header__link">Register</a>
    </div>
</nav>
<main class="main container">
    <div class="main__section">
        <h1 class="main__title">Sign in</h1>
        <div class="main__box">
            <input id="email" class="main__input" type="email" name="email" required autocomplete="email" placeholder="Email">
            <label for="email" class="main__label">Email</label>
        </div>
        <div class="main__box">
            <input id="password" class="main__input" type="password" name="password" required placeholder="Password">
            <label for="password" class="main__label">Password</label>
        </div>
        <a href="#" class="main__forgot">Forgot your Password?</a>
        <div class="main__enterBx">
            <button type="submit" class="main__enter">Login</button>
        </div>
        <p class="main__or">
            <span>or</span>
        </p>
        <p class="main__dontAcc">Don't have an account?<a href="#" class="main__dontLink">Register</a></p>
    </div>
</main>

</body>
</html>
