<?php
/**
 * @category   Util
 * @package    Standard
 * @author     Loïc, François
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 */

require_once '../Models/Database.php'; 

function regex_input_text($text) {
    return preg_match("/^[a-zA-Z ]+$/", $text); 
}
function regex_input_text_with_accent($str) {
    new Database(); 
    return Database::getPdo()->quote($str);
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