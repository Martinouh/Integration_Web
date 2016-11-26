<?php
session_start();
include './php/Fonctions.php';
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Rechercher un professionnel</title>

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
    <style>
        table{
            width: 100%
        }
        tr{
            border-bottom: solid 1px #dddddd;

        }
        tr:nth-child(even) {
            background-color: #dddddd;
        }
        tr:nth-child(odd) {
            background-color: white;
        }
        td{
            padding: 1%;

        }
    </style>
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
                    <a href="index.html">Home</a> &nbsp;/&nbsp; <span>profil</span>
                </div>
                <h1>
                    Détails personnels:
                </h1>
                <a href="update.php"><img src="images/updateIcon.png" id="updateIcon"/></a><a href="deleteAccount.php"><img src="images/deleteIcon.png" id="deleteIcon"/></a>

                <table>
                    <tr>
                        <td>Informations</td>
                        <td><?php echo $_SESSION['user'][0]['prenom'].' '.$_SESSION['user'][0]['prenom'];?></td>
                    </tr>
                    <tr>
                        <td>Adresse mail</td>
                        <td><?php echo $_SESSION['user'][0]['email'] ?></td>
                    </tr>
                    <tr>
                        <td>Téléphone</td>
                        <td><?php echo $_SESSION['user'][0]['telephone'] ?></td>
                    </tr>
                    <tr>
                    </tr>
                </table>

                <h1>
                    Favoris:
                </h1>
                <table>
                    <tr>
                        <th>Nom du professionnel</th>
                    </tr>

                        <?php echo listeFavoris();?>
                </table>
</body>
</html>
