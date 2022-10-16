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

require_once 'Controllers/controllerIndex.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include('Views/Templates/head.php');?>
    <link rel="stylesheet" href="../../Public/CSS/viewAuth.css">
    <link rel="stylesheet" href="../../Public/CSS/ring.css">
</head>
<body>
    <section class="auth-page">
        <div class="container-logo">
            <img src="../Public/images/club-logo.png" alt="logo - Le Club - SALLE DE CONCERT">
        </div>
        <form action="" method="post" id="login-form">
            <section class="section-form">
                <div class="container-box">
                    <div class="error-container">
                        <span id="error-signup"></span>
                    </div>
                    <div class="title-container">
                        <span class="main-title">Espace de connexion</span>
                        <span class="small-title">Connectez-vous pour découvrir toutes nos fonctionnalités</span>
                    </div>

                    <div class="container-input">
                        <span>email</span>
                        <input type="email" name="emailInput" id="login-input-email" class="form-input" required>
                    </div>

                    <div class="container-input">
                        <span>password</span>
                        <input type="password" name="emailInput" id="login-input-password" class="form-input" required>
                        <span class="small-text-input"><a href="">mot de passe oublié ?</a></span>
                    </div>

                    <button class="form-submit-button active" id="submit-button" type="submit">connexion</button>

                    <span class="other-form-text" >Vous n'avez pas encore de compte ? <a href="../signup">Créer un compte</a></span>
                </div>
            <section>
        </form>
    </section>
    <script type="module" src="../../Public/js/login.js"></script>
</body>
</html>