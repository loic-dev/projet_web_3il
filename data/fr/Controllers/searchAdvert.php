<?php 
require_once '../Models/RequireAll.php';
require_once '../utils/functions.php'; 

new Database();

$ad = new Advert();

$content = trim(file_get_contents("php://input"));
$_POST = json_decode($content, true);
// var_dump($_POST["title"]);

// if(empty($_POST["title"])) $_POST["title"] = "";
// if(empty($_POST["canton"])) $_POST["canton"] = "";
// if(empty($_POST["instrument"])) $_POST["instrument"] = "";
// if(empty($_POST["level"])) $_POST["level"] = "";
// if(empty($_POST["rubric"])) $_POST["rubric"] = "";
// if(empty($_POST["limit"])) $_POST["limit"] = "";

// var_dump($_POST["title"]);
// $_POST["category"];
// $_POST["level"];
// $_POST["instrument"];


$title = $_POST["title"];
$canton = $_POST["canton"];
$instrument = $_POST["instrument"];
$rubric = $_POST["rubric"];
$limit = $_POST["limit"];
$limitMin = $limit - 6;
$level = $_POST["level"];

$sql = "SELECT * FROM Advert where Title LIKE '%?' AND Canton = '?' AND Instrument = '?' AND Level = '?' AND Rubric ='?' ORDER BY idAdvert LIMIT ?, ?;";
// $sql = "SELECT * FROM Advert where Title LIKE '$title' AND Canton = '$canton' AND Instrument = '$instrument' AND Level = '$level' AND Rubric ='$rubric' ORDER BY idAdvert LIMIT $limit;";

// $sql = "SELECT * FROM Advert where Title LIKE 'tes%'";
Database::getPdo()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
Database::getPdo()->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

echo object_json_response(200, $sql);


// echo object_json_response(200, json_decode($content, true));



try {
    $request = Database::getPdo()->prepare($sql);

    // $request->execute([
    $request->execute([
        $_POST["title"],
        $_POST["canton"],
        $_POST["instrument"],
        $_POST["level"],
        $_POST["rubric"],
        $_POST["limit"]
    ]);

} catch (PDOException $e) {
    echo $error;
    $error = "Une erreur est survenue";
}


?>