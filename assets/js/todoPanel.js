// Get id from url
function $_GET(q,s) {
    s = (s) ? s : window.location.search;
    var re = new RegExp('&amp;'+q+'=([^&amp;]*)','i');
    return (s=s.replace(/^\?/,'&amp;').match(re)) ?s=s[1] :s='';
}
let numVal = $_GET('id');

// Select dynamically or statically added element
function createDelegatedEventListener(selector, handler) {
	return (event) => {
    	if (event.target.matches(selector) || event.target.closest(selector)) {
        	handler(event);
        }
    }
}


// INSERT DATA TO MYSQL TABLES
$(document).ready(function() {
    // NEW TODO
    $("#newTodo-btn").click(function() {
        const todoName = $("#newTodo").val();

        if(todoName.length < 4){
            $(".side__new").addClass('validError');
        }
        else{
            $(".side__new").removeClass('validError');
            $.ajax({
                type: "POST",
                url: "app/controllers/todo/new-todo.php",
                data: {
                    todoName: todoName
                },
                cache: false,
                success: function(data){
                    if(data == 'error'){
                        $('.side__new').addClass('existError');
                    }
                    else{
                        $('.side__new').removeClass('existError');
                        todoIdFun = data;
        
                        newTodoEnterHtml(todoIdFun);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });
        }
    });

    $("#side").keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });

    // RENAME TODO
    $("#renameButtonEnter").click(function(){
        const newTodoName = $("#rename-todo").val();
        
        // console.log(numVal);
        
        if(newTodoName.length < 4){
            $(".main__todoName").addClass('validError');
        }
        else{
            $(".main__todoName").removeClass('validError');

            $.ajax({
                type: "POST",
                url: "app/controllers/todo/rename-todo.php",
                data: {
                    newTodoName: newTodoName,
                    taskId: numVal
                },
                cache: false,
                success: function(data){
                    if(data == 'error'){
                        $(".main__todoName").addClass('existError');
                    }
                    else{
                        $(".main__todoName").removeClass('existError');

                        renameTodoEnterHtml();
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            })
        }
    })

    $("#rename-todo").keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });

    // NEW TASK
    $("#newTaskButton").click(function() {
        entered();
    });

    $("#new-task").keydown(function(event){
        if(event.keyCode == 13) {
            entered();

            event.preventDefault();
            return false;
        }
    });

    function entered(){
        const taskName = $("#new-task").val();
        // console.log(taskName);

        if(taskName.length < 3){
            $(".main__newTask").addClass('validError');
        }
        else{
            $(".main__newTask").removeClass('validError');

            $.ajax({
                type: "POST",
                url: "app/controllers/todo/new-task.php",
                data: {
                    taskName: taskName,
                    todoId: numVal
                },
                cache: false,
                success: function(data){
                    taskIdFun = data;
    
                    newTaskEnterHtml(taskIdFun);
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });
        }
    }
});




// JS CONTENT CHANGES WITHOUT SAVE
// RENAME TODO LIST
const renameButton = document.querySelector('.rename__button');
const mainName = document.querySelector('.main__name');

const renameInput = document.querySelector('.rename__input');
const renameLabel = document.querySelector('.rename__label');
const renameEnterButton = document.querySelector('.rename__buttonEnter');
const renameCancelButton = document.querySelector('.rename__buttonCancel');

// select name from sidelist
let renameInputData = renameInput.value;
const textProp = 'textContent' in document ? 'textContent' : 'innerText';

function renameTodoEnterHtml(){
    [].slice.call(document.querySelectorAll('a'), 0).forEach(function(aEl) {
        if (aEl[textProp].indexOf(renameInputData) > -1) {
            // console.log('cliked to enter rename button');
            let renameInputData = renameInput.value;
    
            aEl.textContent = renameInputData;
        
            mainName.textContent = renameInputData; // main name change
        
            renameButton.classList.remove('disNone');
            mainName.classList.remove('disNone');
            
            renameInput.classList.add('disNone');
            renameLabel.classList.add('disNone');
            renameEnterButton.classList.add('disNone');
            renameCancelButton.classList.add('disNone');
        }
    });
}

renameButton.addEventListener('click', () => {
    // console.log('cliked to rename button');

    renameButton.classList.add('disNone');
    mainName.classList.add('disNone');
    
    renameInput.classList.remove('disNone');
    renameLabel.classList.remove('disNone');
    renameEnterButton.classList.remove('disNone');
    renameCancelButton.classList.remove('disNone');
})

// CANCEL RENAME TODO LIST
renameCancelButton.addEventListener('click', () => {
    // console.log('cliked to cancel rename todo button');¨

    renameButton.classList.remove('disNone');
    mainName.classList.remove('disNone');
    
    renameInput.classList.add('disNone');
    renameLabel.classList.add('disNone');
    renameEnterButton.classList.add('disNone');
    renameCancelButton.classList.add('disNone');
})


// CREATE NEW TODO
const newInput = document.querySelector('.new__input');
let sideListContainer = document.querySelector('.side__listContainer');

function newTodoEnterHtml(newTodoId){    
    let newInputData = newInput.value;

    newInput.value = "";    
    
    let newTodoList = `
        <div class="side__listBx">
            <input type="hidden" name="todo-id" class="todo-id" value="${newTodoId}">
            <a href="todo.php?id=${newTodoId}" class="side__list">
                ${newInputData}
            </a>
            <button type="button" class="sideList__del">
                <img src="./assets/images/delete-white.png" class="sideListDel__img" alt="#" aria-hidden="true">
            </button>
        </div>
    `;
    
    sideListContainer.insertAdjacentHTML('beforeend', newTodoList);
}

// DELETE TODO LIST
document.querySelector('body').addEventListener('click', createDelegatedEventListener('.sideList__del', event => {
    let todoDel = event.target.parentNode.parentNode;
    let todoIdDel = todoDel.querySelector('.todo-id').value;
    
    todoDel.remove();

    $.ajax({
        type: "POST",
        url: "app/controllers/todo/delete-todo.php",
        data: {
            todoId: todoIdDel
        },
        cache: false,
        success: function(data){
            window.location = 'main.php';
        },
        error: function(xhr, status, error) {
            console.error(xhr);
        }
    })
}));

// ADD NEW TODO TASK
const newTaskInput = document.querySelector('.newTask__input');
const mainTasks = document.querySelector('.main__tasks');

function newTaskEnterHtml(taskId){
    let newTaskInputData = newTaskInput.value;

    newTaskInput.value = "";
    
    let newMainTask = `
        <div class="main__task" id="main__task">
            <input type="hidden" name="task-id" class="task-id" value="${taskId}">
            <p class="task__text">${newTaskInputData}</p>
            <div class="task__inputBx disNone">
                <input type="text" name="task-text" id="task-text" class="task__inputText" placeholder="Task Name" value="${newTaskInputData}">
                <label for="task-text" class="task__inputLabel">Task Name</label>
            </div>

            <div class="task__btnBx">
                <button class="task__button taskBtnBx-edit"><img src="assets/images/edit.png" alt="" aria-hidden="true" class="taskBtn__edit"></button>
                <button class="task__button taskBtnBx-delete"><img src="assets/images/delete.png" alt="" aria-hidden="true" class="taskBtn__delete"></button>
                <button class="task__button taskBtnBx-cancel disNone"><img src="assets/images/cancel.png" alt="" aria-hidden="true" class="taskBtn__cancel"></button>
                <button class="task__button taskBtnBx-enter disNone"><img src="assets/images/done.png" alt="" aria-hidden="true" class="taskBtn__enter"></button>
            </div>
        </div>
    `
    
    mainTasks.insertAdjacentHTML('beforeend', newMainTask);
}



// RENAME TODO TASK
// Edit task
document.querySelector('body').addEventListener('click', createDelegatedEventListener('.taskBtnBx-edit', event => {
    let mainTaskEdit = event.target.parentNode.parentNode.parentNode;
    
    const taskEditBtn = mainTaskEdit.querySelector('.taskBtnBx-edit');
    const taskDeleteBtn = mainTaskEdit.querySelector('.taskBtnBx-delete');
    const taskCancelBtn = mainTaskEdit.querySelector('.taskBtnBx-cancel');
    const taskEnterBtn = mainTaskEdit.querySelector('.taskBtnBx-enter');
    const taskText = mainTaskEdit.querySelector('.task__text');
    const taskInputBx = mainTaskEdit.querySelector('.task__inputBx');
    const taskInput = mainTaskEdit.querySelector('.task__inputText');
    
    taskEditBtn.classList.add('disNone');
    taskDeleteBtn.classList.add('disNone');
    taskText.classList.add('disNone');

    taskInputBx.classList.remove('disNone');
    taskCancelBtn.classList.remove('disNone');
    taskEnterBtn.classList.remove('disNone');
}));

// Delete task
document.querySelector('body').addEventListener('click', createDelegatedEventListener('.taskBtnBx-delete', event => {
    let mainTaskDel = event.target.parentNode.parentNode.parentNode;
    let taskIdDel = mainTaskDel.querySelector('.task-id').value;
    
    mainTaskDel.remove();

    $.ajax({
        type: "POST",
        url: "app/controllers/todo/delete-task.php",
        data: {
            taskId: taskIdDel
        },
        cache: false,
        error: function(xhr, status, error) {
            console.error(xhr);
        }
    })
}));

// Cancel rename task
document.querySelector('body').addEventListener('click', createDelegatedEventListener('.taskBtnBx-cancel', event => {
    let mainTaskCancel = event.target.parentNode.parentNode.parentNode;
    
    const taskEditBtn = mainTaskCancel.querySelector(' .taskBtnBx-edit');
    const taskDeleteBtn = mainTaskCancel.querySelector(' .taskBtnBx-delete');
    const taskCancelBtn = mainTaskCancel.querySelector(' .taskBtnBx-cancel');
    const taskEnterBtn = mainTaskCancel.querySelector(' .taskBtnBx-enter');
    const taskText = mainTaskCancel.querySelector(' .task__text');
    const taskInputBx = mainTaskCancel.querySelector(' .task__inputBx');

    taskEditBtn.classList.remove('disNone');
    taskDeleteBtn.classList.remove('disNone');
    taskText.classList.remove('disNone');

    taskInputBx.classList.add('disNone');
    taskCancelBtn.classList.add('disNone');
    taskEnterBtn.classList.add('disNone');
}));

// Enter rename task
document.querySelector('body').addEventListener('click', createDelegatedEventListener('.taskBtnBx-enter', event => {
    let mainTaskEnter = event.target.parentNode.parentNode.parentNode;

    const taskInput = mainTaskEnter.querySelector('.task__inputText');
    let taskInputData = taskInput.value;
    
    if(taskInputData.length < 3){
        $(".task__inputBx").addClass('validError');
    }
    else{
        $(".task__inputBx").removeClass('validError');

        const taskEditBtn = mainTaskEnter.querySelector('.taskBtnBx-edit');
        const taskDeleteBtn = mainTaskEnter.querySelector('.taskBtnBx-delete');
        const taskCancelBtn = mainTaskEnter.querySelector('.taskBtnBx-cancel');
        const taskEnterBtn = mainTaskEnter.querySelector('.taskBtnBx-enter');
        const taskText = mainTaskEnter.querySelector('.task__text');
        const taskInputBx = mainTaskEnter.querySelector('.task__inputBx');
        
        let taskIdEdit = mainTaskEnter.querySelector('.task-id').value;
    
        taskText.textContent = taskInputData;
    
        taskEditBtn.classList.remove('disNone');
        taskDeleteBtn.classList.remove('disNone');
        taskText.classList.remove('disNone');
    
        taskInputBx.classList.add('disNone');
        taskCancelBtn.classList.add('disNone');
        taskEnterBtn.classList.add('disNone');
    
        $.ajax({
            type: "POST",
            url: "app/controllers/todo/update-task.php",
            data: {
                newTaskName: taskInputData,
                taskId: taskIdEdit
            },
            cache: false,
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        })
    }
    
}));


// SIDEBAR OPEN AND CLOSE ON MOBILE
const sideHamMenu = document.querySelector('.side__hamMenu');
const mainHamMenu = document.querySelector('.main__hamMenu');
const side = document.querySelector('.side');
const main = document.querySelector('.main');

mainHamMenu.addEventListener('click', () => {
    // console.log('cliked to mobile menu');

    side.classList.add('activeMobile');
    main.classList.add('activeMobile');
})

sideHamMenu.addEventListener('click', () => {
    // console.log('cliked to mobile menu');

    side.classList.remove('activeMobile');
    main.classList.remove('activeMobile');
})