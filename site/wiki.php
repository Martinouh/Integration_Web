<?php
session_start();
include 'php/Fonctions.php';
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>EWR - Wiki</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

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
    <link href="scripts/icons/general/stylesheets/general_foundicons_ie7.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="scripts/icons/social/stylesheets/social_foundicons_ie7.css" media="screen" rel="stylesheet" type="text/css" />
    <![endif]-->
    <link rel="stylesheet" href="scripts/fontawesome/css/font-awesome.min.css">
    <!--[if IE 7]>
    <link rel="stylesheet" href="scripts/fontawesome/css/font-awesome-ie7.min.css">
    <![endif]-->



    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Palatino+Linotype" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css">
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
                                    <?php echo genereMenu('inscription')?>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<div id="contentOuterSeparator"></div>

<div class="container">

    <div class="divPanel page-content">

        <div class="breadcrumbs">
            <a href="index.php">Home</a> &nbsp;/&nbsp; <span>Wiki</span>
        </div>

        <div class="row-fluid">
            <!--Edit Main Content Area here-->
            <div class="span8" id="divMain">

                <h1>Bienvenue sur notre Wiki</h1>
                <hr>
                <p>
                    Ce wiki a pour but d'aider toute personne voulant comprendre comment fonctionne notre capteur ou éprouvant des difficultés avec certaines fonctionnalités de notre site. <br>Si toutefois, vous ne trouveriez pas d'informations sur quelque chose. <br>
                    Nous vous invitons à nous contacter via la page <strong><a href="contact.php">contact</a></strong> et nous nous ferons un plaisir d'ajouter ces informations dans notre wiki.
                </p>
                <hr>
                <h3><a href="#capteur">Notre Capteur</a></h3>
                <h3><a href="#fonctionnement">Fonctionnement du capteur</a></h3>
                <h3><a href="#effectuer_recherche">Comment effectuer une recherche</a></h3>
                <hr>
                <h3 id="capteur">Notre Capteur</h3>
                <br>
                <img src="images/rpi.jpg" width="auto" height="auto" alt="image_capteur">
                <p>
                    Notre capteur, est conçu autour du raspberry pi 2. Il est muni d'une clé wifi afin de se connecter au réseau et d'une caméra pour détecter les entrées et sorties.<br>
                    Celui-ci fonctionne sur secteur, mais présente un grand avantage, effectivement sa consommation annuelle ne s'élève qu'à 4-5€.<br>
                    Nous aimerons dans un futur proche, proposer comme amélioration, une boite en bois avec un design sobre, fabriquée par un menuisier local.
                </p>
                <br>
                <img src="images/rpi_porte.jpg" width="auto" height="auto" alt="image_capteur_porte">
                <p>
                    Le capteur se positionne au-dessus de la porte d'entrée, de manière à ce qu'il puisse avoir une vue aérienne sur les personnes entrantes et sortantes.
                </p>
                <hr>
                <h3 id="fonctionnement">Fonctionnement du capteur</h3>

                <br>
                <iframe src="https://player.vimeo.com/video/195118738" style="margin:5px 0px 15px;" width="auto" height="auto" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                <p>
                    Dans cette vidéo, vous pouvez voir une personne rentrer par la porte. Dès lors, notre capteur la détecte et passe le compteur à 1 (counter: 1). <br>
                    Cette personne va ensuite sortir, notre capteur retire une personne au compteur (counter: 0).
                </p>

                <hr>
                <h3 id="effectuer_recherche">Comment effectuer une recherche</h3>
                <br>
                <p>
                    Pour effectuer une recherche, il vous suffit de vous rendre dans l'onglet "recherche".<br>
                    Une fois cliqué dessus, vous devriez arriver sur une page ressemblant à celle-ci.
                </p>
                <img src="images/page_recherche.png" width="auto" height="auto" alt="page_recherche">
                <br>
                <p>
                    Ensuite, vous avez la possibilité de rechercher par "types de salles d'attente" que souhaitez à l'aide du menu déroulant.
                </p>
                <img src="images/select_recherche.png" width="auto" height="auto" alt="select_recherche">
                <br>
                <p>
                    Admettons que vous recherchiez un médecin, pour ce faire vous devez sélectionner médecin et ensuite dans le champ à droite entrer son nom de famille.<br>
                    Par exemple, nous recherchons le médecin "Van Roey", il suffit d'écrire "va.." <br>
                    et ensuite un champ de suggestions apparait avec tout le nom des médecins présents dans notre base de données commençant pas ce que vous avez écrit.
                </p>
                <br>
                <img src="images/suggestion_recherche.png" width="auto" height="auto" alt="suggestion_recherche">
                <p>
                    Il vous est possible de cliquer sur l'un des noms qui apparait dans les suggestions pour arriver directement sur la page du professionnel.<br>
                    Dans ce cas-ci, cliquer sur "Van Roey" nous amène directement sur la page du "Dr Maximilien Van Roey".
                </p>
                <hr>


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

</body>
</html>
