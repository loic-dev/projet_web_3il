<?php
session_start();
require_once 'dbConnect.php';
require_once '../Models/Advert.php';
require_once '../utils/ClientJsonException.php'; 
require_once '../utils/regex.php'; 


$id = $_POST["id"];
$picture1 = $_POST["Picture1"];
$picture2 = $_POST["Picture2"];
$picture3 = $_POST["Picture3"];
$title = $_POST["title"];
$place = $_POST["place"];
$level = $_POST["level"];
$description = $_POST["description"];
$instruments = $_POST["instruments"];
$rubric = $_POST["rubric"];


if(isset($_FILES)){
    foreach ($_FILES as $key=>$file) {
        var_dump($value);
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $new_name = $key . '-' . time() . '-'. $_SESSION["Structure"]["mail"] . '.' . $extension;
        move_uploaded_file($file['tmp_name'], '../../images/' . $new_name);
        ${"picture" . $key} = "/images/" . $new_name;
    }
}




$ad = new Advert();
$ad->setIdAdvert($id);
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
$ad->setCanton(NULL);




try {
    $ad->updateAdvert();
    $reponse = new ClientJsonException("advert move successfully", 200);
    $reponse->sendJsonValid(true);
} catch (ClientJsonException $e) {
    $e->sendJsonError();
    die();
}

?>