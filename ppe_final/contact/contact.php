<?php

session_start();

$pdo = new PDO('mysql:host=localhost;dbname=PPE', 'root', 'root');


if (isset($_POST['valider_president']))
{
    if (isset($_POST['nom_president'], $_POST['mail_president'], $_POST['num_president']))
    {
        if (!empty($_POST['nom_president']) AND !empty($_POST['mail_president']) AND !empty($_POST['num_president']))
        {
            $nom_president = htmlspecialchars($_POST['nom_president']);
            $mail_president = htmlspecialchars($_POST['mail_president']);
            $num_president = htmlspecialchars($_POST['num_president']);

            $insert_president = $pdo->prepare("INSERT INTO membres_association(nom_president, mail_president, num_president) VALUES (?, ?, ?)");
            $insert_president->execute(array($nom_president, $mail_president, $num_president));

        }
    }
}

if (isset($_POST['valider_secretaire_general']))
{
    if (isset($_POST['nom_secretaire_general'], $_POST['mail_secretaire_general'], $_POST['num_secretaire_general']))
    {
        if (!empty($_POST['nom_secretaire_general']) AND !empty($_POST['mail_secretaire_general']) AND !empty($_POST['num_secretaire_general']))
        {
            $nom_secretaire_general = htmlspecialchars($_POST['nom_secretaire_general']);
            $mail_secretaire_general = htmlspecialchars($_POST['mail_secretaire_general']);
            $num_secretaire_general = htmlspecialchars($_POST['num_secretaire_general']);

            $insert_secretaire_general = $pdo->prepare("INSERT INTO membres_association(nom_secretaire_general, mail_secretaire_general, num_secretaire_general) VALUES (?, ?, ?)");
            $insert_secretaire_general->execute(array($nom_secretaire_general, $mail_secretaire_general, $num_secretaire_general));

        }
    }
}

if (isset($_POST['valider_tresorier']))
{
    if (isset($_POST['nom_tresorier'], $_POST['mail_tresorier'], $_POST['num_tresorier']))
    {
        if (!empty($_POST['nom_tresorier']) AND !empty($_POST['mail_tresorier']) AND !empty($_POST['num_tresorier']))
        {
            $nom_tresorier = htmlspecialchars($_POST['nom_tresorier']);
            $mail_tresorier = htmlspecialchars($_POST['mail_tresorier']);
            $num_tresorier = htmlspecialchars($_POST['num_tresorier']);

            $insert_tresorier = $pdo->prepare("INSERT INTO membres_association(nom_tresorier, mail_tresorier, num_tresorier) VALUES (?, ?, ?)");
            $insert_tresorier->execute(array($nom_tresorier, $mail_tresorier, $num_tresorier));

        }
    }
}
?>


<html>

<head>
    <meta charset="UTF-8">
    <title>Contacts</title>

    <!-- Feuilles de style  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">



    <!-- Bibliothèques JQuery  -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

    <!-- Titre  -->


    <meta name="viewport" content="width = device-width, initial-scale = 1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <link rel="stylesheet" href="../description/description.css">
    <link rel="stylesheet" href="../contact/contact.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body>

<header>
    <?php include "../entete/entete.php"; ?>
</header>


