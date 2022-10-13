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

require_once 'Controllers/controllerIndex.php';
require_once 'vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$token = $_GET["token"];
echo $token;


?>

<section class="auth-page">
    <div class="container-logo">
        <img src="../Public/images/club-logo.png" alt="logo - Le Club - SALLE DE CONCERT">
    </div>
    <form class="form-post" id="signup-form">
        <section class="section-form">
            <div class="container-box">
                <p>Votre email à été confirmer</p>
                <p>vous pouvez vous connecter</p>
            </div>
        <section>
        
    </form>
   

</section>
