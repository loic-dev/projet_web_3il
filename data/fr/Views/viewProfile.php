<?php 
session_start();
if(!$_SESSION['login']){
    header("location: /fr/login");
}
// var_dump($_SESSION["Structure"]);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include('Views/Templates/head.php'); ?>
    <link rel="stylesheet" href="../../Public/CSS/modal.css">
    <link rel="stylesheet" href="../../Public/CSS/viewUserProfile.css">
</head>
<body class="preload">
    <?php include('Views/Templates/header.php'); ?>
    <div class="page">
        <div class="container-page">
            <div class="container-title">
                <span class="title">Mon compte</span>
            </div>
            <div class="container-row">
                <div class="input-container disabled">
                    <span class="input-text">Nom de la structure</span>
                    <input value="<?php echo $_SESSION["Structure"]["name"] ?>" type="text" name="Name" id="name-struct" disabled>
                    <em class="fa-pen svg-primary-grey icon-15 pen-icon"> </em> 
                    <span class="infospan"></span>
                </div>
                <div class="input-container disabled">
                    <span class="input-text">Adresse</span>
                    <input value="<?php echo $_SESSION["Structure"]["adress"] ?>" type="text" name="Adress" id="adresse-struct" disabled >
                    <em class="fa-pen svg-primary-grey icon-15 pen-icon"> </em>
                    <span class="infospan"></span>
                </div>
                <div class="input-container disabled">
                    <span class="input-text">Email</span>
                    <input value="<?php echo $_SESSION["Structure"]["mail"] ?>" type="text" name="Mail" id="email-struct" disabled >
                    <em class="fa-pen svg-primary-grey icon-15 pen-icon"> </em>
                    <span class="infospan"></span>
                </div>
                <div class="input-container disabled">
                    <span class="input-text">Site web</span>
                    <input value="<?php echo $_SESSION["Structure"]["website"] ?>" type="text" name="Website" id="website-struct" disabled>
                    <em class="fa-pen svg-primary-grey icon-15 pen-icon"> </em>
                    <span class="infospan"></span>
                </div>
                <div class="input-container disabled">
                    <span class="input-text">Téléphone</span>
                    <input value="<?php echo $_SESSION["Structure"]["phone"] ?>" type="tel" name="Tel" id="phone-struct" disabled>
                    <em class="fa-pen svg-primary-grey icon-15 pen-icon"> </em>
                    <span class="infospan"></span>
                </div>
            </div>
            <span class="separator"></span>
            <div class="container-column">
                <form method="post" id="edit-password-form">
                
                    <div class="container-title">
                        <span class="title">Changer votre mot de passe</span>
                    </div>
                    <span class="info-container" id="info-container-profile"></span>
                    <div class="input-container">
                        <span class="input-text">Mot de passe actuel</span>
                        <input type="password" name="currentPassword" id="current-password-struct">
                        <span class="infospan"></span>
                    </div>
                    <div class="input-container">
                        <span class="input-text">Nouveau mot de passe</span>
                        <input type="password" name="newPassword" id="new-password-struct">
                        <span class="infospan"></span>
                    </div>
                    <div class="input-container">
                        <input type="submit" id="btn-submit" value="Sauvegarder" disabled>
                    </div>
                </form>
            </div>
            <span class="separator"></span>
            <div class="container-row">
                <span id="delete-account">Supprimer le compte</span>
            </div>
        </div>
    </div>
    <?php include_once "Views/Templates/footer.php" ?>
    <script type="module" src="../../Public/js/createModal.js"></script>
    <script type="module" src="../../Public/js/all.js"></script>
    <script type="module" src="../../Public/js/profile.js"></script>
    
</body>
</html>