<div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar">
    <div style="position: relative; z-index: 498768541321;">
        <div class="uk-background-cover uk-light uk-flex-top back-top uk-overflow-hidden">
        <nav uk-navbar>
            <div class="uk-navbar-left place">
                <h3><span uk-icon="icon: pagekit;ratio:2"></span>  GES</h3>
            </div>
            <div class="uk-navbar-right">

                

                <ul class="uk-navbar-nav">
                    
                    
                    <li class="uk-button uk-button-text link-top">
                        
                        <a href="#" class="uk-navbar-toggle"><span uk-icon="icon: search;ratio: 1"></span>  Rechercher</a>
                        <div class="uk-drop" uk-drop="mode: click; pos: left-center; offset: 0">
                            <form class="uk-search uk-search-navbar uk-width-1-1">
                                <input class="uk-search-input" type="search" placeholder="Search..." autofocus>
                            </form>
                        </div>
                    </li>
                    <li>
                        <a href="../model/deconnex.php" class='uk-button uk-button-text link-top'><span uk-icon="icon: sign-out;ratio: 1"></span>   Se deconnecter</a>
                    </li>
                    <li id="profil">
                        <a href="" class='uk-button uk-button-text link-top'>
                            <div class="margines">
                                <div class="uk-grid-small uk-flex-middle" uk-grid>
                                    <div class="uk-width-auto">
                                        <img class="profil-img" src="photo/<?php echo $_SESSION['photo']; ?>">
                                    </div>
                                    <div class="">
                                        <span class="uk-margin-remove-bottom"><?php echo $_SESSION['prenom'] ?></span>
                                    </div>
                                </div>            
                            </div>
                        </a>
                    </li>   
                </ul>
            </div>
        </nav>

        <div class='tabHead'>
            <ul class="uk-child-width-expand" uk-tab>
                <li id="acceuil"><a href="#" class="pad"><span uk-icon="icon: home;ratio: 0.9"></span><span style="padding-left:1vw">Accueil<span></a></li>
                <li id="notification"><a href="#" class="pad"><span uk-icon="icon: bell;ratio: 0.9"></span><span style="padding-left:1vw">Notification<span></a></li>
                <li id="message"><a href="#" class="pad"><span uk-icon="icon: comment;ratio: 0.9"></span><span style="padding-left:1vw">Messages<span></a></li>
                <li id="doc"><a href="#" class="pad"><span uk-icon="icon: folder;ratio: 0.9"></span><span style="padding-left:1vw">Documents<span></a></li>
                <li id="calendar"><a href="#" class="pad"><span uk-icon="icon: calendar;ratio: 0.9"></span><span style="padding-left:1vw">Calendar<span></a></li>
            </ul>
            
        </div>
        
        </div>
    </div>
</div>