<div class="row descente">
    <div class="col s3">
        <a href="Description.html" class="waves-effect waves-light btn taille">Description</a>
        <a href="Evenement.html" class="waves-effect waves-light btn">Evénements</a>
        <a href="Prestation.html" class="waves-effect waves-light btn">Ce que l'on propose</a>
        <a href="Partenaire.html" class="waves-effect waves-light btn">Partenaires</a>
        <a href="Contact.html" class="waves-effect waves-light btn">Messagerie</a>
        <a href="Contact.html" class="waves-effect waves-light btn">Demande de devis</a>
        <a href="Contact.html" class="waves-effect waves-light btn">Reseaux</a>
        <a href="../parametres/parametres.php" class="waves-effect waves-light btn">Paramètre</a>
    </div>


    <div class="col s9">


        <div class="president col s4">

            <div class="titre">
                <p>Président</p>
            </div>

            <div class="informations">
                <p><i class="tiny material-icons">person</i><?php echo $nom_president ?></p>
                <p><i class="tiny material-icons">contact_mail</i><?php echo $mail_president ?></p>
                <p><i class="tiny material-icons">contact_phone</i><?php echo $num_president ?></p>

                <a class="btn-floating btn-small modal-trigger darken-2 hoverable modifier" href="#modal1"><i
                        class="tiny material-icons statut" style="font-size: 13px;">edit
                    </i></a>

            </div>



            <div id="modal1" class="modal">
                <form method="POST" action="">
                    <div class="modal-content">
                        <h4>Modifier le nom du président</h4>
                        <br>
                        <div class="input-field">
                            <i class="material-icons prefix">mode_edit</i>
                            <textarea id="icon_prefix2" class="materialize-textarea"
                                      name="nom_president"></textarea><br></br>
                            <label for="icon_prefix2"></label>
                        </div>

                        <h4>Modifier l'adresse mail du président</h4>
                        <br>
                        <div class="input-field">
                            <i class="material-icons prefix">mode_edit</i>
                            <textarea id="icon_prefix2" class="materialize-textarea"
                                      name="mail_president"></textarea><br></br>
                            <label for="icon_prefix2"></label>
                        </div>

                        <h4>Modifier le numéro du président</h4>
                        <br>
                        <div class="input-field">
                            <i class="material-icons prefix">mode_edit</i>
                            <textarea id="icon_prefix2" class="materialize-textarea"
                                      name="num_president"></textarea><br></br>
                            <label for="icon_prefix2"></label>
                        </div>

                        <div class="modal-footer">
                            <input type="submit" name="valider_president" value="Valider" class="btn"/>
                        </div>


                    </div>
                </form>
            </div>
        </div>


        <div class="secretaire_general col s4">

            <div class="titre">
                <p>Secrétaire Général</p>
            </div>

            <div class="informations">
                <p><i class="tiny material-icons">person</i><?php echo $nom_secretaire_general ?></p>
                <p><i class="tiny material-icons">contact_mail</i><?php echo $mail_secretaire_general ?></p>
                <p><i class="tiny material-icons">contact_phone</i><?php echo $num_secretaire_general ?></p>

                <a class="btn-floating btn-small modal-trigger darken-2 hoverable modifier" href="#modal1"><i
                        class="tiny material-icons statut" style="font-size: 13px;">edit
                    </i></a>

            </div>



            <div id="modal1" class="modal">
                <form method="POST" action="">
                    <div class="modal-content">
                        <h4>Modifier le nom du Secrétaire Général</h4>
                        <br>
                        <div class="input-field">
                            <i class="material-icons prefix">mode_edit</i>
                            <textarea id="icon_prefix2" class="materialize-textarea"
                                      name="nom_secretaire_general"></textarea><br></br>
                            <label for="icon_prefix2"></label>
                        </div>

                        <h4>Modifier l'adresse mail du Secrétaire Général</h4>
                        <br>
                        <div class="input-field">
                            <i class="material-icons prefix">mode_edit</i>
                            <textarea id="icon_prefix2" class="materialize-textarea"
                                      name="mail_secretaire_general"></textarea><br></br>
                            <label for="icon_prefix2"></label>
                        </div>

                        <h4>Modifier le numéro du Secrétaire Général</h4>
                        <br>
                        <div class="input-field">
                            <i class="material-icons prefix">mode_edit</i>
                            <textarea id="icon_prefix2" class="materialize-textarea"
                                      name="num_secretaire_general"></textarea><br></br>
                            <label for="icon_prefix2"></label>
                        </div>

                        <div class="modal-footer">
                            <input type="submit" name="valider_secretaire_general" value="Valider" class="btn"/>
                        </div>


                    </div>
                </form>
            </div>
        </div>


        <div class="tresorier col s4">

            <div class="titre">
                <p>Trésorier</p>
            </div>

            <div class="informations">
                <p><i class="tiny material-icons">person</i><?php echo $nom_tresorier ?></p>
                <p><i class="tiny material-icons">contact_mail</i><?php echo $mail_tresorier ?></p>
                <p><i class="tiny material-icons">contact_phone</i><?php echo $num_tresorier ?></p>

                <a class="btn-floating btn-small modal-trigger darken-2 hoverable modifier" href="#modal1"><i
                        class="tiny material-icons statut" style="font-size: 13px;">edit
                    </i></a>

            </div>



            <div id="modal1" class="modal">
                <form method="POST" action="">
                    <div class="modal-content">
                        <h4>Modifier le nom du Trésorier</h4>
                        <br>
                        <div class="input-field">
                            <i class="material-icons prefix">mode_edit</i>
                            <textarea id="icon_prefix2" class="materialize-textarea"
                                      name="nom_tresorier"></textarea><br></br>
                            <label for="icon_prefix2"></label>
                        </div>

                        <h4>Modifier l'adresse mail du Trésorier</h4>
                        <br>
                        <div class="input-field">
                            <i class="material-icons prefix">mode_edit</i>
                            <textarea id="icon_prefix2" class="materialize-textarea"
                                      name="mail_tresorier"></textarea><br></br>
                            <label for="icon_prefix2"></label>
                        </div>

                        <h4>Modifier le numéro du Trésorier</h4>
                        <br>
                        <div class="input-field">
                            <i class="material-icons prefix">mode_edit</i>
                            <textarea id="icon_prefix2" class="materialize-textarea"
                                      name="num_tresorier"></textarea><br></br>
                            <label for="icon_prefix2"></label>
                        </div>

                        <div class="modal-footer">
                            <input type="submit" name="valider_tresorier" value="Valider" class="btn"/>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>


<!-- Dossier Javascript -->
<script type="text/javascript">


    $(document).ready(function () {
        $('.modal').modal();
    });

</script>