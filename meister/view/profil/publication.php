<div class="uk-margin">
    <div class="uk-card uk-card-default uk-card-body">
        <button class="uk-card-badge uk-button uk-label shareB" uk-toggle="target: #modal-close-outside"><span uk-icon="icon: forward;ratio: 1.5"></span></button>
        <div uk-dropdown="" class="alertP">
            Nouvelle publication
        </div>
    </div>
</div>

<!-- This is the modal for choosing the type of post -->
<div id="modal-close-outside" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-outside" type="button" uk-close></button>
        <h2 class="uk-modal-title">Publier</h2>
        <button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom" uk-toggle="target: #new-Share">Nouvelle Publication</button>
        <button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom" uk-toggle="target: #new-Event">Nouvelle Evènement</button>
    </div>
</div>

<!-- Pour une nouvelle publication -->
<div id="new-Share" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-outside" type="button" uk-close></button>
        <form method="post" action="../model/addPub.php" enctype="multipart/form-data">
            <fieldset class="uk-fieldset">

                <legend class="uk-legend">Nouvelle Publication</legend>

                <div class="uk-margin">
                    <textarea class="uk-textarea" rows="5" placeholder="Description" name="descPub"></textarea>
                </div>

                <div class="uk-margin uk-text-center fichPub">
                    <span class="uk-text-middle">Ajouter un</span>
                    <div uk-form-custom>
                        <input type="file" name="filePub">
                        <span class="uk-link">Fichier <span uk-icon="icon: link;ratio: 1"></span></span>
                    </div>
                </div>

                <div class="uk-margin uk-text-center">
                    <input type="submit" class="share" name="share" value="Partager">
                </div>

            </fieldset>
        </form>
    </div>
</div>


<!-- Pour une nouvelle évènement -->
<div id="new-Event" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-outside" type="button" uk-close></button>
        <form method='post' action="../model/addEvent.php" enctype="multipart/form-data">
            <fieldset class="uk-fieldset">

                <legend class="uk-legend">Nouvelle Evènement</legend>

                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: tag"></span>
                        <input class="uk-input" type="text" name='Eventname' placeholder="Nom de l'évènement" required="required">
                    </div>
                </div>

                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: calendar"></span>
                        <input class="uk-input" type="date" name='Eventdate' required="required">
                    </div>
                </div>

                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: clock"></span>
                        <input class="uk-input" type="time" name='Eventtime' required="required">
                    </div>
                </div>

                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: location"></span>
                        <input class="uk-input" type="text" name='Eventplace' placeholder="Lieu de l'évènement" required="required">
                    </div>
                </div>

                <div class="uk-margin">
                    <textarea class="uk-textarea" rows="5" name='Eventdesc' placeholder="Description"></textarea>
                </div>

                <div class="uk-margin uk-text-center">
                    <input type="submit" class="share" name="share" value="Partager">
                </div>

            </fieldset>
        </form>
    </div>
</div>

<?php
    $ftc = $db->prepare('SELECT * FROM pub WHERE id_profil=:session');
    $ftc->bindParam(':session', $_SESSION['id']);
    $ftc->execute() or exit(print_r($ftc->errorInfo()));

    while ($got = $ftc->fetch()) {

        if(!empty($got['fichier_pub'])){
            if ($got['type_fichier'] == 'Image') {
                
?>
            
                <div class="uk-card uk-card-default uk-flex-bottom uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
                    <div class="uk-flex-last@s uk-card-media-right uk-cover-container">
                        <img src="pubFile/<?php echo $got['fichier_pub']; ?>" alt="" uk-cover>
                        <canvas width="600" height="400"></canvas>
                    </div>
                <div>
                <div class="uk-card-header">
                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                        <div class="uk-width-auto">
                            <img class="uk-border-pill" width="40" height="40" src="photo/<?php echo $_SESSION['photo']; ?>">
                        </div>
                        <div class="uk-width-expand">
                            <h4 class="uk-card-title uk-margin-remove-bottom"><?php echo $_SESSION['nom'] . ' '. $_SESSION['prenom']; ?></h4>
                            <p class="uk-text-meta uk-margin-remove-top"><time datetime="2019-04-01T19:00"><?php echo $got['date_pub']; ?></time></p>
                        </div>
                    </div>
                </div>
                <div class="uk-card-body">
                    <p><?php echo $got['desc_pub']; ?></p>
                </div>
                <div class="uk-card-footer">
                    <div class="uk-grid-divider uk-child-width-expand@s" uk-grid>
                        <div><span class="uk-margin-small-right" uk-icon="icon: heart"></span> </div>
                        <div><span class="uk-margin-small-right" uk-icon="icon: comment"></span></div>
                        <div><a href="#modal-center" class="" uk-toggle><span class="uk-margin-small-right" uk-icon="icon: more"></span></a></div>
                    </div>
                    
                    <!-- Modal -->
                    <div id="modal-center" class="uk-modal-center uk-modal" uk-modal>
                        <div class="uk-modal-dialog uk-modal-body">
                            <button class="uk-modal-close-default" type="button" uk-close></button>
                            <div class="uk-card-header">
                                <div class="uk-grid-small uk-flex-middle" uk-grid>
                                    <div class="uk-width-auto">
                                        <img class="uk-border-pill" width="40" height="40" src="photo/<?php echo $_SESSION['photo']; ?>">
                                    </div>
                                    <div class="uk-width-expand">
                                        <h4 class="uk-card-title uk-margin-remove-bottom"><?php echo $_SESSION['nom'] . ' '. $_SESSION['prenom']; ?></h4>
                                        <p class="uk-text-meta uk-margin-remove-top"><time datetime="2019-04-01T19:00"><?php echo $got['date_pub']; ?></time></p>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-card-body">
                                <p><?php echo $got['desc_pub']; ?></p>
                                <div class="uk-flex-last@s uk-card-media-right uk-cover-container">
                                    <div class="uk-overflow-hidden">
                                        <img src="pubFile/<?php echo $got['fichier_pub']; ?>" alt="Example image" uk-scrollspy="cls: uk-animation-kenburns; repeat: true">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
<?php
        }
    }
?>

    <?php } ?>