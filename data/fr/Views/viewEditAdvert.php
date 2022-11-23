<?php 
session_start();
if(!$_SESSION['login']){
    header("location: /fr/login");
}

require_once 'Controllers/controllerViewEditAdvert.php';

$pictures = array($advert->getPicture1(), $advert->getPicture2(),$advert->getPicture3());

?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include('Views/Templates/head.php');?>
        <link rel="stylesheet" href="/Public/CSS/editAdvert.css">
        <link rel="stylesheet" href="/Public/CSS/publishAnAd.css">
        <link rel="stylesheet" href="/Public/CSS/ring.css">
    </head>
    <body class="preload">
        <?php include('Views/Templates/header.php');?>
        
        <section class="page">
            <div id="error-container">
            </div>
            <div class="container-page">
                <div class="container-form">
                    <h2>Editer une annonce</h2>
                    <form method="post" id="publish-add-form">
                        <div class="input-container">
                            <span class="input-text">Titre de l'annonce</span>
                            <input type="text" name="title" id="title-input" value="<?php echo $advert->getTitle(); ?>">
                        </div>
                        <div class="input-container">
                            <span class="input-text">Lieu</span>
                            <input type="text" name="place" id="place-input" value="<?php echo $advert->getAdress(); ?>">
                            <span class="error-input"></span>
                            <span id="list-search">
                                <span id="search-list-title">Adresses</span>
                                <span id="container-list-search">
                                    <div id="ring-search" class="lds-dual-ring"></div>
                                </span>
                            </span>
                        </div> 
                        <div class="input-container">
                            <span class="input-text">Niveau</span>
                            <select name="level" id="level-input">
                                <?php foreach ($levels as $level) { ?>
                                    <option value="<?php echo $level->getName(); ?>"     <?php if($level->getName() === $advert->getLevel()) { echo "selected"; } ?> ><?php echo $level->getName(); ?></option>
                                <?php } ?>
                            </select>
                            <span class="error-input"></span>
                        </div>
                        <div class="input-container">
                            <span class="input-text">Rubrique</span>
                            <select name="rubric" id="rubric-input">
                                <?php foreach ($rubrics as $rubric) { ?>
                                    <option value="<?php echo $rubric->getName(); ?>"     <?php if($level->getName() === $advert->getRubric()) { echo "selected"; } ?> ><?php echo $rubric->getName(); ?></option>
                                <?php } ?>
                            </select>
                            <span class="error-input"></span>
                        </div>


                        
                        <div class="input-container">
                            <span class="input-text">Description</span>
                            <textarea id="desc-input" name="desc"><?php echo $advert->getDescription(); ?></textarea>
                            <span class="error-input"></span>
                        </div>
                        <div class="input-container">
                            <span class="input-text">Instruments</span>
                            <div class="container-instruments">
                                <?php 
                                    $index=0;
                                    foreach ($instruments as $inst) { ?>
                                    <span id="inst-<?php echo $index; ?>" class="panel-instruments <?php if($inst->getName() === $advert->getInstrument()) { echo "select"; } ?>">
                                        <em class="fa-<?php echo $inst->getIcon(); ?> svg-primary-grey icon-30"></em>
                                        <p><?php echo $inst->getName(); ?> </p>
                                    </span>
                                <?php $index++; } ?>




                            </div>
                        </div>
                        <div class="input-container">
                            <span class="input-text">Photos</span>
                            <div class="container-photos">
                                <?php foreach ($pictures as $pict) {
                                    if ($pict) {
                                        ?> 
                                            <span id="<?php echo $pict ?>" style="background-image:url(..<?php echo $pict?>)" class="edit-photo-span">
                                                <span class="overlay"></span>
                                                <em class="deleteIcon fa-trash svg-primary-grey icon-30"> </em>
                                            </span>
                                        <?php
                                    }
                                } ?>
                                <span id="panel-add-photos" class="<?php if(sizeof($pictures) > 2) { echo "unshow"; } else { echo "show"; } ?>">
                                    <em class="fa-plus svg-primary-grey icon-30"> </em>
                                    <input id="file-input" type="file" name="photo" style="display: none;" multiple/>
                                </span>
                            </div>
                        </div>
                        <div class="input-submit">
                            <input type="submit" id="btn-submit" value="Sauvegarder" disabled>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <?php include('Views/Templates/footer.php');?>
        <script type="module" src="../../Public/js/editAdvert.js"></script>
        <script type="module" src="../../Public/js/all.js"></script>
    </body>
</html>