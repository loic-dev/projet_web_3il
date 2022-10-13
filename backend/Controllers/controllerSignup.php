<?php
require_once '../vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require_once 'dbConnect.php';  
require_once '../utils/regex.php'; 
require_once '../utils/functions.php'; 
require_once '../utils/sendEmail.php'; 


$content = trim(file_get_contents("php://input"));
$_POST = json_decode($content, true);



$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirm_password = $_POST["confirmPassword"];

if(regex_input_text($name) === 0){
    $error = json_response(500, 'error name');
} else if(!regex_input_email($email)){
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
    'email_verify' => 0,
    'created_datetime' => $now ->getTimestamp(),
    'updated_datetime' => $now ->getTimestamp()
];

/* verifier que l'utilisateur n'existe pas deja */
$sql = "SELECT COUNT(*) FROM structure";
try {
    $result = $db->prepare($sql);
    $result->execute();
    $row = $result->fetch();
    if(count($row) > 0){
        $error = json_response(500, "Cet utilisateur existe déja");
        echo $error;
        die();
    }
} catch (PDOException $e) {
    $error = json_response(500, "Cet utilisateur existe");
}


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


try {
    $jwt = JWT::encode($payload, getenv('KEY_JWT'), 'HS256');
} catch (Exception $e) {
    $error = json_response(500, 'error create JWT');
}




$link_verify_email = "localhost:8000/verify?token={$jwt}";
try {
    sendEmail($email, $name, $link_verify_email);
    $data = ['name' => $name, 'email' => $email];
    $response = json_response(200, $data);
} catch (Exception $e) {
    $error = json_response(500, 'error sendEmail');
}


if(empty($error)){
    echo $response;
} else {
    echo $error;
}








?>