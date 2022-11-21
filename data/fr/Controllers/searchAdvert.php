<?php 
require_once '../utils/functions.php'; 

new Database();

$ad = new Advert();

$content = trim(file_get_contents("php://input"));
$_POST = json_decode($content, true);
var_dump($_POST["title"]);

// if(empty($_POST["title"])) $_POST["title"] = "";
// if(empty($_POST["canton"])) $_POST["canton"] = "";
// if(empty($_POST["instrument"])) $_POST["instrument"] = "";
// if(empty($_POST["level"])) $_POST["level"] = "";
// if(empty($_POST["rubric"])) $_POST["rubric"] = "";
// if(empty($_POST["limit"])) $_POST["limit"] = "";

var_dump($_POST["title"]);
// $_POST["category"];
// $_POST["level"];
// $_POST["instrument"];

// $sql = "SELECT * FROM Advert where Title LIKE '%?' AND Canton = '?' AND Instrument = '?' AND Level = '?' AND Rubric ='?' ORDER BY idAdvert LIMIT ?;";


$sql = "SELECT * FROM Advert where Title LIKE 'tes%'";
Database::getPdo()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
Database::getPdo()->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


try {
    // Database::getPdo()->setAttribute("");
    $request = Database::getPdo()->prepare($sql);

    // $request->execute([
    $request->execute();
    //     $_POST["title"]
    //     // $_POST["canton"],
    //     // $_POST["instrument"],
    //     // $_POST["level"],
    //     // $_POST["rubric"],
    //     // $_POST["limit"]
    // ]);

    echo object_json_response(200, $request->fetchAll());
} catch (PDOException $e) {
    echo $error;
    $error = "Une erreur est survenue";
}


?>