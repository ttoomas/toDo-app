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
</head>
<body>

    <!-- THIS IS ONLY FOR DEVELOPMENT ONLY! REAL PAGE WILL BE MADE LATER -->
    
    <?php if(isset($_SESSION['id'])): ?>
        <h1><center>Welcome at my todo app "<?php echo $_SESSION['username'] ?>"</center></h1>

        <a href="#"> Logout</a>
    <?php else: ?>
        <?php header('Location: ' . BASE_URL . '/index.php'); ?>
    <?php endif; ?>

</body>
</html>