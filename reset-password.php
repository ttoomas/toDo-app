<?php
include("path.php");
require_once(ROOT_PATH . "/app/controllers/resetPassController.php");
$curDate = date("Y-m-d H:i:s");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Reset Password | ToDo App</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>
<body>

<?php include(ROOT_PATH . '/app/includes/header.php'); ?>

<main class="main container">
    <?php if($_SESSION['pass_exp_date'] >= $curDate): ?>
        <form action="reset-password.php" method="POST" class="main__section">
            <h1 class="main__title">Reset your Password</h1>
            <?php include(ROOT_PATH . '/app/includes/messages.php'); ?>
            <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
            <div class="main__box">
                <input type="password" name="password" class="main__input" id="password" required placeholder="Password">
                <label for="password" class="main__label">Password</label>
            </div>
            <div class="main__box">
                <input type="password" name="passwordConf" class="main__input" id="passwordConf" required placeholder="Confirm Password">
                <label for="passwordConf" class="main__label">Confirm Password</label>
            </div>
            <div class="main__enterBx">
                <button type="submit" name="reset-pass-btn" class="main__enter">Reset Password</button>
            </div>
            <p class="main__or">
                <span>or</span>
            </p>
            <p class="main__dontAcc">Lost?<a href="<?php echo BASE_URL . '/' ?>" class="main__dontLink">Login</a></p>
        </form>
    <?php else: ?>
        <!-- THIS IS ONLY FOR DEVELOPMENT ONLY! REAL PAGE WILL BE MADE LATER -->
        <p>THIS IS ONLY FOR DEVELOPMENT ONLY! REAL PAGE WILL BE MADE LATER</p>
        <h1 style="color:#f40000;">This forget password link has been expired</h1>
    <?php endif; ?>

</main>

</body>
</html>