<?php
include("path.php");
require_once(ROOT_PATH . "/app/controllers/resetPassController.php");

// Reset password by token
if(isset($_GET['password-token'])){
    $passwordToken = $_GET['password-token'];
    resetPassword($passwordToken);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Forgot Password | ToDo App</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>
<body>

<?php include(ROOT_PATH . '/app/includes/header.php'); ?>

<main class="main container">
    <form action="forgot-password.php" method="POST" class="main__section invalid__section">
        <h1 class="main__title">Forgot your Password</h1>
        <p class="main__text">
            Enter your user account's email address and we will send you a password reset link.
        </p>
        <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
        <?php include(ROOT_PATH . '/app/includes/messages.php'); ?>
        <div class="main__box">
            <input type="email" name="email" class="main__input" id="email" required placeholder="Email">
            <label for="email" class="main__label">Email</label>
        </div>
        <div class="main__enterBx">
            <button type="submit" name="forgot-pass-btn" class="main__enter">Reset Password</button>
        </div>
        <p class="main__or">
            <span>or</span>
        </p>
        <p class="main__dontAcc">Lost?<a href="<?php echo BASE_URL . '/' ?>" class="main__dontLink">Login</a></p>
    </form>
</main>

</body>
</html>