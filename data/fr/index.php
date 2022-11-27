<?php
/*
 * @category   Root MVC
 * @package    Standard
 * @author     Loïc, François
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 */

if($_SERVER["REQUEST_URI"] === "/") header('Location: ./fr/');

session_set_cookie_params([
    'lifetime' => 7200,
    'path' => '/',
    'domain' => $_SERVER['HTTP_HOST'],
    'secure' => true,
    'httponly' => true,
]);

session_start();
require_once 'Routes.php';