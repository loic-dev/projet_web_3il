<?php
require_once '../vendor/autoload.php';
session_start();
require_once 'dbConnect.php';
require_once '../utils/regex.php';
require_once '../utils/functions.php';
require_once '../utils/ClientJsonException.php';
require_once '../Models/Structure.php';

$content = trim(file_get_contents("php://input"));
$_POST = json_decode($content, true);

$editStruct = new Structure();
$editStruct->setMail($_SESSION["Structure"]["mail"]);


try {
    $editStruct->deleteStructure();
    session_destroy();
    $reponse = new ClientJsonException("modify password successfully", 200);
    $reponse->sendJsonValid(true);
   
} catch (ClientJsonException $e) {
    $e->sendJsonError();
    die();
}

?>