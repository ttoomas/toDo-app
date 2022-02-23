<?php if(count($errors) > 0): ?>
    <ul class="main__errors">
        <?php foreach($errors as $error): ?>
            <li class="main__error"><?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>