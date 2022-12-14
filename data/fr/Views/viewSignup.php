<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include('Views/Templates/head.php');?>
    <link rel="stylesheet" href="/Public/dist/bundle.head.css">
    <link rel="stylesheet" href="/Public/CSS/viewAuth.css">
    <link rel="stylesheet" href="/Public/CSS/ring.css">
    <link rel="stylesheet" href="/Public/CSS/viewSignup.css">
</head>
<body class="preload">
    <section class="auth-page">
        <div class="container-logo">
           <!-- <img src="../Public/media/club-logo.png" alt="logo - Le Club - SALLE DE CONCERT">-->
        </div>
        <form class="form-post" id="signup-form">
            <section class="section-form">
                <div class="container-box">
                    <div class="error-container">
                        <span id="error-signup">error</span>
                    </div>
                    <div class="title-container">
                        <span class="main-title">Création de compte</span>
                        <span class="small-title">Créez votre compte pour découvrir toutes nos fonctionnalités.</span>
                    </div>
                    <div class="container-form">
                       
                        <div class="container-input">
                            <span>Nom de la structure</span>
                            <input type="text" name="name" id="signup-input-name" class="form-input" required>
                            <small id="name_error">Lettres uniquement</small>
                        </div>
                    
                        

                        <div class="container-input">
                            <span>email</span>
                            <input type="email" name="emailInput" id="signup-input-email" class="form-input" required>
                            <small id="emailInput_error">Email incorrect</small>
                        </div>

                        <div class="container-input">
                            <span>Mot de passe </span>
                            <input type="password" name="password" id="signup-input-password" class="form-input" autocomplete="on" required>
                            <small id="password_error">Mot de passe trop faible</small>
                        </div>

                        <div class="container-input">
                            <span>confirmer le mot de passe</span>
                            <input type="password" name="confirmPassword" id="signup-input-confirmPassword" class="form-input" autocomplete="on" required>
                            <small id="confirmPassword_error">Les mots de passe ne correspondent pas</small>
                        </div>

                        <button class="form-submit-button" id="submit-button" type="submit">S'inscrire</button>
                        
                        <span class="other-form-text">Vous avez déja un compte ? <a href="../fr/login">Connectez-vous</a></span>
                    </div>
                </div>
            <section>
            
        </form>
    

    </section>
    <script type="module" src="../../Public/js/signup.js"></script>
    <script type="module" src="../../Public/js/all.js"></script>
</body>
</html>
