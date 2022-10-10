<?php
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


if(regex_input_text($name)){
    echo json_response(500, 'error name');
}

if(regex_input_email($email)){
    echo  json_response(500, 'error email');
}

if(regex_input_password($password)){
    echo json_response(500, 'error password too low');
}

if($password != $confirm_password){
    echo json_response(500, 'error passwords not corresponds');
}



$hash_password = password_hash($password, PASSWORD_BCRYPT);

$newStructureId = uniqid();
$structure = [
    'id' => $newStructureId,
    'name' => $name,
    'email' => $email,
    'password' => $hash_password,
    'email_verify' => false,
    'created_datetime' => new DateTime(),
    'updated_datetime' => new DateTime()
];


$sql = "INSERT INTO structure (id, name, email, password, email_verify, created_datetime, updated_datetime) VALUES (:id, :name, :email, :password, :email_verify, :created_datetime, :updated_datetime)";

try {
    $pdo->prepare($sql)->execute($structure);
} catch (PDOException $e) {
    echo json_response(500, 'error database');
}


/* create JSON WEB TOKEN */




$created_at = new DateTimeImmutable();
$expire_at = $datetime->modify('+15 minutes')->getTimestamp();


$payload = [
    'iat' => $created_at->getTimestamp(),
    'iss' => 'localhost',
    'nbf' => $created_at->getTimestamp(),
    'exp' => $expire_at,
    'userId' => $newStructureId
];

$jwt = JWT::encode($payload, getenv('KEY_JWT'), 'HS256');


print_r($jwt);


echo "test"







?>