<?php
/**
 * Liste des routes du site
 *
 * @category   Root MVC
 * @package    Standard
 * @author     Loïc, François
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
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
    '/advert?q=', function () {
        Controller::createView('viewAdvert');
   }
);

Router::addRouteWithAttr(
    '/advert-edit?q=', function () {
        Controller::createView('viewEditAdvert');
   }
);

Router::add(
    '/profile', function () {
        Controller::createView('viewProfile');
   }
);

Router::add(
    '/my-adverts', function () {
        Controller::createView('myAdverts');
   }
);

Router::add(
    '/signup', function () {
        Controller::createView('viewSignup');
   }
);


?>