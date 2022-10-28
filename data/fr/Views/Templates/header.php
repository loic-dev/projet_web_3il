<?php $auth = $_SESSION['login'];?>
<header id="hamburger_menu">
    <div class="section-header">
        <div class="hamburger_menu_div">
            <p id="logo">Logo</p>
            <em id="hamburger_icon" class="fa-bars svg-primary-grey icon-25"> </em>
        </div>
        <div id="hamburger_menu_nav">
            <div class="container_list">
                <span class="list_menu buttons yellowButton"><a href="../fr/publish-an-ad">Ajouter une annonce</a></span>
                <?php if(!$auth){ ?>
                    <span class="list_menu buttons greyButton"><a href="../fr/login">Connectez-vous</a></span>
                <?php } else { ?>
                    <span class="list_menu"><a href="../fr/my-adverts">Mes annonces</a></span>
                    <span class="list_menu"><a href="../fr/profile">Mon compte</a></span>
                <?php }?>

            </div>
            
        

        </div>




    </div>
    
</header>