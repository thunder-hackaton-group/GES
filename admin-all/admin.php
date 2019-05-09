<!-- 

    Administration Page

-->

<?php
    session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <!-- Page header -->
        <title>Administration</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/admin.css">
    </head>


    <body>
        <?php

            if(empty($_SESSION['master'])){
                header('location: index.php?error=true');
            }
        ?>
        <nav>
            <header>
                <h1 class="Gr-titre">Administration page</h1>
                <h2>Ajouter</h2>
                <p class='rootN'>
                    <?php
                        echo $_SESSION['master'];
                    ?>
                </p>
            </header>


            <div class="list-link">
                <span id='link-1'>Créer un établissement</span>
                <br>
                <span id='link-2'>Modifier un établissement</span>
            </div>
        </nav>

        <div class='content'>
            <!-- Page d'ajout d'établissement -->
            <div id='ajoutP'>
                <form action="add.php" method="POST" id='form'>
                    <span class='form-left'>
                        <label for="">ID : </label><br>
                        <input type="text" name="id" title="Identifiant" id="" class="enter" required/>
                    </span>
                    <span class='form-left'>
                        <label for="">Nom : </label><br>
                        <input type="text" name="name" title="Nom de l'établissement" id="" class="enter" required/>
                    </span><br>
                    <span class='form-left'>
                        <label for="">Adresse : </label><br>
                        <input type="text" name="addr" title="Localisation de l'établissement" id="" class="enter" required/>
                    </span>
                    <span class='form-left'>
                        <label for="">Contact : </label><br>
                        <input type="text" name="contact" title="Contact" id="" class="enter" required/>
                    </span>
                    <span><br>
                        <label for="">Email : </label><br>
                        <input type="email" name="mail" title="Email" id="" class="enter" required/>
                    </span><br>
                    <span><br>
                        <label for="">Slogan : </label><br>
                        <input type="text" name="slogan" title="Slogan" id="" class="enter" required/>
                    </span><br>

                    <p style='color:green;font-weight:bold;opacity:
                    <?php
                        if (isset($_GET['done']) || isset($_GET['alre'])){
                            echo 1;
                        }
                        else{
                            echo 0;
                        }
                    ?>
                    ;text-align:center;transition: opacity 0.5s' id="done"><?php
                            if(isset($_GET['alre'])){
                                echo 'Identifiant existant déjà';
                            }
                           else{
                              echo 'Ecole créée';
                           }     
                                
                        ?></p>

                    <input type="submit" value="Créer" class="valider" id="valider"/>
                </form>
            </div>

            <script type='text/javascript'>
                var alerte = document.getElementById('done');

                if(alerte.style.opacity == 1){
                    setTimeout(function(){
                        alerte.style.opacity = 0;
                    },5000);
                }
            </script>

            <!-- Page de modification d'établissement -->
            <div id="updateP">
                <div id='modifyP'>
                <div class="custom-select" style="height: 70px;width:100%;margin-left:10%;">
                    <select id="slc">
                        <option>Ecole</option>
                        <?php
                            require 'connexBdd.php';

                            $req = $db->prepare('SELECT * FROM Etablissement');
                            $req->execute() or exit(print_r($req->errorInfo()));

                            while($data = $req->fetch()){
                                echo '<option value="' . $data['nom_etablissement'] . '">' . $data['nom_etablissement'] . '</option>';
                            }


                        ?>
                    </select>
                    <form action="suppr.php" method="GET">
                        <input type="hidden" name="valeur" value="" id="valeur" required/>
                        <input class="delete" type='submit' value='Supprimer' title="Supprimer l'Ecole"/>
                    </form>
                </div>

                <div>
                    <form action='modify.php' method="POST" id='newsdata'>
                        <input type='hidden' name='id' value='' id='id_et'/>
                        <span class='form-left'>
                            <label for="">Nom : </label><br>
                            <input type="text" name="name" title="Nom de l'établissement" id="nom_et" class="enter" required/>
                        </span>
                        <span class='form-left'>
                            <label for="">Adresse : </label><br>
                            <input type="text" name="addr" title="Localisation de l'établissement" id="addr_et" class="enter" required/>
                        </span><br>
                        <span class='form-left'>
                            <label for="">Contact : </label><br>
                            <input type="text" name="contact" title="Contact" id="contact_et" class="enter" required/>
                        </span><br>
                        <span class='form-left'>
                            <label for="">Email : </label><br>
                            <input type="email" name="mail" title="Email" id="mail_et" class="enter" required/>
                        </span><br>
                        <span><br>
                            <label for="">Slogan : </label><br>
                            <input type="text" name="slogan" title="Slogan" id="slogan_et" class="enter" required/>
                        </span><br>

                        <p style='color:green;font-weight:bold;opacity:
                        <?php
                            if (isset($_GET['modified']) || isset($_GET['deleted'])){
                                echo 1;
                            }
                            else{
                                echo 0;
                            }
                        ?>
                        ;text-align:center;transition: opacity 0.5s' id="done">
                        <?php
                            if(isset($_GET['modified'])){
                                echo 'Informations modifiés';
                            }
                           elseif (isset($_GET['deleted'])) {
                              echo 'Ecole supprimé';
                           }     
                                
                        ?></p>

                        <input type="submit" value="Modifier" class="valider" id="modify"/>
                    </form>
                </div>
            </div>
            </div>
        </div>

        <script type="text/javascript" src="js/linking.js"></script>
        <script type="text/javascript" src="js/selected.js"></script>
    </body>

</html>