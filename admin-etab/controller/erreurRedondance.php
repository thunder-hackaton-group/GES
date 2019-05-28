<?php
    if(isset($_GET['error'])){
        if ($_GET['error'] == "nom")
        {
            echo '<p id="error" style="visibility:visible">Oups! Il se peut que cette personne a déjà un profil sur ce site</p>';
        }
        elseif ($_GET['error'] == "contact")
        {
            echo '<p id="error" style="visibility:visible">Désolé mais le numéro de téléphone est déjà assignée avec une autre personne</p>';
        }
        elseif ($_GET['error'] == "mail")
        {
            echo '<p id="error" style="visibility:visible">Pardon mais l\'adresse email est déjà prise par un autre utilisateur</p>';
        }
        elseif ($_GET['error'] == "nomcontact")
        {
            echo '<p id="error" style="visibility:visible">Oups! Il se peut que cette personne a déjà un profil sur ce site</p>';
            echo '<p id="error" style="visibility:visible">Désolé mais le numéro de téléphone est déjà assignée avec une autre personne</p>';
        }
        elseif ($_GET['error'] == "nommail")
        {
            echo '<p id="error" style="visibility:visible">Oups! Il se peut que cette personne a déjà un profil sur ce site</p>';
            echo '<p id="error" style="visibility:visible">Pardon mais l\'adresse email est déjà prise par un autre utilisateur</p>';
        }
        elseif ($_GET['error'] == "contactmail")
        {
            echo '<p id="error" style="visibility:visible">Désolé mais le numéro de téléphone est déjà assignée avec une autre personne</p>';
            echo '<p id="error" style="visibility:visible">Pardon mais l\'adresse email est déjà prise par un autre utilisateur</p>';
        }
        else
        {
            echo '<p id="error" style="visibility:visible">Oups! Il se peut que cette personne a déjà un profil sur ce site</p>';
            echo '<p id="error" style="visibility:visible">Désolé mais le numéro de téléphone est déjà assignée avec une autre personne</p>';
            echo '<p id="error" style="visibility:visible">Pardon mais l\'adresse email est déjà prise par un autre utilisateur</p>';
        }
    }

    else
    {
        echo '<p id="error" style="visibility:hidden">Aucune erreur</p>';
    }
?>