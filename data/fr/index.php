<?php
/**
 * Lancement du site appelle des routes et redirection
 * (Page optionnelle si on change le chemin standard du serveur sur Appache)
 *
 * PHP VERSION 7.2.22
 *
 * @category   Index
 * @package    Standard
 * @subpackage Standard
 * @author     François Al Haddad Siderikoudis <FrancoisAlHaddad@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       *
 * @since      1.0.0
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
