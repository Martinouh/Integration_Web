<?php
session_start();
include './php/Fonctions.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Rechercher un professionnel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
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
        #searchIcon{
            width:3%;
            margin-bottom: .8%;
        }
        #searchIcon:focus{
            outline: none;
        }
        #suggestions{
            margin-top: 5%;
            display: none;
        }
    </style>
    <script>
        function showHint(hint){
            $.get("./php/getHint.php?q=" + hint, function (data) {
                if(data) {
                    $('#suggestions').remove();
                    $('#searchIcon').after('<div id="suggestions"></div>');
                    $('#suggestions').fadeIn().html('<h2>Suggestions:</h2></br>' + data);
                }else{
                    $('#suggestions').fadeOut();
                    $('#suggestions').remove();

                }
            });
        }
/*        function getResults(){
            event.preventDefault();
            $('#suggestions').remove();
            var requete = $('#searchBar').val();
            $.get("./php/traiteForm.php?rq=search&requete="+requete,function(data){
                $('#searchBarDiv').after('<div id="suggestions"></div>');
                $('#suggestions').fadeIn().html(data);
            });
        }/*
    </script>

</head>
<body id="pageBody">
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
                                    <?php echo genereMenu('recherche') ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="divPanel page-content">
        <div class="breadcrumbs">
            <a href="index.php">Home</a> &nbsp;/&nbsp; <span>Recherche</span>
        </div>
        <div id="textSearch">
            <p style ='text-align:center' ><h1 style ='text-align:center' >Recherche du professionel</h1></p>
        </div>
        <div id="searchBarDiv">
            <form action="resultatRecherche.php" method="get">
                <input type="text" name="barre" id="searchBar" placeholder="recherche..." onkeyup="showHint(this.value)"/><input type="image" id="searchIcon" src="images/iconLoupe.png" name="mon_image" onclick="getResults()"/>
            </form>
        </div>
    </div>
</div>

<!-- Fix footer ligne blanche bug -->
<div class="container">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>

<div id="footerOuterSeparator"></div>

<div id="divFooter" class="footerArea">

    <div class="container">

        <div class="divPanel">

            <div class="row-fluid">
                <div class="span3" id="footerArea1">

                    <h3>À Propos</h3>
                    <p>
                        <a href="#" title="Terms of Use">Termes et Conditions d'utilisation</a><br />
                        <a href="#" title="Privacy Policy">Vie privée</a><br />
                        <a href="#" title="Sitemap">plan d'accès</a>
                    </p>

                </div>
                <div class="span3" id="footerArea2">

                    <a href="recherche"><h3>Recherche</h3></a>
                </div>
                <div class="span3" id="footerArea4">

                    <h3>Nous contacter </h3>
                    <ul id="contact-info">
                        <li>
                            <i class="general foundicon-phone icon"></i>
                            <span class="field">Téléphone:</span>
                            <br >
                            (+32) 479798123
                        </li>
                        <li>
                            <i class="general foundicon-mail icon"></i>
                            <span class="field">Email:</span>
                            <br />
                            <a href="mailto:contact@easywaitingroom.be" title="Email">contact@easywaitingroom.be</a>
                        </li>
                        <li>
                            <i class="general foundicon-home icon" style="margin-bottom:50px"></i>
                            <span class="field">Adresse:</span>
                            <br />
                            Avenue du Ciseau, 15<br />
                            1348, Ottignies-Louvain-la-Neuve<br />
                            Belgique
                        </li>
                    </ul>

                </div>
            </div>

            <br /><br />
            <div class="row-fluid">
                <div class="span12">
                    <p class="copyright">
                        Copyright © 2016 EasyWaitingRoom. Tous droits réservés .
                    </p>

                    <p class="social_bookmarks">
                        <a href="#"><i class="social foundicon-facebook"></i> Facebook</a>
                        <a href=""><i class="social foundicon-twitter"></i> Twitter</a>
                        <a href="#"><i class="social foundicon-pinterest"></i> Pinterest</a>
                        <a href="#"><i class="social foundicon-rss"></i> Rss</a>
                    </p>
                </div>
            </div>
            <br />

        </div>

    </div>

</div>

<script src="scripts/jquery.min.js" type="text/javascript"></script>
<script src="scripts/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="scripts/default.js" type="text/javascript"></script>


<script src="scripts/carousel/jquery.carouFredSel-6.2.0-packed.js" type="text/javascript"></script><script type="text/javascript">$('#list_photos').carouFredSel({ responsive: true, width: '100%', scroll: 2, items: {width: 320,visible: {min: 2, max: 6}} });</script>


</body>
</html>
