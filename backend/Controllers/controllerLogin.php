<?php
require_once '../vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require_once 'dbConnect.php';  
require_once '../utils/regex.php'; 
require_once '../utils/functions.php'; 
require_once '../Models/Structure.php'; 


$content = trim(file_get_contents("php://input"));
$_POST = json_decode($content, true);



$password = $_POST["password"];
$email = $_POST["email"];

if(!regex_input_email($email)){
    $error = json_response(500, 'email invalid');
} else if(regex_input_password($password) === 0){
    $error = json_response(500, 'invalid password');
}



/* verifier que l'utilisateur n'existe pas deja */
$sql = "SELECT id,password,email_verify FROM structure WHERE email = ?";
try {
    $request = $db->prepare($sql);
    $request->execute([$email]);
    $result = $request->fetch();
    $db_password = $result['password'];
    $userId =  $result['id'];
    $email_verify = $result['email_verify'];

    if($result == false){
        $error = json_response(500, "Identifiant ou mot de passe incorrect");
    } else if (password_verify($password,$db_password) == false){
        $error = json_response(500, "Identifiant ou mot de passe incorrect");
    } else if($email_verify == 0){
        $error = json_response(500, "Email non verifié");
    }
} catch (PDOException $e) {
    $error = json_response(500, "Une erreur est survenue");
}

try {
    new Structure($_POST["email"],$_POST["password"]);

    /* create JSON WEB TOKEN */
    $created_at = new DateTimeImmutable();
    $expire_at = $created_at->modify('+1440 minutes')->getTimestamp();


    $payload = [
        'iat' => $created_at->getTimestamp(),
        'iss' => 'localhost',
        'nbf' => $created_at->getTimestamp(),
        'exp' => $expire_at,
        'userId' => $userId
    ];


    try {
        $jwt = JWT::encode($payload, getenv('KEY_JWT'), 'HS256');
        $response = json_response(200, ["token" => $jwt]);
    } catch (Exception $e) {
        $error = json_response(500, 'error create JWT');
    }


    if(empty($error)){
        echo $response;
    } else {
        echo $error;
    }

} catch (Exception $e) {

}

?>