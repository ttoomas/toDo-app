<?php
include("path.php");
include(ROOT_PATH . "/app/controllers/users.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo App</title>
    
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>
<body>

    


    <!-- THIS IS ONLY FOR DEVELOPMENT ONLY! REAL PAGE WILL BE MADE LATER -->
    
    <?php if(isset($_SESSION['id'])): ?>
        <?php include (ROOT_PATH . '/app/includes/header.php'); ?>
        
        
        <h1 style="text-align: center; margin-top: 8rem;">Hello "<?php echo $_SESSION['username'] ?>", welcome to my todo app</h1>
    <?php else: ?>
        <?php header('Location: ' . BASE_URL . '/index.php'); ?>
    <?php endif; ?>

</body>
</html>