<?php
include('path.php');
include(ROOT_PATH . '/app/controllers/todoMainController.php');
loginOnly();
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

        <div class="side__listContainer">
            <?php foreach($todos as $key => $todo): ?>
                <div class="side__listBx">
                    <input type="hidden" name="todo-id" class="todo-id" id="todo-id" value="<?php echo $todo['id']; ?>">
                    <a href="todo.php?id=<?php echo $todo['id']; ?>" class="side__list">
                        <?php echo $todo['todo_name']; ?>
                    </a>
                    <button type="button" class="sideList__del">
                        <img src="./assets/images/delete-white.png" class="sideListDel__img" alt="#" aria-hidden="true">
                    </button>
                </div>
            <?php endforeach; ?>
        </div>
    
        <div class="side__new">
            <p class="new__error new__errorValid error">Please enter a valid name</p>
            <p class="new__error new__errorExist error">This name already exists</p>
            <input id="newTodo" class="new__input" type="text" name="newTodo" required placeholder="New ToDo" autocomplete="off">
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
        <div class="logoutBx mainLogout">
            <a href="<?php echo BASE_URL . '/logout.php'; ?>" class="main__logout">Logout</a>
        </div>
    </div>
    <div class="main__guide">
        <h1 class="guide__title">welcome <?php echo $user['username'] ?></h1>
        <p class="guide__text">Thanks you for using this ToDo application. If you find any error, please contact the owner on email <a href="mailto:todoapp.ttoomas@gmail.com" class="guide__link">todoapp.ttoomas@gmail.com</a></p>
    </div>
</main>

<!-- js -->
<script src="assets/js/todoMain.js"></script>
    
</body>
</html>