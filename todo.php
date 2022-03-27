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
        <h1 class="main__name"><?php echo $todoInfo['todo_name']; ?></h1>
        <form class="main__rename" id="mainRename">
            <input type="text" name="rename-todo" id="rename-todo" class="rename__input disNone" placeholder="ToDo Name" value="<?php echo $todoInfo['todo_name']; ?>">
            <label for="rename-todo" class="rename__label disNone">ToDo Name</label>
            <button type="button" class="rename__buttonEnter disNone" id="renameButtonEnter">
                <span class="reBtnEnter__text">Enter</span>
                <img src="assets/images/done.png" alt="" aria-hidden="true" class="reBtnEnter__img">
            </button>
            <button type="button" class="rename__button">Rename</button>
        </form>
        <div class="logoutBx mainLogout">
            <a href="<?php echo BASE_URL . '/logout.php'; ?>" class="main__logout">Logout</a>
        </div>
    </div>

    <div class="main__tasks">
        <?php foreach($tasks as $key => $task): ?>
            <div class="main__task" id="main__task">
                <input type="hidden" name="task-id" class="task-id" value="<?php echo $task['id']; ?>">
                <p class="task__text"><?php echo $task['task_name']; ?></p>
                <div class="task__inputBx disNone">
                    <input type="text" name="task-text" id="task-text" class="task__inputText" placeholder="Task Name" value="<?php echo $task['task_name']; ?>">
                    <label for="task-text" class="task__inputLabel">Task Name</label>
                </div>
    
                <div class="task__btnBx">
                    <button class="task__button taskBtnBx-edit"><img src="assets/images/edit.png" alt="" aria-hidden="true" class="taskBtn__edit"></button>
                    <button class="task__button taskBtnBx-delete"><img src="assets/images/delete.png" alt="" aria-hidden="true" class="taskBtn__delete"></button>
                    <button class="task__button taskBtnBx-cancel disNone"><img src="assets/images/cancel.png" alt="" aria-hidden="true" class="taskBtn__cancel"></button>
                    <button class="task__button taskBtnBx-enter disNone"><img src="assets/images/done.png" alt="" aria-hidden="true" class="taskBtn__enter"></button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <form class="main__newTask" id="mainNewTask">
        <div class="main__newTaskBx">
            <input id="new-task" class="newTask__input" type="text" name="new-task" placeholder="New Task Name">
            <label for="new-task" class="newTask__label">New Task Name</label>
        </div>
        <button type="button" class="newTask__button" id="newTaskButton">
            <span class="newTaskBtn__text">Enter</span>
            <img src="assets/images/done.png" alt="" aria-hidden="true" class="newTaskBtn__img">
        </button>
    </form>
</main>

<!-- js -->
<script src="assets/js/todoPanel.js"></script>

</body>
</html>