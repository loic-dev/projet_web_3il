<?php 
session_start();
if(!$_SESSION['login']){
    header("location: /fr/login");
}

require_once 'Controllers/controllerPublishAnAdvert.php';
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include('Views/Templates/head.php');?>
        <link rel="stylesheet" href="/Public/dist/bundle.head.css">
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
                    <a class="back" href="../">
                        <em class="fa-arrow-left svg-primary-grey icon-20"> </em>
                        <span>Accueil</span>
                    </a>
                    <h2>Déposer une annonce</h2>
                    <form method="post" id="publish-add-form">
                        <div class="input-container">
                            <span class="input-text">Titre de l'annonce</span>
                            <input type="text" name="title" id="title-input" placeholder="Cours de piano">
                        </div>
                        <div class="input-container">
                            <span class="input-text">Lieu</span>
                            <input type="text" name="place" id="place-input" placeholder="20 avenue de Ségur, Paris">
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
                                    <option value="<?php echo $level->getName(); ?>"><?php echo $level->getName(); ?></option>
                                <?php } ?>
                            </select>
                            <span class="error-input"></span>
                        </div>
                        <div class="input-container">
                            <span class="input-text">Rubrique</span>
                            <select name="rubric" id="rubric-input">
                                <?php foreach ($rubrics as $rubric) { ?>
                                    <option value="<?php echo $rubric->getName(); ?>"><?php echo $rubric->getName(); ?></option>
                                <?php } ?>
                            </select>
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
                                <?php 
                                    $index=0;
                                    foreach ($instruments as $inst) { ?>
                                    <span id="inst-<?php echo $index; ?>" class="panel-instruments <?php if($index === 0) { echo "select"; } ?>">
                                        <em class="fa-<?php echo $inst->getIcon(); ?> svg-primary-grey icon-30"></em>
                                        <p><?php echo $inst->getName(); ?> </p>
                                    </span>
                                <?php $index++; } ?>




                            </div>
                        </div>
                        <div class="input-container">
                            <span class="input-text">Photos</span>
                            <div class="container-photos">
                                <span id="panel-add-photos" class="show">
                                    <em class="fa-plus svg-primary-grey icon-30"> </em>
                                    <input id="file-input" type="file" name="photo" style="display: none;" multiple/>
                                </span>
                            </div>
                        </div>
                        <div class="input-submit">
                            <input type="submit" id="btn-submit" value="Publier" disabled>
                        </div>
                    </form>
                </div>
                <div class="container-panel">
                    <div class="panel">
                        <div class="panel-container-img">

                            <span id="level-preview"></span>
                            <span id="back" class="not">
                                <em class="fa-chevron-left svg-primary-grey icon-20"> </em>
                            </span>
                            <div id="preview-img-container">
                                <span class="not-img-preview">
                                    <em class="fa-images svg-primary-grey icon-35"> </em>
                                </span>
                               
                                
                            </div>
                            <span id="next" class="not">
                                <em class="fa-chevron-right svg-primary-grey icon-20"> </em>
                            </span>
                        </div>
                        <div class="row">
                            <div class="row-items">
                                <span id="ad-title">Titre de l'annonce</span>
                                <span id="struct-name">Nom de la structure</span>
                            </div>
                            <div class="row-items" id="preview-icon-insts">
                            </div>
                        </div>
                        <div class="row tight">
                            <em class="fa-location-dot svg-white icon-25"> </em>
                            <span id="panel-place">Adresse</span>
                        </div>
                        <div class="row big">
                            <p id="panel-desc-text">Description de l'annonce</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include('Views/Templates/footer.php');?>
        <script src="../../Public/dist/bundle.hamburger.js"></script>
        <script type="module" src="../../Public/js/publish.js"></script>
        <script type="module" src="../../Public/js/all.js"></script>
    </body>
</html>