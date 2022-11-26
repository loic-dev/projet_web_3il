<?php
/**
 * @category   Controller
 * @package    Standard
 * @author     Loïc, François
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 */

$host = getenv('MYSQL_HOST');
$dbname = getenv('MYSQL_DATABASE');
$user = 'root';
$pass = getenv('MYSQL_ROOT_PASSWORD');

try {
     $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
     echo $e->getMessage();
}
?>