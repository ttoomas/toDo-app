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
    }
})

function newTaskEnterHtml(){
    let dateTime = new Date();
    let currentDate = dateTime.getDate() + "" + (dateTime.getMonth()+1)  + "" + dateTime.getFullYear() + "" + dateTime.getHours() + "" + dateTime.getMinutes() + "" + dateTime.getSeconds() + "" + dateTime.getMilliseconds();
    
    let newTaskInputData = newTaskInput.value;
    
    let newMainTask = `
        <div class="main__task main__task${currentDate}">
        <p class="task__text">${newTaskInputData}</p>
        <div class="task__inputBx disNone">
        <input type="text" name="task-text" id="task-text" class="task__inputText" placeholder="Task Name" value="${newTaskInputData}">
        <label for="task-text" class="task__inputLabel">Task Name</label>
        </div>
        
        <div class="task__btnBx">
        <button class="task__button taskBtnBx-edit" onclick="editTaskFunc(${currentDate})"><img src="../../assets/images/edit.png" alt="" aria-hidden="true" class="taskBtn__edit"></button>
        <button class="task__button taskBtnBx-delete" onclick="deleteTaskFunc(${currentDate})"><img src="../../assets/images/delete.png" alt="" aria-hidden="true" class="taskBtn__delete"></button>
        <button class="task__button taskBtnBx-cancel disNone" onclick="cancelTaskFunc(${currentDate})"><img src="../../assets/images/cancel.png" alt="" aria-hidden="true" class="taskBtn__cancel"></button>
        <button class="task__button taskBtnBx-enter disNone" onclick="enterTaskFunc(${currentDate})"><img src="../../assets/images/done.png" alt="" aria-hidden="true" class="taskBtn__enter"></button>
        </div>
        </div>
    `;
    
    mainTasks.insertAdjacentHTML('afterbegin', newMainTask);
    
    newTaskInput.value = "";
}


// RENAME TODO TASK
function editTaskFunc(current){
    // console.log('cliked to edit task btn')

    const taskEditBtn = document.querySelector(`.main__task${current} .taskBtnBx-edit`);
    const taskDeleteBtn = document.querySelector(`.main__task${current} .taskBtnBx-delete`);
    const taskCancelBtn = document.querySelector(`.main__task${current} .taskBtnBx-cancel`);
    const taskEnterBtn = document.querySelector(`.main__task${current} .taskBtnBx-enter`);
    const taskText = document.querySelector(`.main__task${current} .task__text`);
    const taskInputBx = document.querySelector(`.main__task${current} .task__inputBx`);
    
    taskEditBtn.classList.add('disNone');
    taskDeleteBtn.classList.add('disNone');
    taskText.classList.add('disNone');

    taskInputBx.classList.remove('disNone');
    taskCancelBtn.classList.remove('disNone');
    taskEnterBtn.classList.remove('disNone');
}

function deleteTaskFunc(current){
    // console.log('cliked to delete task btn');

    let deleteTask = document.querySelector(`.main__task${current}`);
    
    deleteTask.remove();
}

function cancelTaskFunc(current){
    // console.log('cliked to cancel rename btn');

    const taskEditBtn = document.querySelector(`.main__task${current} .taskBtnBx-edit`);
    const taskDeleteBtn = document.querySelector(`.main__task${current} .taskBtnBx-delete`);
    const taskCancelBtn = document.querySelector(`.main__task${current} .taskBtnBx-cancel`);
    const taskEnterBtn = document.querySelector(`.main__task${current} .taskBtnBx-enter`);
    const taskText = document.querySelector(`.main__task${current} .task__text`);
    const taskInputBx = document.querySelector(`.main__task${current} .task__inputBx`);

    taskEditBtn.classList.remove('disNone');
    taskDeleteBtn.classList.remove('disNone');
    taskText.classList.remove('disNone');

    taskInputBx.classList.add('disNone');
    taskCancelBtn.classList.add('disNone');
    taskEnterBtn.classList.add('disNone');
}

function enterTaskFunc(current){
    // console.log('cliked to enter update todo task name');

    const taskInput = document.querySelector(`.main__task${current} .task__inputText`);
    const taskEditBtn = document.querySelector(`.main__task${current} .taskBtnBx-edit`);
    const taskDeleteBtn = document.querySelector(`.main__task${current} .taskBtnBx-delete`);
    const taskCancelBtn = document.querySelector(`.main__task${current} .taskBtnBx-cancel`);
    const taskEnterBtn = document.querySelector(`.main__task${current} .taskBtnBx-enter`);
    const taskText = document.querySelector(`.main__task${current} .task__text`);
    const taskInputBx = document.querySelector(`.main__task${current} .task__inputBx`);

    let taskInputData = taskInput.value;

    taskText.textContent = taskInputData;

    taskEditBtn.classList.remove('disNone');
    taskDeleteBtn.classList.remove('disNone');
    taskText.classList.remove('disNone');

    taskInputBx.classList.add('disNone');
    taskCancelBtn.classList.add('disNone');
    taskEnterBtn.classList.add('disNone');
}


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