<?php 
/**
 * @category   Controller
 * @package    Standard
 * @author     Loïc, François
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 */

new Database();

$advert = new Advert();
$structure = new Structure();
$id_advert = $_GET['q'];
$advert->getAdvert($id_advert);
$structure->setMail($advert->getMailStructure());
$structure->fetchUserData();

$instruments=Instrument::fetchAllInstruments();
$levels=Level::fetchAllLevels();
$rubrics=Rubric::fetchAllRubrics();

?>