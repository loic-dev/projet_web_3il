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
require_once '../utils/functions.php'; 
require_once 'dbConnect.php'; 
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$token = $_GET["token"];
$loader = true;



try {
    $decoded = JWT::decode($token, new Key(getenv('KEY_JWT'), 'HS256'));
    $userId = $decoded->userId;

    $sql = "SELECT email_verify FROM structure WHERE id = ?";
    $result = $db->prepare($sql);
    $result->execute([$userId]);
    $verified = $result->fetchColumn();

    if($verified == 0){
        $sql = "UPDATE structure SET email_verify = 1 WHERE id = ?";
        $result = $db->prepare($sql);
        $result->execute([$userId]);
    }
    $response = json_response(200, 'email verified');
} catch (Exception $e) {
    $response = json_response(500, 'error during process');
}

echo $response;




?>