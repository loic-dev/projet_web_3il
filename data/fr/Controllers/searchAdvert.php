<?php
/**
 * @category   Controller
 * @package    Standard
 * @author     Loïc, François
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 */

require_once '../utils/functions.php';
require_once '../Models/Database.php';
require_once '../Models/Advert.php';

new Database();

$ad = new Advert();

$content = trim(file_get_contents("php://input"));
$_POST = json_decode($content, true);

$title = $_POST["title"];
$canton = $_POST["canton"];
$instrument = $_POST["instrument"];
$rubric = $_POST["rubric"];
$min = $_POST["limit"];
$max = $min + 6;
$level = $_POST["level"];

Database::getPdo()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
Database::getPdo()->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$dfSql = "SELECT * FROM Advert WHERE ";
$map = [
    'lower(Title) LIKE lower(:title)' => $title,
    'Canton = :canton' => $canton,
    'Instrument = :instrument' => $instrument,
    'Level = :level' => $level,
    'Rubric = :rubric' => $rubric
];

$initFlag = false;
foreach ($map as $key => $value) {
    if (!empty($value)) {
        if ($initFlag)
            $dfSql .= " AND ";
        $dfSql .= $key;
        $initFlag = true;
    }
}

$dfSql .= " LIMIT :min,:max ;";
$request = Database::getPdo()->prepare($dfSql);
$arrExec = array();

foreach ($map as $key => $value) {
    if (!empty($value)) {
        $realPrepareValue = strstr($key, ':');
        if (substr($realPrepareValue, -1) == ")") {
            $realPrepareValue = rtrim($realPrepareValue, ")");
            $value = '%' . $value . '%';
        }
        array_push($arrExec, $value);
    }
}

array_push($arrExec, $min);
array_push($arrExec, $max);




// echo object_json_response(200, $arr);

try {
    $request->execute($arrExec);
    $ad = new Advert();
    $arr = [
        "advert"=> $request->fetchAll(),
        "numberOfResult" => $ad::fetchNumberOfAdvert()
    ];
    echo object_json_response(200, $arr);
} catch (PDOException $e) {
    $error = "Une erreur est survenue";
    echo $error;
}

?>