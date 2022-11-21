<?php
/**
 * Main Index file
 *
 * PHP VERSION 7.2.22
 *
 * @category   View
 * @package    Standard
 * @subpackage Standard
 * @author     loic-dev <loic.charrie.12@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       ****
 * @since      1.0.0
 */

require_once 'vendor/autoload.php';
require_once 'utils/functions.php'; 
require_once 'utils/ClientJsonException.php'; 
require_once 'Models/Structure.php'; 
require_once 'dbConnect.php'; 
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$token = $_GET["token"];
$loader = true;



try {
    $decoded = JWT::decode($token, new Key(getenv('KEY_JWT'), 'HS256'));
    $userId = $decoded->userId;

    
    $struct = new Structure();
    $struct->setMail($userId);
    $struct::validMail();
    
    $response = new ClientJsonException("Votre email à été verifié", 200);
    $response->sendJsonValid(true);
} catch (Exception $e) {
    $error = new ClientJsonException("Une erreur est survenue durant le processus de validation", 500);
    $error->sendJsonError(true);
}




?>