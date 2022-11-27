<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include('Views/Templates/head.php');?>
    <link rel="stylesheet" href="/Public/dist/bundle.viewIndex.css">
</head>
<body class="preload">

<?php include('Views/Templates/header.php');?>

<div class="stdr_view index_page">
    <div class="presentation_component">
        <div class="title_content">
            <h1>Bienvenue, sur Musique Pratique 12</h1>
            <h3>Site d'annonces musicales en Aveyron</p>
        </div>
        <!-- <div class="container_pictures">
            <div class="inner_container">
                <img class="default_picture" alt="musicien" src="/Public/media/musician.webp" />
                <img class="default_picture" alt="instrument" src="/Public/media/piano.webp" />
            </div>
            <img class="default_picture" alt="instrument" src="/Public/media/piano.webp" />
        </div> -->
    </div>

    <div class="search_result">
        <div class="search_component">
            <h1>Trouver un cours de musique en Aveyron</h1>
            <div class="search_box">
                <input id="inputSearchAdvert" class="search_input_box" type="text"></input>
                <div class="search_component_btn_list">
                    <select id="insturment-select" class="select">
                        <option value="">Instrument</option>
                        <option value="Batterie">Batterie</option>
                        <option value="Guitare">Guitare</option>
                        <option value="Piano">Piano</option>
                        <option value="Saxophone">Saxophone</option>
                        <option value="Violon">Violon</option>
                    </select>
                    <select id="rubric-select" class="select">
                        <option value="">Categorie</option>
                        <option value="Etude">Etude</option>
                        <option value="Initiation">Initiation</option>
                    </select>
                    <select id="level-select" class="select">
                        <option value="">Niveau</option>
                        <option value="Facile">Facile</option>
                        <option value="Moyen">Moyen</option>
                        <option value="Difficile">Difficile</option>
                    </select>
                    <button id="searchAdvertBtn" class="list_menu buttons yellowButton">Rechercher</button>
                </div> 
            </div>
        </div>

        <div class="map_component">
            <div id="index_map" class="index_map">
                <?php include_once "Views/Templates/map.php" ?>
            </div>
            <div class="list_event">
                <div class="map_header">
                    <h3 id="search_title">Annonce : Rodez</h3>
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
<script type="module" src="../../Public/dist/bundle.viewIndex.js"></script>
</body>
</html>