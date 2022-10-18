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

require_once 'Controllers/controllerIndex.php'
?>

<div class="stdr_view index_page">

    <div class="presentation_component">
        <div class="title_content">
            <h1>Bienvenue, sur Anac</h1>
            <h3>Site d'annonces musicales en Aveyron</p>
        </div>
        <div class="container_pictures">
            <div class="inner_container">
                <img class="default_picture" src="./Public/media/musician.jpg" />
                <img class="default_picture" src="./Public/media/piano.jpg" />
            </div>
            <img class="default_picture" src="./Public/media/piano.jpg" />
        </div>
    </div>

    <div class="search_result">
        <div class="search_component">
            <h1>Trouver un cours de musique en Aveyron</h1>
            <form class="search_box">
                <input class="search_input_box" type="text"></input>
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
                    <button class="button_menu_nav yellow">Rechercher</button>
                </div> 
            </form>
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


    <!-- <div id="tooltip" style="display:none;"> -->
    <div id="tooltip" style="display:none;">
        <p>Bonjour</p> 
    </div>
   

</div>

