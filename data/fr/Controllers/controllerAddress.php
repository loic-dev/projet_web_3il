<?php
/**
 * @category   Controller
 * @package    Standard
 * @author     Loïc, François
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 */

require_once '../utils/functions.php'; 
$query = $_GET['search'];
$query = str_replace(' ', '+', $query);
$api = "https://api-adresse.data.gouv.fr/search?q=".$query."+Aveyron+12+Occitanie";

function search($api) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $api);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
     ));
    $output = curl_exec($curl);
    curl_close($curl);
    return $output;

}
$result = search($api);
echo $result;
?>