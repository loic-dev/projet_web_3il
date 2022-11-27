<?php
/**
 * @category   Model
 * @package    Standard
 * @author     Loïc, François
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 */

class Controller
{

    /**
     * Fonction qui crée une vue sans autre ajout
     *
     * @param $nameView Nom de la vue de facto du fichier
     *
     * @return void;
     */
    public static function createView($nameView)
    {
        include_once "Views/$nameView.php";
    }

    public static function createErrorView($errorNumber)
    {
        self::createView('viewError');
        echo '<h1>' . $errorNumber . '</h1>';
    }
};
