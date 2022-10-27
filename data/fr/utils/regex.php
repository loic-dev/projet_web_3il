<?php

function regex_input_text($text) {
    return preg_match("/^[a-zA-Z ]+$/", $text); 
}

function regex_input_password($password) {
    return preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/",$password);
}

function regex_input_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}


?>