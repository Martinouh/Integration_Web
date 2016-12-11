
<?php
session_start();
include './php/Fonctions.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
    <script src="scripts/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="scripts/default.js" type="text/javascript"></script>
    <script src="scripts/carousel/jquery.carouFredSel-6.2.0-packed.js" type="text/javascript"></script><script type="text/javascript">$('#list_photos').carouFredSel({ responsive: true, width: '100%', scroll: 2, items: {width: 320,visible: {min: 2, max: 6}} });</script>
    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
        $(function () {
            $("#tabs").tabs();
        });
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
                                    <?php echo genereMenu('profil') ?>
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
        <div id="tabs">
            <ul>
                <li><a href="#tab-1">Informations générales</a></li>
                <li><a href="#tabs-2">Photos</a></li>
            </ul>
            <div id="tab-1">
                <div id="infoGenerales">
                    <?php if($_SESSION['user'][0]['avatar']){
                        echo '<img src="'.$_SESSION['user'][0]['avatar'].'"/>';
                    }else{
                        echo '<img src="images/avatar/unknownIcon.png"/>';
                    }

                    ?>
                    <form id="form" action="traiteForm.php" method="post">
                    <p id="nomMedecin"><img src="images/peopleIcon.jpg"/><input type="text" name="prenom" placeholder="Votre prénom" value="<?php echo $_SESSION['user'][0]['prenom']?>"/>&nbsp;&nbsp;
                        <input type="text" placeholder="Votre nom" name="nom" value="<?php echo $_SESSION['user'][0]['nom']?>"/></p>
                    <p id="telMedecin"><img src="images/telIcon.png"/><input type="text" placeholder="Votre numéro de téléphone" name="telephone" value="<?php echo $_SESSION['user'][0]['telephone']?>"/></p>
                        <p id="mailMedecin"><img src="images/mailIcon_00000.jpg"/><input type="email" placeholder="Votre adresse mail" name="mail" value="<?php echo $_SESSION['user'][0]['mail']?>"/></p>
                        <p id="adresseMedecin"><img src="images/mapIcon4.png"/><input type="text" placeholder="numéro" name="num" value="<?php echo $_SESSION['user']['adresse'][0]['num']?>"/>,<input placeholder="rue,exemple: rue de machin" type="text" name="rue" value="<?php echo $_SESSION['user']['adresse'][0]['rue']?>"/>,<input type="text" placeholder="code postal" name="cp" value="<?php echo $_SESSION['user']['adresse'][0]['cp']?>"/>&nbsp;&nbsp;<input type="text" placeholder="ville" name="ville" value="<?php echo $_SESSION['user']['adresse'][0]['ville']?>"/></p>
                    <p id="siteMedecin"><img src="images/webIcon2.png"/><input type="text" name="site" placeholder="Pas de protocoles,ex: google.be" value="<?php echo $_SESSION['user'][0]['site']?>"/></p>
                    <input class="connect" style="text-align: center" type="submit" name="update_profil_pro" value="Mettre à jour mon profil"/>
                    </form>
                    <iframe id='iframe2' src="cropbox.php" frameborder="0" style="overflow: hidden;right: 0;margin-top: 10%;border: solid grey 1px;height: 100%; width: 100%; position: absolute;"></iframe>
                </div>

            </div>
        </div>
    <div class="js"></div>
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
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
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
                <div class="span3" id="footerArea3">
                    <a href="#"><h3>Fonctionnement</h3></a>
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





</body>
</html>