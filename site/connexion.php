<?php
/**
 * Created by PhpStorm.
 * User: Rom
 * Date: 12/11/2016
 * Time: 18:55
 */
session_start();
include '../php/Fonctions.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>

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
                                    <?php echo genereMenu('connexion')?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="breadcrumbs">
                    <a href="index.html">Home</a> &nbsp;/&nbsp; <span>Connexion</span>
                </div>
                <div id="content">
                    <form id="formLogin" method="post" action="../php/traiteForm.php">
                        <h1>Connexion</h1>
                        <input id="email" type="email" name="email"  placeholder="Votre adresse mail"><br>
                        <input id="mdp" type="password" name="mdp"  placeholder="Votre mot de passe"><br>
                        <input id="connect" name="login_submit" type="submit" value="Connexion">
                        <p id="mdpLost">
                            <a href="http://localhost/projet_int/HTML/form_mdp_perdu.html" id="mdpLostxt"> J'ai oublié mon mot de passe </a>
                        </p>
                        <p id="new">
                            Nouveau sur Groupe7? <a href="formRegister.php" id="subscribe">S'inscrire</a>
                        </p>
                    </form>
                </div>


                <script src="scripts/jquery.min.js" type="text/javascript"></script>
                <script src="scripts/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
                <script src="scripts/default.js" type="text/javascript"></script>


                <script src="scripts/carousel/jquery.carouFredSel-6.2.0-packed.js" type="text/javascript"></script><script type="text/javascript">$('#list_photos').carouFredSel({ responsive: true, width: '100%', scroll: 2, items: {width: 320,visible: {min: 2, max: 6}} });</script>

</body>

</html>

