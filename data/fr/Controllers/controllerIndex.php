<?php 
/**
 * @category   Controller
 * @package    Standard
 * @author     Loïc, François
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 */

require_once '../Models/RequireAll.php';
require_once '../utils/functions.php'; 

new Database();

$ad = new Advert();


$arr = [
    "advert"=> $ad::getOrderAdvertFromCanton(6,"Rodez-1"),
    "numberOfResult" => $ad::fetchNumberOfAdvert()
];

echo object_json_response(200, $arr);

?>
