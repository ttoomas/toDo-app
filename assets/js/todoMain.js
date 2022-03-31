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

                        // window.location = `todo.php?id=${todoIdFun}`;
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
});


// JS CONTENT CHANGES WITHOUT SAVE
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
        error: function(xhr, status, error) {
            console.error(xhr);
        }
    })
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