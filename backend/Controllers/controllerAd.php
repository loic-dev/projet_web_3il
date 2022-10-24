<?php

require_once 'dbConnect.php';  
require_once '../utils/regex.php'; 
require_once '../utils/functions.php'; 



$content = trim(file_get_contents("php://input"));
$_POST = json_decode($content, true);


$title = $_POST["title"];
$place = $_POST["place"];
$level = $_POST["level"];
$description = $_POST["description"];
$instruments = $_POST["instruments"];
$images = $_POST["images"];

if(regex_input_text($title) === 0){
    $error = json_response(500, 'error title');
} else if(!regex_input_text($place)){
    $error = json_response(500, 'error place');
} else if(regex_input_text($level) === 0){
    $error = json_response(500, 'error level');
} else if(regex_input_text($description) === 0){
    $error = json_response(500, 'error description');
} else if(regex_input_text($instruments) === 0){
    $error = json_response(500, 'error instruments');
}




$id = uniqid();
$now = new DateTimeImmutable();
$structure = [
    'id' => $id,
    'created_datetime' => $now ->getTimestamp(),
    'updated_datetime' => $now ->getTimestamp()
];



/*$sql = "INSERT INTO structure (id, name, email, password, email_verify, created_datetime, updated_datetime) VALUES (:id, :name, :email, :password, :email_verify, :created_datetime, :updated_datetime)";
try {
    $db->prepare($sql)->execute($structure);
} catch (PDOException $e) {
    $error = json_response(500, 'error database');
}*/



if(empty($error)){
    echo $response;
} else {
    echo $error;
}








?>