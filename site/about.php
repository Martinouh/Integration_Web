<?php
/**
 * Created by PhpStorm.
 * User: Rom
 * Date: 12/11/2016
 * Time: 18:52
 */
session_start();
include '../php/Fonctions.php';
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>About</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="scripts/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="scripts/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
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



    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Palatino+Linotype" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

    <link href="styles/custom.css" rel="stylesheet" type="text/css" />
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
                                    <?php echo genereMenu('about')?>
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
            <a href="index.php">Home</a> &nbsp;/&nbsp; <span>A propos</span>
        </div>

        <div class="row-fluid">
            <!--Edit Main Content Area here-->
            <div class="span8" id="divMain">

                <h1>About Us</h1>
                <hr>
                <p>
                    Nous sommes un groupe de six étudiants de <a target="_blank" href="http://www.ephec.be/cours-du-jours/nos-formations/informatique-3">l'EPHEC</a> en technologie de l'informatique.<br>
                    Dans le cadre de nos études, il nous a été demandé de réaliser un projet reprenant diverses technologies vue lors de notre formation.<br>
                    Nous nous étions fixé comme objectif de réaliser un site qui permettrai aux gens de gagner du temps en sachant consulter le nombre de personnes dans une salle d'attente.<br>
                    D'où <strong><a href="#">EasyWaitingRoom</a></strong>
                </p>
                <hr>
                <h3>L'Equipe</h3>

                <div class="row-fluid">
                    <div class="span2">
                        <img src="images/matthieu.jpg" class="img-polaroid" style="margin:5px 0px 15px;" alt="Matthieu">   </div>
                    <div class="span10">
                        <p><b>Matthieu Clerbois</b><br> Product Owner</p>
                    </div>
                </div>
                <hr>

                <div class="row-fluid">
                    <div class="span2">
                        <img src="images/martin.jpg" class="img-polaroid" style="margin:5px 0px 15px;" alt="Martin">   </div>
                    <div class="span10">
                        <p><b>Martin Gorlier</b><br>S'occupe du Réseau</p>
                    </div>
                </div>
                <hr>

                <div class="row-fluid">
                    <div class="span2">
                        <img src="images/romain.jpg" class="img-polaroid" style="margin:5px 0px 15px;" alt="Romain">   </div>
                    <div class="span10">
                        <p><b>Romain Charlier</b><br>S'occupe du backend</p>
                    </div>
                </div>
                <hr>

                <div class="row-fluid">
                    <div class="span2">
                        <img src="images/maximilien.jpg" class="img-polaroid" style="margin:5px 0px 15px;" alt="Maximilien">   </div>
                    <div class="span10">
                        <p><b>Maximilien Van Roey</b><br>S'occupe du frontend</p>
                    </div>
                </div>
                <hr>

                <div class="row-fluid">
                    <div class="span2">
                        <img src="images/victorien.jpg" class="img-polaroid" style="margin:5px 0px 15px;" alt="Victorien">   </div>
                    <div class="span10">
                        <p><b>Victorien Derasse</b><br>S'occupe du système raspberry</p>
                    </div>
                </div>
                <hr>

                <div class="row-fluid">
                    <div class="span2">
                        <img src="images/francois.jpg" class="img-polaroid" style="margin:5px 0px 15px;" alt="Francois">   </div>
                    <div class="span10">
                        <p><b>François Scholsen</b><br>S'occupe du système raspberry</p>
                    </div>
                </div>
                <hr>
            </div>
            <!-- End Main Content Area here -->

            <!-- Edit Sidebar Content here -->
            <div class="span4 sidebar">

                <!-- <div class="sidebox">
                    <h3 class="sidebox-title">Sample Sidebar Content</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and <a href="#">typesetting industry</a>.</p>
                    <p> Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s.</p>

                    <h4 class="sidebox-title">Sidebar Categories</h4>
                    <ul>
                        <li><a href="#">Quisque diam lorem sectetuer adipiscing</a></li>
                        <li><a href="#">Interdum vitae, adipiscing dapibus ac</a></li>
                        <li><a href="#">Scelerisque ipsum auctor vitae, pede</a></li>
                        <li><a href="#">Donec eget iaculis lacinia non erat</a></li>
                        <li><a href="#">Lacinia dictum elementum velit fermentum</a></li>
                        <li><a href="#">Donec in velit vel ipsum auctor pulvinar</a></li>
                    </ul>


                    <h4 class="sidebox-title">Our Skills</h4>

                    <h5>Web Design ( 40% )</h5>
                    <div class="progress progress-info">
                        <div class="bar" style="width: 20%"></div>
                    </div>

                    <h5>Wordpress ( 80% )</h5>
                    <div class="progress progress-success">
                        <div class="bar" style="width: 40%"></div>
                    </div>

                    <h5>Branding ( 100% )</h5>
                    <div class="progress progress-warning">
                        <div class="bar" style="width: 60%"></div>
                    </div>

                    <h5>SEO Optmization ( 60% )</h5>
                    <div class="progress progress-danger">
                        <div class="bar" style="width: 80%"></div>
                    </div>


                </div> -->

            </div>
            <!--End Sidebar Content here-->
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

                    <h3>About EWR </h3>

                    <!-- <p>

                    </p> -->

                    <p>
                        <a href="#" title="Terms of Use">Termes et Conditions d'utilisation</a><br />
                        <a href="#" title="Privacy Policy">Vie privée</a><br />
                        <a href="#" title="FAQ">FAQ</a><br />
                        <a href="#" title="Sitemap">Sitemap</a>
                    </p>

                </div>
                <div class="span3" id="footerArea2">

                    <a href="recherche.php"><h3>Recherche</h3></a>
                    <!-- <p>
                        <a href="#" title="">Lorem Ipsum is simply dummy text</a><br />
                        <span style="text-transform:none;">2 hours ago</span>
                    </p>
                    <p>
                        <a href="#" title="">Duis mollis, est non commodo luctus</a><br />
                        <span style="text-transform:none;">5 hours ago</span>
                    </p>
                    <p>
                        <a href="#" title="">Maecenas sed diam eget risus varius</a><br />
                        <span style="text-transform:none;">19 hours ago</span>
                    </p>
                    <p>
                        <a href="#" title="">VIEW ALL POSTS</a>
                    </p> -->

                </div>
                <div class="span3" id="footerArea3">

                    <a href="about.php"><h3>Meet the Team</h3></a>
                    <!-- <p>
                    </p> -->
                </div>
                <div class="span3" id="footerArea4">

                    <h3>Get in Touch</h3>

                    <ul id="contact-info">
                        <li>
                            <i class="general foundicon-phone icon"></i>
                            <span class="field">Phone:</span>
                            <br />
                            (+32) 479798123
                        </li>
                        <li>
                            <i class="general foundicon-mail icon"></i>
                            <span class="field">Email:</span>
                            <br />
                            <a href="mailto:martinouh@easywaitingroom.be" title="Email">martinouh@easywaitingroom.be</a>
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
                        Copyright © 2016 EasyWaitingRoom. All Rights Reserved.
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
