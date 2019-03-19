<?php
session_start();
ini_set('display_errors', 'On');
error_reporting(E_ALL);


$pdo = new PDO('mysql:host=localhost;dbname=PPE', 'root', 'root');


if (isset($_SESSION['id_utilisateur'])){
    $requser = $pdo ->prepare("SELECT * FROM utilisateur where id_utilisateur=?");
    $requser -> execute(array($_SESSION['id_utilisateur']));
    $user = $requser -> fetch();
}

if (isset($_POST['newnom']) AND !empty($_POST['newnom'])){
    $insertnom= $pdo -> prepare("UPDATE utilisateur FROM ")

}


/*
if(isset($_GET['id_utilisateur']) AND $_GET['id_utilisateur']>0) {
    $getid = intval($_GET['id_utilisateur']);
    $requser = $pdo->prepare('SELECT * FROM utilisateur WHERE id_utilisateur=?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();



    if (isset($_SESSION['id_utilisateur'])) {
        $requser = $pdo->prepare("SELECT * FROM utilisateur WHERE id_utilisateur=?");
        $requser->execute(array($_SESSION['id_utilisateur']));
        $user = $requser->fetch();

        if (isset($_POST['nouvnom']) AND !empty($_POST['nouvnom']) AND $_POST['nouvnom'] != $user['nom']) {
            $nouvnom = htmlspecialchars($_POST['nouvnom']);
            $insertnom = $pdo->prepare("UPDATE utilisateur SET nom = ? WHERE id_utilisateur = ?");
            $insertnom->execute(array($nouvnom, $_SESSION['id_utilisateur']));
            header('Location:parametre/parametre.php?id_utilisateur=' . $_SESSION['id_utilisateur']);
        }

        if (isset($_POST['nouvprenom']) AND !empty($_POST['nouvprenom']) AND $_POST['nouvprenom'] != $user['prenom']) {
            $nouvprenom = htmlspecialchars($_POST['nouvprenom']);
            $insertprenom = $pdo->prepare("UPDATE utilisateur SET prenom = ? WHERE id_utilisateur = ?");
            $insertprenom->execute(array($nouvprenom, $_SESSION['id_utilisateur']));
            header('Location:parametre/parametre.php?id_utilisateur=' . $_SESSION['id_utilisateur']);

        }

    }
}*/

?>





<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Paramètres</title>

    <!-- Feuilles de style  -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Bibliothèques JQuery  -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

    <!-- Titre  -->


    <meta name = "viewport" content = "width = device-width, initial-scale = 1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="../parametres/parametres.css">

</head>

<body>

<header>
    <?php include "../entete/entete.php"; ?>
</header>

<div class="couverture">
    <?php include "../photo_couverture_association/photo_couverture_association.php"; ?>
</div>

<div class="block">



    <div class="columns">

        <div class="column is-2">

            <div class="menu">
                <div id="Description">
                    <a href="Description.html" class="waves-effect waves-light btn">Messagerie</a>
                </div>
                <div id="Evenement">
                    <a href="Evenement.html" class="waves-effect waves-light btn">Devis</a>
                </div>
                <div id="Description">
                    <a href="Prestation.html" class="waves-effect waves-light btn">Paramètres</a>
                </div>
                <div id="Partenaire">
                    <a href="Partenaire.html" class="waves-effect waves-light btn">Partenaires</a>
                </div>
                <div id="Contacts">
                    <a href="Contact.html" class="waves-effect waves-light btn">Contact</a>
                </div>
            </div>

        </div>

        <div class="column">
            <div class="titre">
                <p>Paramètres</p>
            </div>

            <form method="POST" action ="" id="infogenerales">


                <div class="column is-full">

                    <!-- Nom  -->
                    <div class="input-field column is-three-fifths is-offset-one-fifth">
                        <input id="nom" type="text" class="validate" name="newnom" value="<?php if(isset($nom)) {echo $nom;} ?>">
                        <label for="nom">Nom</label>
                    </div>

                    <!-- Prénom  -->
                    <div class="input-field column is-three-fifths is-offset-one-fifth">
                        <input id="prenom" type="text" class="validate" name="newprenom" value="<?php if(isset($prenom)) {echo $prenom;} ?>">
                        <label for="prenom">Prénom</label>
                    </div>


                        <div class="input-field column is-three-fifths is-offset-one-fifth">
                            <input type="email" class="validate" id="newemail" name="newemail" value="<?php if(isset($email)) {echo $email;} ?>" >
                            <label for="email">Email</label>
                        </div>

                    <!-- Telehone  -->
                        <div class="input-field column is-three-fifths is-offset-one-fifth">
                            <input type="tel" class="validate" id="tel" name="newtel" value="<?php if(isset($tel)) {echo $tel;} ?>" >
                            <label for="tel">Telephone</label>
                        </div>

                    <!-- Nom Entreprise  -->
                    <div class="input-field column is-three-fifths is-offset-one-fifth">
                        <input id="entreprise" type="text" class="validate" name="newentreprise" value="<?php if(isset($entreprise)) {echo $entreprise;} ?>">
                        <label for="entreprise">Nom Entreprise</label>
                    </div>

                    <!-- Mdp  -->
                    <div class="row">

                        <div class="input-field column is-three-fifths is-offset-one-fifth">
                            <input type="password" id="mdp" name="newmdp"class="validate" />
                            <label for="mdp">Mot de passe</label>
                        </div>

                        <div class="input-field column is-three-fifths is-offset-one-fifth">
                            <input type="password" id="mdp" name="newmdp"class="validate" />
                            <label for="mdp">Confirmer le mot de passe</label>
                        </div>

                    </div>

            </form>

                <div class="input-field column is-three-fifths is-offset-one-fifth">
                    <button id="valide" class="btn enregister" type="submit" value="Enregistrer les modifications">Enregistrer les modifications
                        <i class="material-icons right">send</i>
                    </button>
                </div>

        </div>
    </div>
</div>

</body>

