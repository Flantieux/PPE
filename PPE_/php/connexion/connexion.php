<?php

session_start();

$pdo = new PDO('mysql:host=localhost;dbname=PPE', 'root', 'root');

if(isset($_POST['formconnexion']))
    {
        $mailconnect=htmlspecialchars($_POST['mailconnect']);
        $mdpconnect=sha1($_POST['mdpconnect']);
        if(!empty($mailconnect) AND !empty($mdpconnect))
        {
            $requser= $pdo->prepare("SELECT * FROM Utilisateur WHERE email=? AND mdp=?");
            $requser->execute(array($mailconnect, $mdpconnect));
            $userexist= $requser->rowCount();



            if($userexist == 1)
            {
                $userinfo = $requser->fetch();

                $_SESSION['id_utilisateur']=$userinfo['id_utilisateur'];
                $_SESSION['email']=$userinfo['email'];

                header("Location:../photo_couverture_association/photo_couverture_association.php?id_utilisateur=".$_SESSION['id_utilisateur']);
            }


            else{
                $erreur = " Vous avez entré les mauvais identifiants !";
            }
        }
        else
        {
            $erreur= "Tous les champs doivent être complétés !";
        }
    }
?>



<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Accueil</title>

    <!-- Feuilles de style  -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Feuille de style  -->
    <link rel="stylesheet" href="/css/stylelogin.css">
    <link rel="stylesheet" href="css/default.css">

    <!-- Bibliothèques JQuery  -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

    <!-- Titre  -->


    <meta name = "viewport" content = "width = device-width, initial-scale = 1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <link rel="stylesheet" href="connexion.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body>

    <header>
        <?php include "../entete/entete.php"; ?>
    </header>

    <img src="fond.jpg" class="img_fond">

    <div class="container">
        <div class="columns">
            <div class="column is-three-fifths is-offset-one-fifth">
                <div class="boxconnexion fond_noir">

                    <h1 class="connexion_titre">Connexion</h1>

                    <div class="row">


                        <!-- Formulaire  -->
                        <form method="POST" action="" class="col s12">


                            <!-- Mail  -->

                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="email" class="validate" id="email" name="mailconnect" />
                                    <label for="email">Email</label>
                                </div>
                            </div>



                            <div class="row">
                                <!-- Mdp  -->
                                <div class="input-field col s12">
                                    <input type="password" id="mdp" name="mdpconnect" class="champ" />
                                    <label for="mdp">Mot de passe</label>
                                </div>
                            </div>



                            <!-- valider  -->
                            <div class="row">
                                <div class="input-field col s12 button_connexion">
                                    <button id="valide" class="btn waves-effect waves-light " type="submit" name="formconnexion" value="Je me connecte">Je me connecte
                                        <i class="material-icons right">send</i>
                                    </button>

                                </div>
                            </div>



                        </form>

                        <div class="erreur">
                            <?php
                            if(isset($erreur))
                            {
                                echo $erreur;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>