<?php if(isset($_SESSION['id'])): ?>
<nav class="header container">
    <div class="header__menu">
        <a href="<?php echo BASE_URL . '/logout.php' ?>" class="header__link">Logout</a>
    </div>
</nav>
<?php else: ?>
<nav class="header container">
    <div class="header__menu">
        <a href="<?php echo BASE_URL . '/' ?>" class="header__link">Login</a>
        <a href="<?php echo BASE_URL . '/register.php' ?>" class="header__link">Register</a>
    </div>
</nav>
<?php endif; ?>