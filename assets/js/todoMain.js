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
});




// JS CONTENT CHANGES WITHOUT SAVE
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