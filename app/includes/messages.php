<?php if(isset($_SESSION['message'])): ?>
    <ul class="main__msgBx">
        <li class="main__msg <?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message'] ?></li>
    </ul>

    <?php
        unset($_SESSION['message']);
        unset($_SESSION['type']);
    ?>
<?php endif; ?>