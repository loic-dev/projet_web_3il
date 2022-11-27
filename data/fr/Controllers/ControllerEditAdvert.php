<?php
/**
 * @category   Controller
 * @package    Standard
 * @author     Loïc, François
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 */

require_once '../vendor/autoload.php';
use WebPConvert\WebPConvert;

session_start();
require_once 'dbConnect.php';
require_once '../Models/Advert.php';
require_once '../utils/ClientJsonException.php'; 
require_once '../utils/regex.php'; 

$id = $_POST["id"];
$title = $_POST["title"];
$place = $_POST["place"];
$level = $_POST["level"];
$description = $_POST["description"];
$instruments = $_POST["instruments"];
$rubric = $_POST["rubric"];




$picture1 = null;
$picture2 = null;
$picture3 = null;

if (!file_exists('../../images/')) {
    mkdir('../../images/', 0777, true);
}

if(isset($_FILES)){
    $index = 1;

    $mainFolderPicture = '../../images/';
    $generatedOwnFolderName = time() . rand(1, 99999999);
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

$ad->getAdvert($id);


if($ad->getMailStructure() == $_SESSION["Structure"]["mail"]) {

    if($title != null) $ad->setTitle($title);
    if($description != null) $ad->setDescription($description);
    if($place != null)  {
        $ad->setAdress($place);
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
    
    }
    if($picture1 != null) $ad->setPicture1($picture1);
    if($picture2 != null) $ad->setPicture2($picture2);
    if($picture3 != null) $ad->setPicture3($picture3);
    if($instruments != null) $ad->setInstrument($instruments);
    if($level != null) $ad->setLevel($level);
    if($rubric != null) $ad->setRubric($rubric);
    
    
    try {
        $ad->updateAdvert();
        $reponse = new ClientJsonException("advert move successfully", 200);
        $reponse->sendJsonValid(true);
    } catch (ClientJsonException $e) {
        $e->sendJsonError();
        die();
    }
}


?>