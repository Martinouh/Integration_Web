<?php
session_start();
include './php/Fonctions.php';
if(!isset($_SESSION['is'])) {
    anonyme();
}
//session_destroy();
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>EWR - Accueil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW"> <!-- Remove this Robots Meta Tag, to allow indexing of site -->

    <link href="scripts/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="scripts/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Icons -->
    <link href="scripts/icons/general/stylesheets/general_foundicons.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="scripts/icons/social/stylesheets/social_foundicons.css" media="screen" rel="stylesheet" type="text/css" />
    <!--[if lt IE 8]>
    <link href="scripts/icons/general/stylesheets/general_foundicons_ie7.css" media="screen" rel="stylesheet"
          type="text/css"/>
    <link href="scripts/icons/social/stylesheets/social_foundicons_ie7.css" media="screen" rel="stylesheet"
          type="text/css"/>
    <![endif]-->
    <link rel="stylesheet" href="scripts/fontawesome/css/font-awesome.min.css">
    <!--[if IE 7]>
    <link rel="stylesheet" href="scripts/fontawesome/css/font-awesome-ie7.min.css">
    <![endif]-->

    <link href="scripts/carousel/style.css" rel="stylesheet" type="text/css" />

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Palatino+Linotype" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

    <link href="styles/custom.css" rel="stylesheet" type="text/css" />
</head>
<body id="pageBody">

<div id="decorative2">
    <div class="container">

        <div class="divPanel topArea notop nobottom">
            <div class="row-fluid">
                <div class="span12">

                    <div id="divLogo" class="pull-left">
                        <a href="index" id="divSiteTitle">E.W.R</a><br />
                        <a href="index" id="divTagLine">Easy Waiting Room</a>
                    </div>

                    <div id="divMenuRight" class="pull-right">
                        <div class="navbar">
                            <button type="button" class="btn btn-navbar-highlight btn-large btn-primary" data-toggle="collapse" data-target=".nav-collapse">
                                NAVIGATION <span class="icon-chevron-down icon-white"></span>
                            </button>
                            <div class="nav-collapse collapse">
                                <ul class="nav nav-pills ddmenu">
                                    <?php echo genereMenu('accueil');?>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<div id="decorative1" style="position:relative">
    <div class="container">

        <div class="divPanel headerArea">
            <div class="row-fluid">
                <div class="span12">

                    <div id="headerSeparator"></div>

                    <div id="divHeaderText" class="page-content">
                        <div id="divHeaderLine1">Easy Waiting Room</div><br />
                        <div id="divHeaderLine2">Diminuer les files, augmenter la productivité</div><br />
                        <div id="divHeaderLine3"><a class="btn btn-large btn-primary" href="recherche">Faire ma recherche</a></div>
                    </div>

                    <div id="headerSeparator2"></div>

                </div>
            </div>

        </div>

    </div>
</div>

<div id="contentOuterSeparator"></div>

<div class="container">

    <div class="divPanel page-content">

        <div class="row-fluid">

            <div class="span12" id="divMain">

                <h1>Bienvenue sur EasyWaitingRoom</h1>

                <p>E.W.R. est une solution pratique pour éviter les files d'attente interminables et attirer les clients lors des baisses de fréquentations.<br>
                    N'importe quel client saura, en temps réel, l'affluence de votre établissement grâce à notre site internet facile d'accès et simple d'utilisation.<br>
                    Un système de favori indiquera également les commerces les plus fréquentés possédant le plus petit temps d'attente.<br>
                    L'objectif d'EasyWaitingRoom est de permettre aux personnes désireuses de se rendre chez un professionnel disposant d'une salle d'attente (médecin, coiffeur, dentiste,...), de pouvoir consulter le nombre de personnes dans celle-ci afin de ne pas perdre de temps.<br>
                </p>

                <hr style="margin:45px 0 35px" />

                <div class="lead">
                    <h2>Salles d'attente partenaires</h2>
                    <h3>Bientôt la vôtre ?</h3>
                </div>
                <br />

                <div class="list_carousel responsive">
                    <ul id="list_photos">
                        <li><img src="images/carmel.jpg" class="img-polaroid">  </li>
                        <li><img src="images/rula-sibai-pink-flowers.jpg" class="img-polaroid">  </li>
                        <li><img src="images/girl-flowers.jpg" class="img-polaroid">  </li>
                        <li><img src="images/night-city.jpg" class="img-polaroid">  </li>
                        <li><img src="images/irish-hands.jpg" class="img-polaroid">  </li>
                        <li><img src="images/Top_view.jpg" class="img-polaroid">  </li>
                        <li><img src="images/vectorbeastcom-grass-sun.jpg" class="img-polaroid">  </li>
                        <li><img src="images/sunset-hair.jpg" class="img-polaroid">  </li>
                        <li><img src="images/stones-hi-res.jpg" class="img-polaroid">  </li>
                        <li><img src="images/salzburg-x.jpg" class="img-polaroid">  </li>
                    </ul>
                </div>
            </div>

        </div>

        <div id="footerInnerSeparator"></div>
    </div>

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
                <div class="span3" id="footerArea3">
                    <a href="wiki"><h3>Wiki</h3></a>
                    <p>
                        Si vous vous posez des questions, tel que ;<br>
                        <a href="wiki.php#capteur">"comment fonctionne ce capteur ?"</a><br>
                        <a href="wiki.php#fonctionnement">"comment puis-je rechercher une salle d'attente ?"</a><br>
                        <a href="wiki.php#effectuer_recherche">"comment ajouter une salle d'attente dans mes favoris ?"</a><br>
                        C'est par ici qu'il faut vous rendre !
                    </p>
                </div>
                <div class="span3" id="footerArea4">

                <a href="contact"><h3>Nous contacter </h3></a>
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
