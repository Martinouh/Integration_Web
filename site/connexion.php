<?php
session_start();
include './php/Fonctions.php';
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
                                    <?php echo genereMenu('connexion')?>
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
            <a href="index.php">Home</a> &nbsp;/&nbsp; <span>Connexion</span>
        </div>
        <div id="content">
            <form id="formLogin" method="post" action="./php/traiteForm.php">
                <h1>Connexion</h1>
                <input id="email" type="email" name="email"  placeholder="Votre adresse mail"><br>
                <input id="mdp" type="password" name="mdp"  placeholder="Votre mot de passe"><br>
                <input id="connect" name="login_submit" type="submit" value="Connexion">
                <p id="mdpLost">
                    <a href="http://localhost/projet_int/HTML/form_mdp_perdu.html" id="mdpLostxt"> J'ai oublié mon mot de passe </a>
                </p>
                <p id="new">
                    Nouveau sur EasyWaitingRoom ? <a href="formRegister.php" id="subscribe">S'inscrire</a>
                </p>
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
</div>

                <div id="footerOuterSeparator"></div>
                <div id="divFooter" class="footerArea">
                    <div class="container">
                        <div class="divPanel">
                            <div class="row-fluid">
                                <div class="span3" id="footerArea1">
                                    <h3>About EWR </h3>
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
                                </div>
                                <div class="span3" id="footerArea4">
                                    <h3>Get in Touch</h3>
                                    <ul id="contact-info">
                                        <li>
                                            <i class="general foundicon-phone icon"></i>
                                            <span class="field">Phone:</span>
                                            <br />(+32) 479798123
                                        </li>
                                        <li>
                                            <i class="general foundicon-mail icon"></i>
                                            <span class="field">Email:</span><br />
                                            <a href="mailto:martinouh@easywaitingroom.be" title="Email">martinouh@easywaitingroom.be</a>
                                        </li>
                                        <li>
                                            <i class="general foundicon-home icon" style="margin-bottom:50px"></i>
                                            <span class="field">Adresse:</span><br />
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


                <script src="scripts/carousel/jquery.carouFredSel-6.2.0-packed.js" type="text/javascript"></script><script type="text/javascript">$('#list_photos').carouFredSel({ responsive: true, width: '100%', scroll: 2, items: {width: 320,visible: {min: 2, max: 6}} });</script>

</body>

</html>
