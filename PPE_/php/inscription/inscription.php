<?php

try
{
    // On se connecte à MySQL
    $pdo = new PDO('mysql:host=localhost;dbname=PPE','root','root');
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$erreur->getMessage());
}


session_start();

$pdo = new PDO('mysql:host=localhost; dbname=PPE','root','root');

if(isset($_POST['forminscription']))
{
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $tel = htmlspecialchars($_POST['tel']);
    $statut = htmlspecialchars($_POST['statut']);
    $entreprise = htmlspecialchars($_POST['entreprise']);
    $mdp = sha1($_POST['mdp']);
    $mdp2 = sha1($_POST['mdp2']);

    if((!empty($_POST['nom'])) AND (!empty($_POST['prenom'])) AND (!empty($_POST['email']))
        AND (!empty($_POST['tel'])) AND (!empty($_POST['statut'])) AND (!empty($_POST['entreprise']))
        AND (!empty($_POST['mdp'])) AND (!empty($_POST['mdp2'])))
    {
        $nomlength = strlen($nom);
        $prenomlength = strlen($prenom);

        if($nomlength <= 20)
        {
            if($prenomlength <= 20)
            {
                if(filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    $reqmail = $pdo->prepare("SELECT * FROM utilisateur WHERE email=?");
                    $reqmail->execute(array($email));
                    $mailexist=$reqmail->rowCount();

                    if($mailexist==0)
                    {
                        if($mdp == $mdp2)
                        {

                            $insertmbr = $pdo->prepare("INSERT INTO utilisateur(nom, prenom, email, tel, statut, entreprise,mdp) VALUES(?, ?, ?, ?, ?, ?, ?)");
                            $insertmbr->execute(array($nom, $prenom, $email, $tel, $statut, $entreprise, $mdp));
                            $requser= $pdo->prepare("SELECT * FROM utilisateur WHERE email=? AND mdp=?");
                            $requser->execute(array($email,$mdp));
                            $userinfo = $requser->fetch();
                            $_SESSION['email']=$userinfo['email'];
                        }
                        else
                        {
                            $erreur = "Vos mots de passe doivent être identiques";
                        }
                    }
                    else
                    {
                        $erreur="Adresse e-mail déjà utilisée";
                    }
                }
                else
                {
                    $erreur = "Votre adresse e-mail n'est pas valide";
                }
            }
            else
            {
                $erreur = "Votre prénom ne doit pas dépasser 20 caractères";
            }
        }
        else
        {
            $erreur = "Votre nom ne doit pas dépasser 20 caractères";
        }
    }
    else
    {
        $erreur = "Tous les champs doivent être complétés";
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
    <link rel="stylesheet" href="inscription.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body>

<header>
    <?php include "../entete/entete.php"; ?>
</header>

<img src="fond.jpg" class="img_fond">

<div class="container">
    <div class="columns">
        <div class="column is-11 is-offset-1 ecart">
            <div class="fond_noir">

                <h1 class="titre_inscription">Inscription</h1>

                <div class="row">

                    <!-- Début du formulaire  -->
                    <form method="POST" action="" class="col s12">

                        <div class="row">

                            <!-- Nom  -->
                            <div class="input-field col s6">
                                <input id="nom" type="text" class="validate" name="nom" value="<?php if(isset($nom)) {echo $nom;} ?>">
                                <label for="nom">Nom</label>
                            </div>

                            <!-- Prénom  -->
                            <div class="input-field col s6">
                                <input id="prenom" type="text" class="validate" name="prenom" value="<?php if(isset($prenom)) {echo $prenom;} ?>">
                                <label for="prenom">Prénom</label>
                            </div>

                        </div>

                        <!-- mail  -->
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="email" class="validate" id="email" name="email" value="<?php if(isset($email)) {echo $email;} ?>" >
                                <label for="email">Email</label>
                            </div>
                        </div>

                        <!-- Telehone  -->
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="tel" class="validate" id="tel" name="tel" value="<?php if(isset($tel)) {echo $tel;} ?>" >
                                <label for="tel">Telephone</label>
                            </div>
                        </div>


                        <div class="row">

                            <!-- Statut  -->
                            <div class="input-field col s6">
                                <input id="statut" type="text" class="validate" name="statut" value="<?php if(isset($statut)) {echo $statut;} ?>">
                                <label for="statut">Statut</label>
                            </div>

                            <!-- Nom Entreprise  -->
                            <div class="input-field col s6">
                                <input id="entreprise" type="text" class="validate" name="entreprise" value="<?php if(isset($entreprise)) {echo $entreprise;} ?>">
                                <label for="entreprise">Nom Entreprise</label>
                            </div>

                        </div>

                        <div class="row">
                            <!-- Mdp  -->
                            <div class="input-field col s6">
                                <input type="password" id="mdp" name="mdp"class="validate" />
                                <label for="mdp">Mot de passe</label>
                            </div>

                            <!-- Mdpconfirmation  -->
                            <div class="input-field col s6">
                                <input type="password" id="mdp2" name="mdp2" class="validate" />
                                <label for="mdp">Confirmation mot de passe</label>
                            </div>
                        </div>



                        <!-- valider  -->
                        <div class="row">
                            <div class="input-field col s6">
                                <button id="valide" class="btn waves-effect waves-light red accent-3" type="submit" name="forminscription" value="Je m'inscris">Je m'inscris
                                    <i class="material-icons right">send</i>

                                </button>
                            </div>

                        </div>

                        <a href="connexion.html" class="">Déjà inscrit ? Connectez-vous ici!</a>






                    </form>
                    <!-- fin du formulaire
                      -->

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