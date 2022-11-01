<?php 

class Advert
{
    private $idAdvert;
    private $title;
    private $description;
    private $adress;
    private $picture1;
    private $picture2;
    private $picture3;
    private $mailStructure;
    private $instrument;
    private $level;
    private $rubric;
    private $canton;
    
    public function __construct() {
        new Database();
    }
    
    public function getIdAdvert(){
        return $this->idAdvert;
    }
    public function setIdAdvert($idAdvert){
        $this->idAdvert =$idAdvert;
    }
    public function getTitle(){
        return $this->title;
    }
    public function setTitle($title){
        $this->title =$title;
    }
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($description){
        $this->description =$description;
    }
    public function getAdress(){
        return $this->adress;
    }
    public function setAdress($adress){
        $this->adress =$adress;
    }
    public function getPicture1(){
        return $this->picture1;
    }
    public function setPicture1($picture1){
        $this->picture1 =$picture1;
    }
    public function getPicture2(){
        return $this->picture2;
    }
    public function setPicture2($picture2){
        $this->picture2 =$picture2;
    }
    private function getAddress()
    {
        return $this->address;
    }
    private function getPicture3()
    {
        return $this->picture3;
    }
    private function getMailStructure()
    {
        return $this->mailStructure;
    }
    private function getInstrument()
    {
        return $this->instrument;
    }
    private function getLevel()
    {
        return $this->level;
    }
    private function getRubric()
    {
        return $this->rubric;
    }
    function setPicture3($picture3)
    {
        $this->picture3 = $picture3;
    }
    
    function setMailStructure($mailStructure)
    {
        $this->mailStructure = $mailStructure;
    }
    
    function setInstrument($instrument)
    {
        $this->instrument = $instrument;
    }
    
    function setLevel($level)
    {
        $this->level = $level;
    }
    
    function setRubric($rubric)
    {
        $this->rubric = $rubric;
    }
    function setCanton($canton)
    {
        $this->canton = $canton;
    }
    function getCanton()
    {
        return $this->canton;
    }

    static function getRandomAdvertFromCanton($limit, $canton) {
        return Database::selectRandomDb("*","Advert", ["canton = ?"], [$canton], $limit);
    }

    static function getOrderAdvertFromCanton($limit, $canton) {
        return Database::selectRandomDb("*","Advert", ["canton = ?"], [$canton], $limit);
    }

    static function getRandomAdvert($limit) {
        return Database::selectRandomDb("*","Advert", ["1 = 1"], [], $limit);
    }

    static function searchAdvert($title,$limit) {
        return Database::selectRandomDb("*","Advert", ["1 = 1"], [], $limit);
    }
    
    function insertDb() {
        Database::insertDb("Advert", [
            "Title" => $this->getTitle(),
            "Description" => $this->getDescription(),
            "Adress" => $this->getAddress(),
            "Picture1" => $this->getPicture1(),
            "Picture2" => $this->getPicture2(),
            "Picture3" => $this->getPicture3(),
            "MailStructure" => $this->getMailStructure(),
            "Instrument" => $this->getInstrument(),
            "Level" => $this->getLevel(),
            "Rubric" => $this->getRubric(),
            "Canton" => $this->getCanton()
        ]);
    }

    
}

?>