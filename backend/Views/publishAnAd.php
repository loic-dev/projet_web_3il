<?php require_once 'Controllers/verifyUserConnected.php'; ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include('Views/Templates/head.php');?>
        <link rel="stylesheet" href="../../Public/CSS/publishAnAd.css">
    </head>
    <body>
        <?php include('Views/Templates/header.php');?>
        <section class="publishAd-page">
            <div class="container-section">
                <div class="container-form">
                    <h2>Déposer une annonce</h2>
                    <form method="post" id="publish-add-form">
                        <div class="input-container">
                            <span class="input-text">Titre de l'annonce</span>
                            <input type="text" name="title" id="title-input">
                        </div>
                        <div class="input-container">
                            <span class="input-text">Lieu</span>
                            <input type="text" name="place" id="place-input">
                            <span class="error-input"></span>
                        </div>
                        <div class="input-container">
                            <span class="input-text">Description</span>
                            <textarea id="desc-input" name="desc"></textarea>
                            <span class="error-input"></span>
                        </div>
                        <div class="input-container">
                            <span class="input-text">Instruments</span>
                            <div class="container-instruments">
                                <span id="panel-instrument-1">
                                    <img class="span-img" src="Public/media/guitar.png" alt="guitar">
                                </span>
                                <span id="panel-instrument-2">
                                    <img class="span-img" src="Public/media/accordeon.png" alt="accordeon">
                                </span>
                                <span id="panel-instrument-3">
                                    <img class="span-img" src="Public/media/piano.png" alt="piano">
                                </span>
                                <span id="panel-instrument-4">
                                    <img class="span-img" src="Public/media/saxophone.png" alt="saxophone">
                                </span>
                                <span id="panel-instrument-5">
                                    <img class="span-img" src="Public/media/violon.png" alt="violon">
                                </span>
                            </div>
                        </div>
                        <div class="input-container">
                            <span class="input-text">Photos</span>
                            <div class="container-photos">
                                <span id="panel-add-photos">
                                    <img class="span-img" src="Public/media/more.png" alt="add photo">
                                </span>
                            </div>
                        </div>
                        <div class="input-submit">
                            <input type="submit" id="btn-submit" value="Publier">
                        </div>
                    </form>
                </div>
                <div class="container-panel">
                    <div class="panel">
                        <div class="panel-container-img">
                            <span id="back">
                                <img class="control-icon" src="Public/media/chevron-l.png" alt="back chevron">
                            </span>
                            <img id="not-img" src="Public/media/image.png" alt="not images">
                            <span id="next">
                                <img class="control-icon" src="Public/media/chevron-r.png" alt="next chevron">
                            </span>
                        </div>
                        <div class="row">
                            <div class="row-items">
                                <span id="ad-title">Titre de l'annonce</span>
                                <span id="struct-name">Nom de la structure</span>
                            </div>
                            <div class="row-items">
                                <img id="inst-logo" src="Public/media/piano.png" alt="piano icon">
                                <span id="inst-name">piano</span>
                            </div>
                        </div>
                        <div class="row">
                            <span id="panel-place">Lieu : 21 avenue jean monnet</span>
                        </div>
                        <div class="row big">
                            <p id="panel-desc-text">blablala</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include('Views/Templates/footer.php');?>
    </body>
</html>