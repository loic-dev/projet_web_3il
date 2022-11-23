<?php
session_start();
require_once 'dbConnect.php';
require_once '../Models/Advert.php';
require_once '../utils/ClientJsonException.php'; 
require_once '../utils/regex.php'; 

$title = $_POST["title"];
$place = $_POST["place"];
$level = $_POST["level"];
$description = $_POST["description"];
$instruments = $_POST["instruments"];
$images = $_POST["images"];


if(!regex_input_text($title)){
    throw new ClientJsonException("error title", 500);
} else if(!$place){
    throw new ClientJsonException("error place", 500);
} else if(regex_input_alpha($level) === 0){
    throw new ClientJsonException("error level", 500);
} else if(!$description){
    throw new ClientJsonException("error description", 500);
} else if(regex_input_text($instruments) === 0){
    throw new ClientJsonException("error instruments", 500);
}

$picture1 = null;
$picture2 = null;
$picture3 = null;


if(isset($_FILES)){
    $index = 1;
    foreach ($_FILES as $file) {
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $new_name = $index . '-' . time() . '-'. $_SESSION["Structure"]["mail"] . '.' . $extension;
        move_uploaded_file($file['tmp_name'], '../../images/' . $new_name);
        ${"picture" . $index} = "/images/" . $new_name;
        $index++;
    }
}

$title = $_POST["title"];
$place = $_POST["place"];
$level = $_POST["level"];
$description = $_POST["description"];
$instruments = $_POST["instruments"];
$rubric = $_POST["rubric"];

$ad = new Advert();
$ad->setTitle($title);
$ad->setDescription($description);
$ad->setAdress($place);
$ad->setPicture1($picture1);
$ad->setPicture2($picture2);
$ad->setPicture3($picture3);
$ad->setMailStructure($_SESSION["Structure"]["mail"]);
$ad->setInstrument($instruments);
$ad->setLevel($level);
$ad->setRubric($rubric);
$ad->setCanton("Millau-1");







try {
    $ad->insertDb();
    $reponse = new ClientJsonException("advert add successfully", 200);
    $reponse->sendJsonValid(true);
} catch (ClientJsonException $e) {
    $e->sendJsonError();
    die();
}

?>