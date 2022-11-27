<?php 
/**
 * @category   Controller
 * @package    Standard
 * @author     Loïc, François
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 */

new Database();
$instruments=Instrument::fetchAllInstruments();
$levels=Level::fetchAllLevels();
$rubrics=Rubric::fetchAllRubrics();

?>