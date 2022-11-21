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

require_once '../vendor/autoload.php';
require_once 'dbConnect.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;


$token = $_COOKIE["token"];
$auth = verifyUserConnected($token,$db);





if(!isset($token) || $auth == false){
    header("Location: ../login");
    die();
};


function verifyUserConnected($token,$db){
    $response = false;
    try {
        // Génère : <body text='black'>
        $tokenReplace = str_replace("bearer ", "", $token);
        $decoded = JWT::decode($tokenReplace, new Key(getenv('KEY_JWT'), 'HS256'));
        $userId = $decoded->userId;
    

        $sql = "SELECT * FROM structure WHERE id = ?";
        $result = $db->prepare($sql);
        $result->execute([$userId]);
        $count = count($result->fetchAll());
        if($count > 0){
            $response = true;
        }
    } catch (Exception $e) {
        $error = $e;
    }

    return $response;
}





?>