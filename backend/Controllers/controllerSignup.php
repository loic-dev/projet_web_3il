<?php
require '../vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require_once 'dbConnect.php';  
require_once '../utils/regex.php'; 
require_once '../utils/functions.php'; 


$content = trim(file_get_contents("php://input"));
$_POST = json_decode($content, true);



$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirm_password = $_POST["confirmPassword"];



if(regex_input_text($name) === 0){
    $error = json_response(500, 'error name');
} else if(regex_input_email($email) === 0){
    $error = json_response(500, 'error email');
} else if(regex_input_password($password) === 0){
    $error = json_response(500, 'error password too low');
} else if($password != $confirm_password){
    $error = json_response(500, 'error passwords not corresponds');
}



$hash_password = password_hash($password, PASSWORD_BCRYPT);

$newStructureId = uniqid();
$now = new DateTimeImmutable();
$structure = [
    'id' => $newStructureId,
    'name' => $name,
    'email' => $email,
    'password' => $hash_password,
    'email_verify' => false,
    'created_datetime' => $now ->getTimestamp(),
    'updated_datetime' => $now ->getTimestamp()
];


$sql = "INSERT INTO structure (id, name, email, password, email_verify, created_datetime, updated_datetime) VALUES (:id, :name, :email, :password, :email_verify, :created_datetime, :updated_datetime)";

try {
    $db->prepare($sql)->execute($structure);
} catch (PDOException $e) {
    $error = json_response(500, 'error database');
}


/* create JSON WEB TOKEN */




$created_at = new DateTimeImmutable();
$expire_at = $created_at->modify('+15 minutes')->getTimestamp();


$payload = [
    'iat' => $created_at->getTimestamp(),
    'iss' => 'localhost',
    'nbf' => $created_at->getTimestamp(),
    'exp' => $expire_at,
    'userId' => $newStructureId
];

$jwt = JWT::encode($payload, getenv('KEY_JWT'), 'HS256');
$response = json_response(200, [ 'data' => $jwt ]);





if(empty($error)){
    echo $response;
} else {
    echo $error;
    
}








?>