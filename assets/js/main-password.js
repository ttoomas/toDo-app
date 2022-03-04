// Show and hide password in login etc.
var swBtn = document.querySelector('.sw__password');
var passInput = document.querySelectorAll('.swPassword');

swBtn.addEventListener('click', () => {
    if(swBtn.getAttribute('src') === 'assets/images/show.png'){
        swBtn.src="assets/images/hide.png";
        passInput.forEach(element => {
            element.type = "text";
        });
    }
    else{
        swBtn.src="assets/images/show.png";
        passInput.forEach(element => {
            element.type = "password";
        });
    }
})