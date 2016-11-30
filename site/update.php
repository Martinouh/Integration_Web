<?php
session_start();
include '/php/Fonctions.php';
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Mettre mon profil à jour</title>

    <link href="scripts/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="scripts/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <!-- Icons -->
    <link href="scripts/icons/general/stylesheets/general_foundicons.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="scripts/icons/social/stylesheets/social_foundicons.css" media="screen" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="scripts/fontawesome/css/font-awesome.min.css">


    <link href="scripts/carousel/style.css" rel="stylesheet" type="text/css" />

    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Palatino+Linotype" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <link href="styles/custom.css" rel="stylesheet" type="text/css" />
    <script src="scripts/jquery.min.js"></script>
</head>
<body>
<div id="decorative2">
    <div class="container">

        <div class="divPanel topArea notop nobottom">
            <div class="row-fluid">
                <div class="span12">

                    <div id="divLogo" class="pull-left">
                        <a href="index.php" id="divSiteTitle">E.W.R</a><br />
                        <a href="index.php" id="divTagLine">Easy Waiting Room</a>
                    </div>

                    <div id="divMenuRight" class="pull-right">
                        <div class="navbar">
                            <button type="button" class="btn btn-navbar-highlight btn-large btn-primary" data-toggle="collapse" data-target=".nav-collapse">
                                NAVIGATION <span class="icon-chevron-down icon-white"></span>
                            </button>
                            <div class="nav-collapse collapse">
                                <ul class="nav nav-pills ddmenu">
                                    <?php echo genereMenu('profil') ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="breadcrumbs">
                    <a href="index.html">Home</a> &nbsp;/&nbsp; <span>Mise à jour du profil</span>
                </div>
                <h1>
                     Mettre mon profil à jour:
                </h1>
        <form action="php/traiteForm" method="post" id="formUpdate">
            <label for="nom">Nom </label>
            <input id="nom" name="nom" required type="text"value="<?php echo $_SESSION['user'][0]['nom']?>"><br>
            <label for="prenom">Prénom </label>
            <input id="prenom" required name="prenom" type="text" value="<?php echo $_SESSION['user'][0]['prenom']?>" ><br>
            <label for="mail">Email </label>
            <input id="mail" required type="email" name="mail" value="<?php echo $_SESSION['user'][0]['email']?>"><br>
            <label for="telephone">Numéro de téléphone</label>
            <input id="telephone" type="tel" name="telephone" value="<?php echo $_SESSION['user'][0]['telephone']?>"><br>
            <label for="mdp">Par mesure de sécurité, veuillez entrer votre mot de passe  </label>
            <input id="mdp2" required type="password" name="mdp" placeholder="Votre mot de passe"><br>
            <br>
            <input  id="updateButton" name="updateButton" type="submit" value="Mettre à jour mon profil">
        </form>

</body>
</html>
