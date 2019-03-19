<?php ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Acceuil</title>
    <meta name = "viewport" content = "width = device-width, initial-scale = 1">

    <!-- Feuilles de style  -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <link rel="stylesheet" href="entete.css">
    <!-- Feuille de style  -->

</head>
<body>
<header class="navbar-fixed position">
    <nav>

        <div id="corps" class="nav-wrapper teal lighten-2">
            <ul class="left-align">
                <li>


                    <div class="hide-on-med-and-down" id="topbarsearch">
                        <div class="input-field col s6 s12 white-text">
                            <input type="text" placeholder="Rechercher" id="autocomplete-input" class="autocomplete white-text" >
                        </div>
                    </div>


                </li>
            </ul>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="../accueil/accueil.php">Accueil</a></li>
                <li><a href="../connexion/connexion.php">Connexion</a></li>
                <li><a href="../inscription/inscription.php"">Inscription</a></li>
            </ul>
        </div>

    </nav>


</header>
</body>


