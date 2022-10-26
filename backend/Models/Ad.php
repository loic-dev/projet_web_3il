<?php 

class Ad
{
    private $name;
    private $level;
    private $category;
    private $desc;
    private $structId;
    private $advertId;
    private $instrument;
    private $difficulty;
    private $description;
    
    public function __construct() {
        new Database();
    }

    public function setStructId() {

    }

    public function getStructFromId() {
        $sql = "SELECT * FROM advert WHERE idAvert = ?";
        try {
            $request = Database::getPdo()->prepare($sql);
            $request->execute([self::$advertId]);
            $result = $request->fetch();
            self::$category = $result['category'];
            self::$level = $result['level'];
            self::$structId = $result['idStructure'];
            self::$instrument = $result['instrument'];
            self::$difficulty = $result['difficulty'];
            self::$name = $result['name'];
            self::$description = $result['description'];
        } catch (PDOException $e) {
            $error = "Une erreur est survenue";
        }
    }
    
    public function insertAdDb() {
        
    }
    
}

?>