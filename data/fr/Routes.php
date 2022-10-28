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
        Controller::createView('viewIndex');
    }
);

Router::add(
     '/login', function () {
         Controller::createView('viewLogin');
    }
);

 Router::add(
    '/publish-an-ad', function () {
        Controller::createView('publishAnAd');
   }
);

Router::addRouteWithAttr(
    '/verify', function () {
        Controller::createView('viewConfirmEmail');
   }
);

Router::addRouteWithAttr(
    '/musicLesson?', function () {
        Controller::createView('viewMusicLesson');
   }
);

Router::add(
    '/profile', function () {
        Controller::createView('viewProfile');
   }
);

Router::add(
    '/signup', function () {
        Controller::createView('viewSignup');
   }
);


?>