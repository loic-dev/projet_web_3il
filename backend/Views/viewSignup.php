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

require_once 'Controllers/controllerIndex.php'
?>

<section class="auth-page">
    <div class="container-logo">
        <img src="../Public/images/club-logo.png" alt="logo - Le Club - SALLE DE CONCERT">
    </div>
    <form action="" method="post" class="form-post">
        <section class="section-form">
            <div class="container-box">
                <div class="title-container">
                    <span class="main-title">Création de compte</span>
                    <span class="small-title">Créez votre compte pour découvrir toutes nos fonctionnalités.</span>
                </div>

                <div class="input-row-container">
                    <div class="container-input">
                        <span>Nom</span>
                        <input type="text" name="name" class="form-input" required>
                    </div>
                    <div class="container-input">
                        <span>Prenom</span>
                        <input type="text" name="surname" class="form-input" required>
                    </div>
                </div>

                <div class="container-input">
                    <span>email</span>
                    <input type="email" name="emailInput" class="form-input" required>
                </div>

                <div class="container-input">
                <i class="fa-solid fa-square-question"></i>
                    <span>Mot de passe </span>
                    <input type="password" name="password" class="form-input" required>
                </div>

                <div class="container-input">
                    <span>confirmer le mot de passe</span>
                    <input type="password" name="confirmPassword" class="form-input" required>
                </div>

                <button class="form-submit-button" type="submit">S'inscire</button>

                <span class="other-form-text">Vous avez déja un compte ? <a href="localhost:8000/login">Connectez-vous</a></span>
            </div>
        <section>
        
    </form>
   

</section>