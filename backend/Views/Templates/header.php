
<header id="hamburger_menu">
    <div class="section-header">
        <div class="hamburger_menu_div">
            <p id="logo">Logo</p>
            <img id="hamburger_icon" src="../../Public/media/menu.png"></img>
        </div>
        <div id="hamburger_menu_nav">
            <div class="container_list">
                <span class="list_menu buttons yellowButton"><a href="../publish-an-ad">Ajouter une annonce</a></span>
                <?php if(!$auth){ ?>
                    <span class="list_menu buttons greyButton"><a href="../login">Connectez-vous</a></span>
                <?php } else { ?>
                    <span class="list_menu"><a href="../my-account">Mon compte</a></span>
                <?php }?>

            </div>
            
        

        </div>




    </div>
    
</header>