<?php
/**
 * Main Index file
 *
 * PHP VERSION 7.2.22
 *
 * @category   View
 * @package    Standard
 * @subpackage Standard
 * @author     François Al Haddad Siderikoudis <FrancoisAlHaddad@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       ****
 * @since      1.0.0
 */
// require_once 'Controllers/controllerIndex.php';

new Database();

// $rs = Database::selectRandomDb("*","Advert", [
//     "canton = ?"
// ], [
//     "Millau-1"
// ], 5);
// var_dump($rs);

// $s = new Structure();

// $s::setMail("francoisdks@gmail.com");
// $s::fetchUserData();

// var_dump(password_verify("test",$result["password"]));

// $t = new Advert();
// $t->setTitle("hynk^pjn,mù");
// $t->setDescription("test123");
// $t->setAdress("azd");
// $t->setPicture1("../././/");
// $t->setPicture2("../././/");
// $t->setPicture3("../././/");
// $t->setMailStructure("francoisdks@gmail.com");
// $t->setInstrument("Flute");
// $t->setLevel("Easy");
// $t->setRubric("Study");
// $t->setCanton("Millau-1");
 
// $t->insertDb();


// $result = Database::selectDb("Password", "Structure", [
//     "Mail = ?"
// ], [
//     "francoisdks@gmail.com"
// ]);

// var_dump($result[0]["Password"]);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include('Views/Templates/head.php');?>
    <link rel="stylesheet" href="/Public/CSS/viewIndex.css">
    <link rel="stylesheet" href="/Public/CSS/atelier.css">
    <link rel="stylesheet" href="/Public/CSS/footer.css">
</head>
<body class="preload">

<?php include('Views/Templates/header.php');?>


<div class="stdr_view index_page">

    <div class="presentation_component">
        <div class="title_content">
            <h1>Bienvenue, sur Musique Pratique 12</h1>
            <h3>Site d'annonces musicales en Aveyron</p>
        </div>
        <div class="container_pictures">
            <div class="inner_container">
                <img class="default_picture" src="/Public/media/musician.webp" />
                <img class="default_picture" src="/Public/media/piano.webp" />
            </div>
            <img class="default_picture" src="/Public/media/piano.webp" />
        </div>
    </div>

    <div class="search_result">
        <div class="search_component">
            <h1>Trouver un cours de musique en Aveyron</h1>
            <div class="search_box">
                <input id="inputSearchAdvert" class="search_input_box" type="text"></input>
                <div class="search_component_btn_list">
                    <select id="insturment-select" class="select">
                        <option value="">Instrument</option>
                        <option value="dog">Dog</option> 
                        <option value="cat">Cat</option>
                        <option value="hamster">Hamster</option>
                        <option value="parrot">Parrot</option>
                        <option value="spider">Spider</option>
                        <option value="goldfish">Goldfish</option>
                    </select>
                    <select id="category-select" class="select">
                        <option value="">Categorie</option>
                        <option value="dog">Dog</option>
                        <option value="cat">Cat</option>
                        <option value="hamster">Hamster</option>
                        <option value="parrot">Parrot</option>
                        <option value="spider">Spider</option>
                        <option value="goldfish">Goldfish</option>
                    </select>
                    <select id="pet-select" class="select">
                        <option value="">Niveau</option>
                        <option value="dog">Dog</option>
                        <option value="cat">Cat</option>
                        <option value="hamster">Hamster</option>
                        <option value="parrot">Parrot</option>
                        <option value="spider">Spider</option>
                        <option value="goldfish">Goldfish</option>
                    </select>
                    <button id="searchAdvertBtn" class="button_menu_nav yellow">Rechercher</button>
                </div> 
</div>
        </div>

        <div class="map_component">
            <div id="index_map" class="index_map"style="display:none;">
                <?php include_once "Views/Templates/map.php" ?>
            </div>
            <div class="list_event">
            
                <div class="map_header">
                    <h3 id="search_title">Annonce: Rodez</h3>
                </div>

                <div id="display_event">

                </div>
            
            </div>
        </div>
    </div>

    <div id="tooltip" style="display:none;">
    </div>

</div>

<?php include_once "Views/Templates/footer.php" ?>
<script type="module" src="../../Public/js/event.js"></script>
<script src="../../Public/js/map.js"></script>
<!-- <script src="../../Public/js/event.js"></script> -->
<script type="module" src="../../Public/js/all.js"></script>

</body>
</html>