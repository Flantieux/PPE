<?php

session_start();

$pdo = new PDO('mysql:host=localhost;dbname=PPE', 'root', 'root');

if (isset($_FILES['photo_couverture']) and !empty($_FILES['photo_couverture']['name']))
{
    $taille_max = 2097152;
    $extension_valide = array('jpg', 'jpeg', 'png', 'gif');
    if($_FILES['photo_couverture']['size']<=$taille_max)
    {
        $extension_upload = strtolower(substr(strrchr($_FILES['photo_couverture']['name'],'.'),1));  //tout mettre en minuscule
        if (in_array($extension_upload,$extension_valide)){

            $chemin="php/photo_couverture_association/photo_couverture/".$_SESSION['id_utilisateur'].".".$extension_upload;
            $resultat = move_uploaded_file($_FILES['photo_couverture']['tmp_name'], $chemin);
            if ($resultat)
            {
                $update_photo_couverture = $pdo->prepare('UPDATE description SET photo_couverture = :photo_couverture where id_utilisateur=:id_utilisateur');
                $update_photo_couverture = execute(array(
                    'photo_couverture' => $_SESSION['id_utilisateur'].".".$extension_upload,
                    'id_utilisateur'=>$_SESSION['id_utilisateur']
                ));
            }
            else{
                $msg="erreur lors de l'importation de votre photo";
            }
        }
        else{
            $msg="Votre photo de profil doit être au format jpg jpeg png gif";
        }
    }
    else{
        $msg="Votre photo ne doit pas dépasser 2Mo";
    }

}
?>


<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <meta name = "viewport" content = "width = device-width, initial-scale = 1">
    <link rel = "stylesheet"
          href = "https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel = "stylesheet"
          href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="photo_couverture_association.css">
    <script type = "text/javascript"
            src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js">
    </script>

</head>

<header>
    <?php include "../entete/entete.php"; ?>
</header>

<body>

        <div class="delimitation_photo_couverture">

            <img src="photo_couverture/association.png" class="photo_couverture">
            <input type="file" class="button_changement" enctype="multipart/form-data" name="photo_couverture"><i class="fas fa-tools taille_logo"></i></input>
        </div>

        <div class="menu">
            <div id="Description">
                <a href="Description.html" class="waves-effect waves-light btn">Description</a>
            </div>
            <div id="Evenement">
                <a href="Evenement.html" class="waves-effect waves-light btn">Evénements</a>
            </div>
            <div id="Description">
                <a href="Prestation.html" class="waves-effect waves-light btn">Ce que l'on propose</a>
            </div>
            <div id="Partenaire">
                <a href="Partenaire.html" class="waves-effect waves-light btn">Partenaires</a>
            </div>
            <div id="Contacts">
                <a href="Contact.html" class="waves-effect waves-light btn">Contact</a>
            </div>
        </div>





</body>