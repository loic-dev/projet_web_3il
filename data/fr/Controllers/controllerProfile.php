<?php
/**
 * @category   Controller
 * @package    Standard
 * @author     Loïc, François
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 */

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
$function = 'updateDb'.$_POST["name"];

$editStruct->setMail($_SESSION["Structure"]["mail"]);
$editStruct->setName($_SESSION["Structure"]["name"]);
$editStruct->setWebsite($_SESSION["Structure"]["website"]);
$editStruct->setTel($_SESSION["Structure"]["phone"]);
$editStruct->setAdress($_SESSION["Structure"]["adress"]);
$editStruct->setCanton($_SESSION["Structure"]["canton"]);
$editStruct->setMailValid($_SESSION["Structure"]["mailValid"]);

try {
    $editStruct->$function($_POST["value"]);
    $reponse = new ClientJsonException("modify value successfully", 200);
    $reponse->sendJsonValid(true);

} catch (ClientJsonException $e) {
    $e->sendJsonError();
    die();
}

?>