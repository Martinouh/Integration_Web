<?php
/**
 * Created by PhpStorm.
 * User: Rom
 * Date: 12/11/2016
 * Time: 18:53
 */
session_start();
include '../php/Fonctions.php';
?>
<!DOCTYPE html>
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
    </style>
    <script>
    </script>

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
                                    <?php echo genereMenu('rendez-vous') ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="breadcrumbs">
                    <a href="index.html">Home</a> &nbsp;/&nbsp; <span>Recherche</span>
                </div>
                <div id="textSearch">
                    <p style ='text-align:center' ><h1 style ='text-align:center' >Recherche du professionel</h1></p>
                </div>
                <div id="searchBarDiv">
                    <input type="text" id="searchBar" placeholder="recherche..." onkeyup="showHint(this.value)"/><input type="image" id="searchIcon" src="images/iconLoupe.png" name="mon_image" onclick="getResults()"/>
                </div>

                <script src="scripts/jquery.min.js" type="text/javascript"></script>
                <script src="scripts/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
                <script src="scripts/default.js" type="text/javascript"></script>


                <script src="scripts/carousel/jquery.carouFredSel-6.2.0-packed.js" type="text/javascript"></script><script type="text/javascript">$('#list_photos').carouFredSel({ responsive: true, width: '100%', scroll: 2, items: {width: 320,visible: {min: 2, max: 6}} });</script>

</body>

</html>