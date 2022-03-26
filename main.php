<?php
include('path.php');
include(ROOT_PATH . '/app/controllers/todoController.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo App</title>

    <!-- Styles -->
    <link rel="stylesheet" href="assets/css/todoPanel.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>

<aside>
    <form class="side" id="side">
        <div class="side__hamMenu">
            <span class="hamMenu"></span>
            <span class="hamMenu"></span>
            <span class="hamMenu"></span>
        </div>
        
        <p class="side__name">welcome <?php echo $user['username']; ?></p>
        <p class="side__email"><?php echo $user['email']; ?></p>
        
        <div class="logoutBx sideLogout">
            <a href="<?php echo BASE_URL . '/logout.php'; ?>" class="main__logout">Logout</a>
        </div>
    
        <!-- <div class="side__listBx">
            <a href="#" class="side__list">My Day</a>
            <a href="#" class="side__list">My 2 Day</a>
            <a href="#" class="side__list">My 3 Day</a>
        </div> -->

        <div class="side__listBx">
            <?php foreach($todos as $key => $todo): ?>
                <a href="todo.php?id=<?php echo $todo['id']; ?>" class="side__list"><?php echo $todo['todo_name']; ?></a>
            <?php endforeach; ?>
        </div>
    
        <div class="side__new">
            <input id="newTodo" class="new__input" type="text" name="newTodo" required placeholder="New ToDo">
            <label for="newTodo" class="new__label">New ToDo</label>
            <button type="button" class="new__iconBx" id="newTodo-btn">
                <img src="assets/images/plus.png" alt="" aria-hidden="true" class="new__icon">
            </button>
        </div>
    </form>
</aside>

<main class="main">
    <div class="main__todoName">
        <div class="main__hamMenu">
            <span class="hamMenu"></span>
            <span class="hamMenu"></span>
            <span class="hamMenu"></span>
        </div>
    </div>
    <!-- ONLY FOR DEVELOPMENT -->
    <h1>Hello, please select your todo</h1>
</main>

<!-- js -->
<script src="assets/js/todoMain.js"></script>
    
</body>
</html>