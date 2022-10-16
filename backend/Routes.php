<?php
/**
 * Liste des routes du site
 *
 * PHP VERSION 7.2.22
 *
 * @category   MVC
 * @package    Standard
 * @subpackage Standard
 * @author     François Al Haddad Siderikoudis <FrancoisAlHaddad@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       *
 * @since      1.0.0
 */

require 'Models/RequireAll.php';


Router::addTwoWay(
    '/', '/Index', function () {
        Controller::createStandardView('viewIndex');
    }
);

Router::add(
     '/login', function () {
         Controller::createViewWithoutHeader('viewLogin');
    }
 );
Router::addRouteWithAttr(
     '/hellow', function () {
         Controller::createStandardView('viewIndex');
    }
 );

Router::add(
    '/signup', function () {
        Controller::createViewWithoutHeader('viewSignup');
   }
);
?>