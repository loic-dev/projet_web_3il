<?php
/**
 * @category   Controller
 * @package    Standard
 * @author     Loïc, François
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 */

session_start();
require_once 'dbConnect.php';
require_once '../utils/ClientJsonException.php';
require_once '../Models/Advert.php';

$content = trim(file_get_contents("php://input"));
$_POST = json_decode($content, true);

$advert = new Advert();
$advert->setIdAdvert($_POST["id"]);
$advert->setMailStructure($_SESSION["Structure"]['mail']);

try {
    $advert->deleteAdvert();
    $reponse = new ClientJsonException("Advert delete successfully", 200);
    $reponse->sendJsonValid(true);

} catch (ClientJsonException $e) {
    $e->sendJsonError();
    die();
}

?>