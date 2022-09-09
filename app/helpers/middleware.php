<?php

function loginOnly($redirect = '/'){
    if(empty($_SESSION['id'])){
        header('location: ' . BASE_URL . $redirect);
        exit();
    }
}

function guestsOnly($redirect = '/main.php'){
    if(isset($_SESSION['id'])){
        header('location: ' . BASE_URL . $redirect);
        exit();
    }
}