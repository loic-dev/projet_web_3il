<?php

function regex_input_text($text) {
    return preg_match("/^[a-zA-Z ]+$/", $text); 
}
function regex_input_text_with_accent($str) {
    // echo preg_replace("/[^A-Za-z0-9.éàèùîï- ]/","",$str);
    return preg_replace("/[^A-Za-z0-9.éàèùîï ]/","",$str); 
}

function regex_input_alpha($text) {
    return preg_match("/^[a-zA-Z0-9 ]+$/", $text); 
}

function regex_input_password($password) {
    return preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/",$password);
}

function regex_input_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}


?>