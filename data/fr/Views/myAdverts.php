<?php 
session_start();
if(!$_SESSION['login']){
    header("location: /fr/login");
}

require_once 'Controllers/controllerMyAdverts.php';




?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include('Views/Templates/head.php'); ?>
    <link rel="stylesheet" href="../../Public/CSS/modal.css">
    <link rel="stylesheet" href="../../Public/CSS/myAdverts.css">
</head>
<body class="preload">
    <?php include('Views/Templates/header.php'); ?>
    <div class="page">
        <div class="container-page">
            <a class="back" href="../">
                        <em class="fa-arrow-left svg-primary-grey icon-20"> </em>
                        <span>Accueil</span>
            </a>
            <div class="container-title">
                <span class="title">Mes annonces</span>
            </div>
            
            <div id="container-list-adverts">
                <?php foreach ($myAdverts as $advert) {
                    $picThumbsnail = substr($advert->getPicture1(), 0, strpos($advert->getPicture1(), ".")) . ".webp";

                    ?>
                    
                    <span id="<?php echo $advert->getIdAdvert(); ?>" class="c-adverts">
                        <div class="container-option">
                            <div class="options">
                                <span class="open">Ouvrir</span>
                                <span class="edit">Modifier</span>
                                <span class="delete">Supprimer</span>
                            </div>
                        
                            <div class="menu">
                                <em class="fa-ellipsis svg-primary-grey icon-15"> </em>
                            </div>
                        </div>
                        <span class="photo-container" style="background-image:url(<?php echo $picThumbsnail ?>)"></span>
                        <div class="adverts-body-container">
                            <div class="a-header">
                                <div class="title-ad-container">
                                    <span class="a-title"><?php echo $advert->getTitle(); ?></span>
                                    <span class="a-address"><?php echo $advert->getAddress(); ?></span>

                                </div>
                                <div class="icon-music">
                                    <em></em>
                                    <span><?php echo $advert->getInstrument(); ?></span>
                                </div>
                            </div>
                            <div class="section-desc"><?php echo $advert->getDescription(); ?></div>
                        </div>
                    </span>
                <?php } ?>
            </div>
        </div>

    </div>
    <?php include_once "Views/Templates/footer.php" ?>
    <script type="module" src="../../Public/js/all.js"></script>
    <script type="module" src="../../Public/js/createModal.js"></script>
    <script type="module" src="../../Public/js/myAdverts.js"></script>
    
</body>
</html>