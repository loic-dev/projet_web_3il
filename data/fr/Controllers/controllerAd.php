<?php

require_once '../vendor/autoload.php';
use WebPConvert\WebPConvert;

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
$rubric = $_POST["rubric"];

$place = str_replace('"', "", $place);
$place = str_replace("'", "", $place);

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


if (!file_exists('../../images/')) {
    mkdir('../../images/', 0777, true);
}

if(isset($_FILES)){
    $index = 1;

    $mainFolderPicture = '../../images/';
    $generatedOwnFolderName = time(); //Add the rand
    $fullPath = $mainFolderPicture . $generatedOwnFolderName;
    if (!file_exists($mainFolderPicture . $generatedOwnFolderName)) {
        mkdir($mainFolderPicture . $generatedOwnFolderName, 0777, true);
    }

    foreach ($_FILES as $file) {
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $fileName = $index . '.' . $extension;
        move_uploaded_file($file['tmp_name'], $fullPath . '/' . $fileName);
        $source = $fullPath . '/' . $fileName;
        $destination = $fullPath . '/' . $index . '.webp';
        $options = [];
        WebPConvert::convert($source, $destination, $options);
        ${"picture" . $index} = "/images/" . $generatedOwnFolderName .'/' . $fileName;
        $index++;
    }
}



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


$json_data = file_get_contents('../canton.json');
$arr = json_decode($json_data, true);

$proba = 0;
$currentStr = null;

$placeCleaned = strstr(strstr($place, '12'), " ");

foreach($arr as $key => $val) {
    $newProba = similar_text($key,$placeCleaned);
    if($newProba > $proba) {
        $proba = $newProba;
        $currentStr = $val;
    }
}


$ad->setCanton($currentStr);







try {
    $ad->insertDb();
    $reponse = new ClientJsonException("advert add successfully", 200);
    $reponse->sendJsonValid(true);
} catch (ClientJsonException $e) {
    $e->sendJsonError();
    die();
}

?>