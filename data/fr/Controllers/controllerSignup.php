<?php
require_once '../vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require_once 'dbConnect.php';  
require_once '../utils/regex.php'; 
require_once '../utils/functions.php'; 
require_once '../utils/sendEmail.php'; 

require_once '../utils/ClientJsonException.php'; 

require_once '../Models/Structure.php'; 

$content = trim(file_get_contents("php://input"));
$_POST = json_decode($content, true);
$headerHost = parse_url($_SERVER['HTTP_REFERER']);

$signStruct = new Structure();
$signStruct->setMail($_POST["email"]);
$signStruct->setPassword($_POST["password"]);
$signStruct->setName($_POST["name"]);

try {

    $signStruct::isNameValid();
    $signStruct::isMailValid();
    $signStruct::isPasswordWeak();
    $signStruct::verifyPasswordIdentical($_POST["confirmPassword"]);
    $signStruct::verifyDosentAlredyExistMailDb();
    $signStruct::insertDb();

} catch (ClientJsonException $e) {
    $e->sendJsonError();
    die();
}

/* create JSON WEB TOKEN */
$created_at = new DateTimeImmutable();
$expire_at = $created_at->modify('+15 minutes')->getTimestamp();

$payload = [
    'iat' => $created_at->getTimestamp(),
    'iss' => 'localhost',
    'nbf' => $created_at->getTimestamp(),
    'exp' => $expire_at,
    'userId' => $signStruct->getMail()
];

try {
    $jwt = JWT::encode($payload, getenv('KEY_JWT'), 'HS256');
} catch (Exception $e) {
    $error = json_response(500, 'error create JWT');
}

$host = $headerHost['host'];
$link_verify_email = "https://$host/verify?token={$jwt}";
try {
    sendEmail($signStruct->getMail(), $signStruct->getName(), $link_verify_email);
    $data = ['name' => $signStruct->getName(), 'email' => $signStruct->getMail()];
    $response = json_response(200, $data);
} catch (Exception $e) {
    $error = json_response(500, $e->getMessage());
}

if(empty($error)){
    echo $response;
} else {
    echo $error;
}

?>