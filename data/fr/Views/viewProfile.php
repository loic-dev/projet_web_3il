<?php
/**
 * Main Index file
 *
 * PHP VERSION 7.2.22
 *
 * @category   View
 * @package    Standard
 * @subpackage Standard
 * @author     loic-dev <loic.charrie.12@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       ****
 * @since      1.0.0
 */

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include('Views/Templates/head.php'); ?>
    <link rel="stylesheet" href="../../Public/CSS/viewUserProfile.css">
</head>
<body class="preload">
    <?php include('Views/Templates/header.php'); ?>
    <div class="profilePage">
        <div class="container-profile">
            <div class="container-title">
                <span class="title">Mon compte</span>
            </div>
            <div class="container-row">
                <div class="input-container disabled">
                    <span class="input-text">Nom de la structure</span>
                    <input value="<?php echo $_SESSION["Structure"]["name"] ?>" type="text" name="nameStruct" id="name-struct" disabled>
                    <em class="fa-pen svg-primary-grey icon-15 pen-icon"> </em> 
                </div>
                <div class="input-container disabled">
                    <span class="input-text">Adresse</span>
                    <input value="<?php echo $_SESSION["Structure"]["adress"] ?>" type="text" name="adresseStruct" id="adresse-struct" disabled >
                    <em class="fa-pen svg-primary-grey icon-15 pen-icon"> </em>
                </div>
                <div class="input-container disabled">
                    <span class="input-text">Email</span>
                    <input value="<?php echo $_SESSION["Structure"]["mail"] ?>" type="text" name="emailStruct" id="email-struct" disabled >
                    <em class="fa-pen svg-primary-grey icon-15 pen-icon"> </em>
                </div>
                <div class="input-container disabled">
                    <span class="input-text">Site web</span>
                    <input value="<?php echo $_SESSION["Structure"]["website"] ?>" type="text" name="websiteStruct" id="website-struct" disabled>
                    <em class="fa-pen svg-primary-grey icon-15 pen-icon"> </em>
                </div>
                <div class="input-container disabled">
                    <span class="input-text">Téléphone</span>
                    <input value="<?php echo $_SESSION["Structure"]["phone"] ?>" type="tel" name="phoneStruct" id="phone-struct" disabled>
                    <em class="fa-pen svg-primary-grey icon-15 pen-icon"> </em>
                </div>
            </div>
            <span class="separator"></span>
            <div class="container-column">
                <div class="container-title">
                    <span class="title">Changer votre mot de passe</span>
                </div>
                <div class="input-container">
                    <span class="input-text">Mot de passe actuel</span>
                    <input placeholder="**********" type="password" name="nameStruct" id="name-struct">
                </div>
                <div class="input-container">
                    <span class="input-text">Nouveau mot de passe</span>
                    <input value="<?php echo $_SESSION["Structure"]["adress"] ?>" type="password" name="adresseStruct" id="adresse-struct">
                </div>
                <div class="input-container">
                    <input type="submit" id="btn-submit" value="Sauvegarder" disabled>
                </div>
            </div>
            <span class="separator"></span>
            <div class="container-row">
                <span id="delete-account">Supprimer le compte</span>
            </div>
            

            


        </div>



    </div>
    <?php include_once "Views/Templates/footer.php" ?>
    <script type="module" src="../../Public/js/all.js"></script>
</body>
</html>