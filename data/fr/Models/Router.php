<?php
/**
 * Mis en place du Router du site
 * Pour adresser les urls au bon contenu.
 *
 * PHP VERSION 7.2.22
 *
 * @category   Model
 * @package    Standard
 * @author     Loïc, François
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       *
 * @since      1.0.0
 */

require_once 'RequireAll.php';


/**
 * Class Router
 *
 * @category MVC
 * @package  MVC
 * @author   Loïc, François
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     *
 */
class Router
{
    public static $url = array();
    public static $function;
    public static $innerComparator;

    /**
     * Description function
     *
     * @return void
     */
    public static function forceHTTPS()
    {
        if (isset($_SERVER['HTTPS'])) {
        } else {
            echo '<meta http-equiv="refresh" content="0;url='
                . "Https://"
                . $_SERVER['HTTP_HOST']
                . $_SERVER['REQUEST_URI']
                . '" />';
        }
    }

    /**
     * Ajoute une route au Router
     *
     * @param $route     Url de la route à ajouter
     * @param $innerText Fonction qui sera appelé à l'acces de l'url
     *
     * @return void
     */
    public static function add($route, callable $innerText)    
    {
        // echo "</br>";

        // echo $route;
        self::$url["/fr" . $route] = "/fr" .$route; // dans array url[Url] = func
   
        // echo $_SERVER["REQUEST_URI"];
        if ($_SERVER["REQUEST_URI"] == "/fr" . $route) {
            $innerText(); //lance la fonction de view
        }

    }


    /**
     * Ajoute deux routes pour un même usage au Router
     *
     * @param $route     Url de la route à ajouter
     * @param $route2    Url de la 2ème route à ajouter
     * @param $innerText Fonction qui sera appelé à l'acces d'une des deux url
     *
     * @return void
     */
    public static function addTwoWay($route, $route2, callable $innerText)
    {
        self::add($route, $innerText);
        self::add($route2, $innerText);
    }

    /**
     * Vérifie les routes si la route n'existe pas renvoie vers une page d'erreur
     * '404'
     *
     * @return void
     */
    public static function checkErrorUrl()
    {
        if ((array_key_exists($_SERVER["REQUEST_URI"], self::$url)) == false) {
            Controller::createErrorView('404');
        }
    }

    /**
     * Ajoute d'une route au Router avec un accès uniquement en tant qu'utilisateur
     * connecté
     *
     * @param $route     Url de la route à ajouter
     * @param $innerText Fonction qui sera appelé à l'acces de l'url
     *
     * @return void
     */
    public static function addLoggedWay($route, callable $innerText)
    {
        if ($_SESSION['login'] === true) {
            self::add($route, $innerText);
        } else {
            header('Location: /fr/login');
        }
    }

    /**
     * Ajoute d'une route au Router avec un accès uniquement en n'étant pas connecté
     *
     * @param $route     Url de la route à ajouter
     * @param $innerText Fonction qui sera appelé à l'acces de l'url
     *
     * @return void
     */
    public static function addNoLoggedWay($route, callable $innerText)
    {
        echo "<script>alert(\"2\")</script>";
        if ($_SESSION['login'] !== true) {
            self::add($route, $innerText);
        } else {
            header('Location: /fr/');
        }
    }

    public static function addRouteWithAttr($routeStartWith, callable $innerText) {
        self::$url["/fr" .$routeStartWith] = "/fr" .$routeStartWith;
        if(substr($_SERVER["REQUEST_URI"], 0, strlen($routeStartWith) + 3) === "/fr" .$routeStartWith) {
            $innerText();
        }
    }
}