<?php $auth = $_SESSION['login'];?>
<header id="hamburger_menu">
    <div class="section-header">
        <div class="hamburger_menu_div">
            <a id="logo" href="/">Logo</a>
            <!-- <em id="hamburger_icon" class="fa-bars svg-primary-grey icon-25"> </em> -->

            <svg id="hamburger_icon" class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!-- Font Awesome Pro 6.0.0-alpha2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M416 224H32C14.327 224 0 238.327 0 256V256C0 273.673 14.327 288 32 288H416C433.673 288 448 273.673 448 256V256C448 238.327 433.673 224 416 224ZM416 384H32C14.327 384 0 398.327 0 416V416C0 433.673 14.327 448 32 448H416C433.673 448 448 433.673 448 416V416C448 398.327 433.673 384 416 384ZM416 64H32C14.327 64 0 78.327 0 96V96C0 113.673 14.327 128 32 128H416C433.673 128 448 113.673 448 96V96C448 78.327 433.673 64 416 64Z"/></svg>

        </div>
        <div id="hamburger_menu_nav">
            <div class="container_list">
                <a href="../fr/publish-an-ad" class="list_menu buttons yellowButton"><span >Ajouter une annonce</span></a>
                <?php if(!$auth){ ?>
                    <a href="../fr/login" class="list_menu buttons greyButton"><span >Connectez-vous</span></a>
                <?php } else { ?>
                    <a href="../fr/my-adverts" class="list_menu"><span >Mes annonces</span></a>
                    <a href="../fr/profile" class="list_menu" ><span >Mon compte</span></a>
                <?php }?>
            </div>
        </div>
    </div>
</header>