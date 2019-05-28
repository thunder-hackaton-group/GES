<nav uk-sticky>
    <div>
        <div class="orange uk-background-primary uk-light uk-padding-small uk-panel">
            <div class="uk-align-right">
                <ul class="uk-subnav uk-subnav-divider uk-margin">
                    <li class="uk-active uk-animation-fade"><a href="#" class="uk-button uk-button-text">Accueil</a></li>
                    <?php
                        if (!empty($_SESSION['id'])){
                            echo '<li><a href="#" class="uk-button uk-button-default uk-button-small border">Profil</a></li>';
                            echo '<span uk-dropdown="pos: right-center">' . $_SESSION['name'] . '</span>';
                        }
                        else{
                            echo '<li><a href="#" class="uk-button uk-button-default uk-button-small border">Se connecter</a></li>';
                        }
                    ?>
                    
                    <li>
                        <a href="#" uk-icon="menu"></a>
                        <div uk-dropdown>
                            <ul class="uk-nav uk-dropdown-nav">
                                <li class="uk-active"><a href="#"><span class="uk-margin-small-right" uk-icon="icon: home"></span>Accueil</a></li>
                                <?php
                                    if (!empty($_SESSION['id'])){
                                        echo '
                                        <li><a href="deconnex.php"><span class="uk-margin-small-right" uk-icon="icon: sign-out"></span>Se déconnecter</a></li>';
                                    }
                                    else {
                                        echo '<li><a href=""><span class="uk-margin-small-right" uk-icon="icon: sign-in"></span>Se connecter</a></li>';
                                    }
                                ?>
                                <li class="uk-nav-divider"></li>
                                <?php
                                    if (!empty($_SESSION['id'])){
                                        echo '
                                        <li>
                                            <a href="">
                                                <span class="uk-margin-small-right" uk-icon="icon: mail"></span>Messages<span class="uk-badge">1</span>
                                            </a>
                                        </li>
                                        ';
                                    }
                                ?>
                                
                                <li class="uk-nav-header">Rechercher</li>
                                <li><span class="uk-margin-small-right" uk-icon="icon: search"></span> <input class="uk-search-field" type="search" placeholder="Search..."></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>