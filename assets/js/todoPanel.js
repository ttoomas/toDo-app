// Get id from url
function $_GET(q,s) {
    s = (s) ? s : window.location.search;
    var re = new RegExp('&amp;'+q+'=([^&amp;]*)','i');
    return (s=s.replace(/^\?/,'&amp;').match(re)) ?s=s[1] :s='';
}
const numVal = $_GET('id')


// INSERT DATA TO MYSQL TABLES
$(document).ready(function() {
    // NEW TODO
    $("#newTodo-btn").click(function() {
        const todoName = $("#newTodo").val();
        
        $.ajax({
            type: "POST",
            url: "app/controllers/todo/new-todo.php",
            data: {
                todoName: todoName
            },
            cache: false,
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
        
        const newInputVa = document.querySelector('.new__input');
        newInputVa.value = "";
    });

    $("#side").keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });

    // NEW TASK
    $("#newTaskButton").click(function() {
        entered();

        // const newTaskInputVa = document.querySelector('.newTask__input');
        // newTaskInputVa.value = "";
    });

    $("#new-task").keydown(function(event){
        if(event.keyCode == 13) {
            entered();

            event.preventDefault();
            return false;
        }
    });

    function entered(){
        // console.log('cliked or entered');

        const taskName = $("#new-task").val();
        // console.log(taskName);
        
        $.ajax({
            type: "POST",
            url: "app/controllers/todo/new-task.php",
            data: {
                taskName: taskName,
                todoId: numVal
            },
            cache: false,
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    }

    // RENAME TODO
    $("#renameButtonEnter").click(function(){
        const newTodoName = $("#rename-todo").val();
        // console.log(renameTodoName);

        $.ajax({
            type: "POST",
            url: "app/controllers/todo/rename-todo.php",
            data: {
                newTodoName: newTodoName
            },
            cache: false,
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        })
    })
});




// JS CONTENT CHANGES WITHOUT SAVE
// RENAME TODO LIST
const renameButton = document.querySelector('.rename__button');
const mainName = document.querySelector('.main__name');

const renameInput = document.querySelector('.rename__input');
const renameLabel = document.querySelector('.rename__label');
const renameEnterButton = document.querySelector('.rename__buttonEnter');

// select name from sidelist
let renameInputData = renameInput.value;
const textProp = 'textContent' in document ? 'textContent' : 'innerText';

renameEnterButton.addEventListener('click', () => {
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
        }
    });
})

renameButton.addEventListener('click', () => {
    // console.log('cliked to rename button');

    renameButton.classList.add('disNone');
    mainName.classList.add('disNone');
    
    renameInput.classList.remove('disNone');
    renameLabel.classList.remove('disNone');
    renameEnterButton.classList.remove('disNone');
})


// CREATE NEW TODO
const newButton = document.querySelector('.new__iconBx');
const newInput = document.querySelector('.new__input');
let sideListBox = document.querySelector('.side__listBx');

newButton.addEventListener('click', () => {
    // console.log('cliked to add new todo button');

    let newInputData = newInput.value;
    
    let newAnchor = document.createElement('a');
    newAnchor.textContent = newInputData;
    newAnchor.href = '#';
    newAnchor.className = 'side__list';
 
    sideListBox.appendChild(newAnchor);
})


// ADD NEW TODO TASK
const newTaskInput = document.querySelector('.newTask__input');
const newTaskBtn = document.querySelector('.newTask__button');
const mainTasks = document.querySelector('.main__tasks');


newTaskBtn.addEventListener('click', () => {
    // console.log('cliked to add new task btn');

    newTaskEnterHtml();
})

newTaskInput.addEventListener('keyup', (newTaskKey) => {
    if(newTaskKey.keyCode === 13){
        // console.log('entered to add new task');

        newTaskEnterHtml();

        // newTaskInput.value = "";
    }
})

function newTaskEnterHtml(){
    let newTaskInputData = newTaskInput.value;
    
    let newMainTask = `
        <div class="main__task main__task">
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
    `;
    
    mainTasks.insertAdjacentHTML('afterbegin', newMainTask);
}



// RENAME TODO TASK
function createDelegatedEventListener(selector, handler) {
	return (event) => {
    	if (event.target.matches(selector) || event.target.closest(selector)) {
        	handler(event);
        }
    }
}

// Edit task
document.querySelector('body').addEventListener('click', createDelegatedEventListener('.taskBtnBx-edit', event => {
    let mainTaskEdit = event.target.parentNode.parentNode.parentNode;
    
    const taskEditBtn = mainTaskEdit.querySelector('.taskBtnBx-edit');
    const taskDeleteBtn = mainTaskEdit.querySelector('.taskBtnBx-delete');
    const taskCancelBtn = mainTaskEdit.querySelector('.taskBtnBx-cancel');
    const taskEnterBtn = mainTaskEdit.querySelector('.taskBtnBx-enter');
    const taskText = mainTaskEdit.querySelector('.task__text');
    const taskInputBx = mainTaskEdit.querySelector('.task__inputBx');
    
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
    
    mainTaskDel.remove();
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
    const taskEditBtn = mainTaskEnter.querySelector('.taskBtnBx-edit');
    const taskDeleteBtn = mainTaskEnter.querySelector('.taskBtnBx-delete');
    const taskCancelBtn = mainTaskEnter.querySelector('.taskBtnBx-cancel');
    const taskEnterBtn = mainTaskEnter.querySelector('.taskBtnBx-enter');
    const taskText = mainTaskEnter.querySelector('.task__text');
    const taskInputBx = mainTaskEnter.querySelector('.task__inputBx');

    let taskInputData = taskInput.value;

    taskText.textContent = taskInputData;

    taskEditBtn.classList.remove('disNone');
    taskDeleteBtn.classList.remove('disNone');
    taskText.classList.remove('disNone');

    taskInputBx.classList.add('disNone');
    taskCancelBtn.classList.add('disNone');
    taskEnterBtn.classList.add('disNone');
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