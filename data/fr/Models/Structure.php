<?php
require_once '../utils/regex.php'; 
require_once '../utils/functions.php'; 
require_once 'Database.php'; 

class Structure
{
    private static $_mail;
    private static $_password;
    private static $_emailVerify;
    private static $_id;
    private static $_name;

    public function __construct() {
        new Database();
    }

    public static function setPassword($password) {
        self::$_password = $password;
    }
    public static function setMail($mail) {
        self::$_mail = $mail;
    }
    public static function setName($name) {
        self::$_name = $name;
    }

    public static function getName() {
        return self::$_name;
    }
    public static function getMail() {
        return self::$_mail;
    }
    public static function getId() {
        return self::$_id;
    }

    public static function isMailValid() {
        if(!regex_input_email(self::$_mail)) {
            throw new ClientJsonException("L'email ne possède pas le bon format", 500);
        }
    }

    public static function isPasswordWeak() {
        if(regex_input_password(self::$_password) === 0) {
            throw new ClientJsonException("Mot de passe trop faible", 500);
        }
    }

    public static function __checkUserConfirmMail() {
        return (self::$_emailVerify == 1);
    }

    public static function isNameValid() {
        if(regex_input_text(self::getName()) === 0){
            throw new ClientJsonException("error name", 500);
        }
    }

    public static function encryptPassword() {
        return password_hash(self::$_password, PASSWORD_BCRYPT);
    }

    public static function insertStructureDb() {
        $sql = "INSERT INTO structure (id, name, email, password, email_verify, created_datetime, updated_datetime) VALUES (:id, :name, :email, :password, :email_verify, :created_datetime, :updated_datetime)";
        self::$_id = uniqid(); 
        $now = new DateTimeImmutable();
        $hash_password = Structure::encryptPassword();
        try {

            Database::getPdo()->prepare($sql)->execute([
                'id' => self::$_id,
                'name' => self::$_name,
                'email' => self::$_mail,
                'password' => $hash_password,
                'email_verify' => 0,
                'created_datetime' => $now ->getTimestamp(),
                'updated_datetime' => $now ->getTimestamp()
            ]);
            
        } catch (PDOException $e) {
            $error = json_response(500, 'error database');
        }
    }

    public static function verifyPasswordIdentical($confirmPassword) {
        if(self::$_password != $confirmPassword) {
            throw new ClientJsonException("Les mots de passe ne correspondent pas", 500);
        }
    }

    public static function verifyAlredyMailExistDb() {
        /* verifier que l'utilisateur n'existe pas deja */
        $sql = "SELECT id FROM structure WHERE email = ?";
        try {
            $result = Database::getPdo()->prepare($sql);
            $result->execute([self::$_mail]);
            $row = $result->fetchColumn();
            if($row > 0){
                throw new ClientJsonException("Un compte est déjà associé à cette adresse mail", 500);
            }
        } catch (PDOException $e) {
            throw new ClientJsonException("Fatal error database 65123023", 500);
            die();
        }
    }

    public static function __verifyPassword() {
        $sql = "SELECT password FROM structure WHERE email = ?";
        try {
            $request = Database::getPdo()->prepare($sql);
            $request->execute([self::$_mail]);
            $result = $request->fetch();
            return password_verify(self::$_password,$result['password']);
        } catch (PDOException $e) {
            $error = "Une erreur est survenue";
        }
    }

    public static function __fetchUserData() {
        $sql = "SELECT id,name FROM structure WHERE email = ?";
        try {
            $request = Database::getPdo()->prepare($sql);
            $request->execute([self::$_mail]);
            $result = $request->fetch();
            self::$_name = $result['name'];
            self::$_id = $result['id'];
        } catch (PDOException $e) {
            $error = "Une erreur est survenue";
        }
    }

}

?>
