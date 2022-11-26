<?php 
/**
 * @category   Controller
 * @package    Standard
 * @author     Loïc, François
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 */

$advert = new Advert();
$structure = new Structure();
$id_advert = $_GET['q'];
$advert->getAdvert($id_advert);
$structure->setMail($advert->getMailStructure());
$structure->fetchUserData();

$instrument = new Instrument();
$instrument->setName($advert->getInstrument());
$instrument->fetchOneInstruments();

?>