<?php
require_once '../utils/ClientJsonException.php'; 
require_once '../utils/regex.php'; 
require_once '../utils/functions.php'; 
require_once 'Database.php'; 
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
class Structure
{
    private static $mail;
    private static $name;
    private static $tel;
    private static $website;
    private static $adress;
    private static $canton;
    private static $mailValid;
    
    private static $password;
    private static $encrypted_password;
    
    public function __construct() {
        new Database();
    }
    
    public static function isMailValid() {
        if(!regex_input_email(self::$mail)) {
            throw new ClientJsonException("L'email ne possède pas le bon format", 500);
        }
    }
    
    public static function isPasswordWeak($error = "Mot de passe trop faible") {
        if(regex_input_password(self::$password) === 0) {
            throw new ClientJsonException($error, 500);
        }
    }
    
    public static function __checkUserConfirmMail() {
        return (self::$mailValid == 1);
    }
    
    public static function isNameValid() {
        if(regex_input_text(self::getName()) === 0){
            throw new ClientJsonException("error name", 500);
        }
    }
    
    public static function encryptPassword() {
        return password_hash(self::$password, PASSWORD_BCRYPT);
    }
    
    public static function insertDb() {
        Database::insertDb("Structure", [
            "Mail" => self::getMail(),
            "Name" => self::getName(),
            "Tel" => self::getTel(),
            "Website" => self::getWebsite(),
            "Adress" => self::getAdress(),
            "Password" => self::getPassword(),
            "Canton" => self::getCanton(),
            "MailValid" => self::getMailValid(),
        ]);
    }
    
    public function setMail($mail)
    {
        self::$mail = $mail;
    }
    
    public function getMail()
    {
        return self::$mail;
    }
    
    public function setName($name)
    {
        self::$name = $name;
    }
    
    public function getName()
    {
        return self::$name;
    }
    
    public function setTel($tel)
    {
        self::$tel = $tel;
    }
    
    public function getTel()
    {
        return self::$tel;
    }
    
    public function setWebsite($website)
    {
        self::$website = $website;
    }
    
    public function getWebsite()
    {
        return self::$website;
    }
    
    public function setAdress($adress)
    {
        self::$adress = $adress;
    }
    
    public function getAdress()
    {
        return self::$adress;
    }
    
    public function getPassword(){
        return self::$password;
    }
    
    public function setPassword($password){
        self::$password = $password;
    }
    
    public function setCanton($canton){
        self::$canton = $canton;
    }
    
    public function getCanton(){
        return self::$canton;
    }
    
    public function setMailValid($mailValid){
        self::$mailValid = $mailValid;
    }
    
    public function getMailValid(){
        return self::$mailValid;
    }
        
    public static function verifyPasswordIdentical($confirmPassword) {
        if(self::$password != $confirmPassword) {
            throw new ClientJsonException("Les mots de passe ne correspondent pas", 500);
        }
    }
    
    private static function fetchAlreadyExistDb() {
        /* verifier que l'utilisateur n'existe pas deja */
        $result = Database::selectDb("Mail", "Structure", [
            "Mail = ?"
        ], [
            self::$mail
        ]);

        return sizeof($result);
    }

    public static function verifyDosentAlredyExistMailDb() {
        if( self::fetchAlreadyExistDb() !== 0){
            throw new ClientJsonException("Un compte est déjà associé à cette adresse mail", 500);
        }
    }
    public static function verifyMailExistDb() {
        if( self::fetchAlreadyExistDb() === 0){
            throw new ClientJsonException("Le compte n'existe pas", 500);
        }
    }
    public static function verifyMailValid() {
        if( self::$mailValid === 0){
            throw new ClientJsonException("Email non verifié", 500);
        }
    }

    public static function validMail() {
        if(self::fetchAlreadyExistDb()){
            $db = Database::getPdo();
            $sql = "UPDATE Structure SET MailValid = 1 WHERE mail = ?";
            $result = $db->prepare($sql);
            $result->execute([self::$mail]);
        }
    }
    
    public static function __verifyPassword() {
        if(!password_verify(self::$password,self::$encrypted_password)) {
            throw new ClientJsonException("Identifiant ou mot de passe incorrect", 500);
        };
    }
    
    public static function fetchUserData() {
        $result = Database::selectDb("*", "Structure", [
            "Mail = ?"
        ], [
            self::$mail
        ]);

        self::$mail = $result[0]["Mail"];
        self::$name = $result[0]["Name"];
        self::$website = $result[0]["Website"];
        self::$encrypted_password = $result[0]["Password"];
        self::$adress = $result[0]["Adress"];
        self::$canton = $result[0]["Canton"];
        self::$mailValid = $result[0]["mailValid"];

    }
    
    public static function login() {
        session_start();
        $_SESSION["login"] = true;
        $_SESSION["Structure"]["mail"] = self::$mail;
        $_SESSION["Structure"]["name"] = self::$name;
        $_SESSION["Structure"]["website"] = self::$website;
        $_SESSION["Structure"]["adress"] = self::$adress;
        $_SESSION["Structure"]["canton"] = self::$canton;
        $_SESSION["Structure"]["mailValid"] = self::$mailValid;
        $_SESSION["Structure"]["phone"] = self::$tel;

        

    }

}

?>
