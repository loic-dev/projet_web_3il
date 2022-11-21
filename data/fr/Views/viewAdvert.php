<?php 
session_start();
if(!$_SESSION['login']){
    header("location: /fr/login");
}
require_once 'Controllers/controllerAdvert.php';
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include('Views/Templates/head.php'); ?>
    <link rel="stylesheet" href="../Public/CSS/modal.css">
    <link rel="stylesheet" href="../Public/CSS/advert.css">
</head>
<body class="preload">
    <?php include('Views/Templates/header.php'); ?>
    <div class="page">
        <div class="container-page">
            <div class="c-text">
                <div class="h-text">
                    <div class="s-title">
                        <span class="struct-name"><?php echo $structure->getName(); ?></span>
                        <div class="c-title">
                            <span class="t-title"><?php echo $advert->getTitle(); ?></span>
                            <span class="t-level"><?php echo $advert->getLevel(); ?></span>
                        </div>
                        <div class="c-address">
                            <span class="i-address"></span>
                            <span class="t-address"><?php echo $advert->getAdress(); ?></span>
                        </div>
                    </div>
                    <div class="s-inst">
                        <span class="i-inst"></span>
                        <span class="t-inst"><?php echo $advert->getInstrument(); ?></span>
                    </div>
                    
                </div>
                <div class="d-text">
                    <span>blbabalala</span>
                </div>
            </div>
            <div class="c-images"></div>

           
        </div>
    </div>
    <?php include_once "Views/Templates/footer.php" ?>
    <script type="module" src="../../Public/js/all.js"></script>
    <script type="module" src="../../Public/js/advert.js"></script>
    
</body>
</html>