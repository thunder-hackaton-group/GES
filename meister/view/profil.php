<ul class='profil-tab' uk-tab>
    <li class="tabed"><a id="pr">Profil</a></li>
    <li class="tabed"><a id="pub">Publications</a></li>
    <li class="tabed"><a id="par">Paramètre</a></li>
</ul>
<div id='pr' class="uk-card-header uk-height-small uk-background-cover uk-light uk-flex backP" uk-parallax="bgy: 5">
    <div class="uk-grid-small uk-flex-middle" uk-grid>
        <div class="uk-width-auto" uk-lightbox>
            <a class='profilImg' style='background-color:trasparent !important' href="photo/<?php echo $_SESSION['photo']; ?>" data-caption="<?php echo $_SESSION['nom']. ' '. $_SESSION['prenom']; ?>">
                <img class="profilImg" src="photo/<?php echo $_SESSION['photo']; ?>">
            </a>
        </div>
        <div class="uk-width-expand">
            <h3 class="uk-card-title uk-margin-remove-bottom title-pr"><?php echo $_SESSION['nom']. ' ' . $_SESSION['prenom']; ?></h3>
            <p class="uk-text-meta uk-margin-remove-top"><?php echo $_SESSION['mail']; ?></p>
        </div>
    </div>
</div>

<div class="">
    <ul id="control-profil" class="uk-switcher">
        <li>
            <?php
                require 'modifProfil.php';
            ?>
            <div class="uk-margin">
                <div class="uk-card uk-card-default uk-card-body">
                    <button class="uk-card-badge uk-button uk-label shareB" uk-toggle="target: #modal-mod"><span uk-icon="icon: pencil;ratio: 1.5"></span></button>
                    <div uk-dropdown="" class="alertP">
                        Modifier mes informations
                    </div>
                </div>
            </div>

            <div class="uk-card-body">
                <div class="uk-child-width-1-2" uk-grid uk-scrollspy="cls: uk-animation-slide-right; target: .ud; delay: 300; repeat: true">
                <!-- Nom et prenom -->
                    <div class='ud'>
                        <div class="uk-card uk-card-default uk-card-hover uk-card-small uk-card-body">
                            <h4 class="offup">Nom</h4>
                            <p><?php echo $_SESSION['nom']. ' ' . $_SESSION['prenom']; ?></p>
                        </div>
                    </div>
                    <!-- Date de naissance -->
                    <div class='ud'>
                        <div class="uk-card uk-card-default uk-card-hover uk-card-small uk-card-body">
                            <h4 class="offup">Date da naissance</h4>
                            <p><?php echo $_SESSION['naiss'] ?></p>
                        </div>
                    </div>

                    <!-- Identifiant -->
                    <div class="uk-margin ud">
                        <div class="uk-card uk-card-default uk-card-hover uk-card-small uk-card-body">
                            
                            <h4 class="offup">Identifiant</h4>
                            <p><?php echo $_SESSION['mail']; ?></p>
                        </div>
                    </div>

                    <!-- Sexe -->
                    <div class="uk-margin ud">
                        <div class="uk-card uk-card-default uk-card-hover uk-card-small uk-card-body">
                            <h4 class="offup">Sexe</h4>
                            <p><?php echo $_SESSION['sexe']; ?></p>
                        </div>
                    </div>

                    <!-- Classe -->
                    <div class="uk-margin ud">
                        <div class="uk-card uk-card-default uk-card-hover uk-card-small uk-card-body">
                            <h4 class="offup">Classe</h4>
                            <p><?php echo $_SESSION['class']; ?></p>
                        </div>
                    </div>

                    <!-- Pays -->
                    <div class="uk-margin ud">
                        <div class="uk-card uk-card-default uk-card-hover uk-card-small uk-card-body">
                            <h4 class="offup">Pays</h4>
                            <p><?php echo $_SESSION['pays']; ?></p>
                        </div>
                    </div>

                    <!-- Ville -->
                    <div class="uk-margin ud">
                        <div class="uk-card uk-card-default uk-card-hover uk-card-small uk-card-body">
                            <h4 class="offup">Ville</h4>
                            <p><?php echo $_SESSION['ville']; ?></p>
                        </div>
                    </div>

                    <?php
                        if ($_SESSION['class'] == 'Etudiant') {

                    ?>
                    <!-- Niveau -->
                    <div class="uk-margin ud">
                        <div class="uk-card uk-card-default uk-card-hover uk-card-small uk-card-body">
                            <h4 class="offup">Niveau</h4>
                            <p><?php echo $_SESSION['level']; ?></p>
                        </div>
                    </div>
                        <?php } ?>

                </div>
            </div>
        </li>

        <li>
            <?php
                require 'profil/publication.php';
            ?>
        </li>

        <li>
            <div class="uk-child-width-expand@s uk-text-center margin-top" uk-grid>
                <div>
                    <div class="uk-card uk-card-secondary z uk-card-body compteParam">
                        <a href="#modal-pass" class="uk-button link" uk-toggle>Changer mot de passe</a>

                        <!-- Confirmation de supprimer le compte -->
                        <div id="modal-pass" uk-modal>
                            <div class="uk-modal-dialog uk-modal-body">
                            <button class="uk-modal-close-outside" type="button" uk-close></button>
                                <h2 class="uk-modal-title"><span uk-icon="icon: pencil;ratio:1.5"></span>   Mot de passe</h2>

                                <form method="post" action="../model/profilEdit.php" enctype="multipart/form-data">

                                    <div class="uk-inline uk-width-1-1 uk-margin">
                                        <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                        <input class="uk-input" type="password" name="Ancienpassword" placeholder='Ancien mot de passe' required='required'>
                                    </div>

                                    <div class="uk-inline uk-width-1-1 uk-margin">
                                        <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                        <input class="uk-input" type="password" name="nouveaupassword" placeholder='Nouveau mot de passe' required='required'>
                                    </div>

                                    <div class="uk-inline uk-width-1-1 uk-margin">
                                        <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                        <input class="uk-input" type="password" name="Cnouveaupassword" placeholder='Confirmez le mot de passe' required='required'>
                                    </div>

                                    <div class="uk-margin uk-text-center">
                                        <input type="submit" class="share" name="change" value="Changer le mot de passe">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-secondary r uk-card-body compteParam">
                        <a href="#modal-example" class="uk-button link" uk-toggle>Supprimer compte</a>

                        <!-- Confirmation de supprimer le compte -->
                        <div id="modal-example" uk-modal>
                            <div class="uk-modal-dialog uk-modal-body redBack">
                                <h2 class="uk-modal-title" style='color:white !important'><span uk-icon="icon: warning;ratio:1.5"></span>   Avertissement</h2>
                                <p style='color:white !important'>
                                    Souhaitez-vous réellement supprimer votre compte? <br>
                                    Cette action supprimera tous vos documents ainsi que vos données
                                </p>
                                <p class="uk-text-right">
                                    <button class="uk-button uk-button-default uk-modal-close" type="button" style='color:white !important'>Annuler</button>
                                    <a href="../model/supprProfil.php"><button class="uk-button" type="button" style='color:rgb(255, 95, 95) !important'>Confirmer</button></a> 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>

    </ul>
</div>


<div class="uk-card-footer">
    <a href="#" class="uk-button uk-button-text">Read more</a>
</div>