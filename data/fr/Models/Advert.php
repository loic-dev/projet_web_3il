<?php 
/**
 * @category   Model
 * @package    Standard
 * @author     Loïc, François
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 */

require_once 'Database.php';

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
        $this->idAdvert = $idAdvert;
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
    public function getAddress()
    {
        return $this->adress;
    }
    public function getPicture3()
    {
        return $this->picture3;
    }
    public function getMailStructure()
    {
        return $this->mailStructure;
    }
    public function getInstrument()
    {
        return $this->instrument;
    }
    public function getLevel()
    {
        return $this->level;
    }
    public function getRubric()
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

    function getAdvert($id) {

        $advert = Database::selectDb("*","Advert", ["IdAdvert = ?"], [$id]);
        $this->setIdAdvert($advert[0]['IdAdvert']);
        $this->setTitle($advert[0]['Title']);
        $this->setDescription($advert[0]['Description']);
        $this->setAdress($advert[0]['Adress']);
        $this->setPicture1($advert[0]['Picture1']);
        $this->setPicture2($advert[0]['Picture2']);
        $this->setPicture3($advert[0]['Picture3']);
        $this->setMailStructure($advert[0]['MailStructure']);
        $this->setInstrument($advert[0]['Instrument']);
        $this->setLevel($advert[0]['Level']);
        $this->setRubric($advert[0]['Rubric']);
        $this->setCanton($advert[0]['Canton']);



    }

    public function deleteAdvert() {
        Database::deleteDb("Advert",  ["MailStructure = ? AND IdAdvert = ?"], [$this->getMailStructure(), $this->getIdAdvert()]);
    }

    static function fetchAllAdvertForStructure($mail) {
        $advertsDatabase = Database::selectDb("*","Advert", ["MailStructure = ?"], [$mail]);
        $listAdverts=array();
        foreach ($advertsDatabase as $advert) {
            $ad = new Advert();
            $ad->setIdAdvert($advert['IdAdvert']);
            $ad->setTitle($advert['Title']);
            $ad->setDescription($advert['Description']);
            $ad->setAdress($advert['Adress']);
            $ad->setPicture1($advert['Picture1']);
            $ad->setPicture2($advert['Picture2']);
            $ad->setPicture3($advert['Picture3']);
            $ad->setMailStructure($advert['MailStructure']);
            $ad->setInstrument($advert['Instrument']);
            $ad->setLevel($advert['Level']);
            $ad->setRubric($advert['Rubric']);
            $ad->setCanton($advert['Canton']);
            array_push($listAdverts, $ad);
        }
        return $listAdverts;
    }

    static function fetchNumberOfAdvert() {
        $sql = "SELECT COUNT(*),Canton FROM `Advert` GROUP BY `Canton`;";
        $result = Database::getPdo()->prepare($sql);
        $result->execute();
        return $result->fetchAll();
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


    public function updateAdvert() {

        Database::updateDb("Advert","IdAdvert",$this->getIdAdvert(),[
            "Title" => $this->getTitle(),
            "Description" => $this->getDescription(),
            "Adress" => $this->getAddress(),
            "Picture1" => $this->getPicture1(),
            "Picture2" => $this->getPicture2(),
            "Picture3" => $this->getPicture3(),
            "Instrument" => $this->getInstrument(),
            "Level" => $this->getLevel(),
            "Rubric" => $this->getRubric(),
            "Canton" => $this->getCanton()
        ]);
    }

    
}

?>