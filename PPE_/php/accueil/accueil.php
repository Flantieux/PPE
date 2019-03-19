<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <meta name = "viewport" content = "width = device-width, initial-scale = 1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <link rel="stylesheet" href="accueil.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body>

    <header>
        <?php include "../entete/entete.php"; ?>
    </header>


    <img src="fond.jpg" class="img_fond">
    <div class="block">
        <div class="container">
            <div class="columns">
                <div class="column position_text">
                    <h1 class="bienvenue">Bienvenue sur la Plateforme</h1>
                    <h1 class="bienvenue2">Associative de l'ECE Paris - Lyon</h1>
                    <p>L'ECE Paris - Lyon est une école d'ingénieur qui compte une trentaine d'associations permettant de</p>
                    <p>fédérer les étudiants autour d'intérets communs</p>
                    <p>Cette plateforme vous permet alors de faciliter la mise en relation avec ces associations et de découvrir</p>
                    <p>les prestations qu'elles proposent</p>
                </div>
            </div>
        </div>
    </div>

    <div class="block fond_gris">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <p class="titre1">Explorer les associations de l'ECE Paris-Lyon</p>
                </div>
            </div>

            <div class="columns ecart_avec_titre">
                <div class="column">
                    <a class="balise_button">
                        <i class="fas fa-calendar-week accueil_logo"></i>
                        <p class="logo_text">Evenementiel</p>
                    </a>
                </div>
                <div class="column">
                    <a class="balise_button">
                        <i class="fas fa-globe accueil_logo "></i>
                        <p class="logo_text">Mediatique</p>
                    </a>
                </div>
                <div class="column">
                    <a class="balise_button">
                        <i class="fas fa-gamepad accueil_logo"></i>
                        <p class="logo_text">Ludique</p>
                    </a>
                </div>
                <div class="column">
                    <a class="balise_button">
                        <i class="fas fa-handshake accueil_logo"></i>
                        <p class="logo_text">Entreprise</p>
                    </a>
                </div>
                <div class="column">
                    <a class="balise_button">
                        <i class="fas fa-graduation-cap accueil_logo"></i>
                        <p class="logo_text">Etudiant</p>
                    </a>
                </div>
            </div>

            <div class="columns">
                <div class="column">
                    <a class="balise_button">
                        <i class="fas fa-football-ball accueil_logo"></i>
                        <p class="logo_text">Sport</p>
                    </a>
                </div>
                <div class="column">
                    <a class="balise_button">
                        <i class="fas fa-tools accueil_logo"></i>
                        <p class="logo_text">Technique</p>
                    </a>
                </div>
                <div class="column">
                    <a class="balise_button">
                        <i class="fas fa-share-alt-square accueil_logo"></i>
                        <p class="logo_text">Culturel</p>
                    </a>
                </div>
                <div class="column">
                    <a class="balise_button">
                        <i class="fas fa-dna accueil_logo"></i>
                        <p class="logo_text">Caritatif</p>
                    </a>
                </div>
                <div class="column">
                    <a class="balise_button">
                        <i class="fas fa-globe-europe accueil_logo"></i>
                        <p class="logo_text">Developpement Durable</p>
                    </a>
                </div>
            </div>


        </div>
    </div>



</body>







