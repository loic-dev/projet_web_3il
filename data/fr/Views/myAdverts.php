<?php 
session_start();
if(!$_SESSION['login']){
    header("location: /fr/login");
}
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
            <div class="container-title">
                <span class="title">Mes annonces</span>
            </div>
            <div id="container-list-adverts">
                <span id="12" class="c-adverts">
                    <div class="container-option">
                        <div class="options">
                            <span class="edit">Modifier</span>
                            <span class="delete">Supprimer</span>
                        </div>
                    
                        <div id="menu">
                            <em class="fa-ellipsis svg-primary-grey icon-15"> </em>
                        </div>
                    </div>
                    <span class="photo-container"></span>
                    <div class="body-container">
                        <div class="a-header">
                            <div class="title-ad-container">
                                <span class="a-title">Titre de l'annonce</span>
                                <span class="a-address">21 avenue jean monnet</span>

                            </div>
                            <div class="icon-music">
                                <em></em>
                                <span>piano</span>
                            </div>
                        </div>
                        <div class="section-desc">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, soluta animi ea eius culpa quaerat laborum possimus voluptatum, sunt illo tempore perferendis incidunt quas optio eum nisi repellat dicta blanditiis.ea eius culpa quaerat laborum possimus voluptatum, sunt illo tempore perferendis incidunt quas optio eum nisi repellat dicta blanditiis.
                        </div>

                    </div>


                </span>

            </div>
        </div>

    </div>
    <?php include_once "Views/Templates/footer.php" ?>
    <script type="module" src="../../Public/js/all.js"></script>
    <script type="module" src="../../Public/js/createModal.js"></script>
    <script type="module" src="../../Public/js/myAdverts.js"></script>
    
</body>
</html>