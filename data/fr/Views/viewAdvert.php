<?php 
session_start();
require_once 'Controllers/controllerAdvert.php';


$pictures = array($advert->getPicture1(), $advert->getPicture2(),$advert->getPicture3());

?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include('Views/Templates/head.php');?>
        <link rel="stylesheet" href="/Public/CSS/viewAdvert.css">
        <link rel="stylesheet" href="/Public/CSS/modal.css"> 
    </head>
<body class="preload">
    <?php include('Views/Templates/header.php'); ?>
    <div class="page">
        <div class="container-page">
            <a class="back" href="../">
                <em class="fa-arrow-left svg-primary-grey icon-20"> </em>
                <span>Accueil</span>
            </a>
            <div class="c-text">
                <div class="h-text">
                    <div class="s-title">
                        <span class="struct-name"><?php echo $structure->getName(); ?></span>
                        <div class="c-title">
                            <span class="t-title"><?php echo $advert->getTitle(); ?></span>
                            <span class="t-level"><?php echo $advert->getLevel(); ?></span>
                        </div>
                        <div class="c-address">
                            <em class="fa-location-dot svg-grey icon-20"> </em>
                            <span class="t-address"><?php echo $advert->getAdress(); ?></span>
                        </div>
                    </div>
                    <div class="s-inst">
                        <em class="fa-<?php echo $instrument->getIcon(); ?> svg-primary-grey icon-45"> </em>
                        <span class="t-inst"><?php echo $advert->getInstrument(); ?></span>
                    </div>
                    
                </div>
                <div class="d-text">
                    <span><?php echo $advert->getDescription(); ?></span>
                </div>
            </div>
            <div class="c-images">
                <?php foreach ($pictures as $pict) {
                    if ($pict) {
                        ?> <span class="image" style="background-image:url(..<?php echo $pict?>)"></span> <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php include_once "Views/Templates/footer.php" ?>
    <script type="module" src="../../Public/js/all.js"></script>
    <script type="module" src="../../Public/js/advert.js"></script>
    
</body>
</html>