<?php
require_once '../vendor/autoload.php';

require_once 'dbConnect.php';
require_once '../utils/regex.php';
require_once '../utils/functions.php';
require_once '../utils/ClientJsonException.php';
require_once '../Models/Structure.php';

$content = trim(file_get_contents("php://input"));
$_POST = json_decode($content, true);

$attempt = new Structure();

$attempt->setMail($_POST["email"]);
$attempt->setPassword($_POST["password"]);

try {

    $attempt::isMailValid();
    $attempt::isPasswordWeak("Invalid password");
    $attempt::verifyMailExistDb();
    $attempt::fetchUserData();
    $attempt::__verifyPassword();
    $attempt::verifyMailValid();
    $attempt::login();
    $reponse = new ClientJsonException("Connexion autorisé", 200);
    $reponse->sendJsonValid(true);

} catch (ClientJsonException $e) {
    $e->sendJsonError();
    die();
}

?>