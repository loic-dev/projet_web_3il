<?php
/**
 * Controller de la view Index
 * Récupère les Topics et les gère.
 *
 * PHP VERSION 7.2.22
 *
 * @category   Controller
 * @package    Standard
 * @subpackage Standard
 * @author     François Al Haddad Siderikoudis <FrancoisAlHaddad@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       *
 * @since      1.0.0
 */

require_once 'Models/RequireAll.php';

// $database = new Database(
//     HOST,
//     USER,
//     PASSWORD,
//     TABLENAME
// );
// $database->getAllTopic();

// define('OPENTOPICLIMIT', '10'); //Limite de topic ouvert en même temps
// define('TOPICLIMIT', '20'); //Limite globale du nombre de topic ouvert ou fermé


/**
 * Récupère les topics et les affiches
 *
 * @return void
 */
function request()
{
    foreach ($_SESSION['topicArray'] as &$value) {
        $onclk = 'onClick=' . 'location.href="/Topic/' . $value->getIdTopic() . '";';
        if ($value->getStatus() == 1) {
            $txt = 'Ouvert';
        } else {
            $txt = 'Fermé';
        }

        echo '<div class = \'topicRow\' ' . $onclk . '>' .
            '<p class=\'NameTopic\'>' . $value->getNameTopic() . '</p>' .
            '<p class=\'Statut\'>' . $txt . '</p>' .
            '</div>';
    }
}
