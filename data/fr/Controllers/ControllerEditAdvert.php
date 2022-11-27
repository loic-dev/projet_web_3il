<?php
/**
 * @category   Controller
 * @package    Standard
 * @author     Loïc, François
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 */

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
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $new_name = $key . '-' . time() . '-'. $_SESSION["Structure"]["mail"] . '.' . $extension;
        move_uploaded_file($file['tmp_name'], '../../images/' . $new_name);
        ${"picture" . $key} = "/images/" . $new_name;
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