<?php 
/**
 * @category   Controller
 * @package    Standard
 * @author     Loïc, François
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 */

new Database();
$myAdverts=Advert::fetchAllAdvertForStructure($_SESSION["Structure"]["mail"]);

?>