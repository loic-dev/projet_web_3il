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
    <?php include('Views/Templates/head.php');?>
    <link rel="stylesheet" href="../../Public/CSS/viewUserProfile.css">
</head>
<body>
    <?php include('Views/Templates/header.php');?>
    <div class="stdr_view user_profile_view">
        <p class="title_welcome_user">Bonjour, {username}</p>
        <div class="change_information">
            <div class="edit_name">
                <p>Information</p>
                <button>Editer</button>
            </div>
            <label>
                Nom d'utilisateur
                <input type="text" />
            </label>
            <label>
                Nom
                <input type="text" />
            </label>
        </div>
        <span class="delimiter"></span>
        <div class="change_information">
            <div class="edit_name">
                <p>Mot de passe</p>
                <button>Editer</button>
            </div>
            <label>
                Mot de passe
                <input type="text" />
            </label>
            <label>
                Confirmer son mot de passe
                <input type="text" />
            </label>
        </div>
        <button id="remove_account">Supprimer son compte</button>
    </div>
    <?php include_once "Views/Templates/footer.php" ?>
</body>
</html>