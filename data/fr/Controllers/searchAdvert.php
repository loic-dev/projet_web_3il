<?php 
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
foreach($map as $key => $value) {
    if(!empty($value)) {
        if($initFlag) $dfSql .= " AND ";
        $dfSql .= $key;
        $initFlag =true;
    }
}

$dfSql .= " LIMIT :min,:max ;";
$request =  Database::getPdo()->prepare($dfSql);
$arrExec = array();

foreach($map as $key => $value) {
    if(!empty($value)) {
        $realPrepareValue = strstr($key, ':');
        if(substr($realPrepareValue, -1) == ")") {
            $realPrepareValue = rtrim($realPrepareValue, ")"); 
            $value = '%' . $value . '%';
        }
        array_push($arrExec,$value);
    }
}

array_push($arrExec,$min);
array_push($arrExec,$max);

try {
    $request->execute($arrExec);
    echo object_json_response(200, $request->fetchAll());
} catch (PDOException $e) {
    $error = "Une erreur est survenue";
    echo $error;
}











// $query = "SELECT * FROM Advert WHERE ";
// $init = false;
// if (empty($title)) {
//     $query .= 'lower(Title) LIKE lower(:title) ';
//     $init = true;
// } else if(empty($canton)) {
//     if($init) $query .= "AND ";
//     $query .= 'Canton = :canton';
//     $init = true;
// }
// $stmt->execute();



// try {

//     $sql = "SELECT * FROM Advert WHERE lower(Title) LIKE lower(:title) AND Canton = :canton AND Instrument = :instrument AND Level = :level AND Rubric = :rubric ORDER BY idAdvert LIMIT :min,:max;";
//     $request =  Database::getPdo()->prepare($sql);

//     $request->execute(array(
//         ':title' => '%' . $_POST["title"] . '%',
//         ':canton' => $_POST["canton"],
//         ':instrument' => $_POST["instrument"],
//         ':level' => $_POST["level"],
//         ':rubric' => $_POST["rubric"],
//         ':min' => $min,
//         ':max' => $max
//     ));

//     echo object_json_response(200, $request->fetchAll());

// } catch (PDOException $e) {
//     $error = "Une erreur est survenue";
//     echo $error;
// }


?>