<?php
session_start();
include 'php/Fonctions.php';
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

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Palatino+Linotype" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <link href="styles/custom.css" rel="stylesheet" type="text/css" />
    <script src="scripts/jquery.min.js"></script>
    <style>

        #iw-container  .iw-title {
            font-family: 'Open Sans Condensed', sans-serif;
            font-size: 22px;
            font-weight: 400;
            padding: 10px;
            background-color: #48b5e9;
            color: white;
            margin: 1px;
            border-radius: 2px 2px 0 0; /* In accordance with the rounding of the default infowindow corners. */
            height: 50px;
        }

    </style>
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
            <a href="index.php">Home</a> &nbsp;/&nbsp; <span>Résultat de la recherche</span>
            <div id="map" style="width:100%;height:500px"></div>
        </div>
        <?php  search();?>
    </div>
    <script>


        function myMap() {
            var myArray = <?php echo $_POST['info'];?>;
            var myArray2 = <?php echo $_POST['coord'];?>;
            var mapCanvas = document.getElementById("map");
            var mapOptions = {
                center: new google.maps.LatLng(50.4669, 4.86746),
                zoom: 9
            };
            var map = new google.maps.Map(mapCanvas, mapOptions);
            for (i = 0; i < myArray.length; i++) {
                var myLatLng = {lat: myArray2[i], lng: myArray2[i + 1]};
                marker = new google.maps.Marker(
                    {
                        map: map,
                        position: new google.maps.LatLng(myArray2[i], myArray2[i+1]),
                    });
                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                    return function () {
                        infoWindow.setContent(myArray[i]);
                        infoWindow.open(map, marker);
                    }
                })(marker, i));
                var infoWindow = new google.maps.InfoWindow(), marker, i;
            }
        /*
                         google.maps.event.addListener(marker, 'click', function() {
                         map.setZoom(11);
                         map.setCenter(marker.getPosition());

                         });
                         google.maps.event.addListener(marker, 'mouseover', function() {
                         infowindow.open(map,marker);
                         });
                         google.maps.event.addListener(marker, 'mouseout', function() {
                         infowindow.close(map,marker);
                         });*/
            var marker = new google.maps.Marker(
                {
                    map: map,
                    animation: google.maps.Animation.BOUNCE
            });

            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    var infoWindow = new google.maps.InfoWindow(
                        {
                            content: '<div style="width:100%;min-height: 10px">Votre position.</div>'
                        });
                    marker.setPosition(pos);
                    map.setCenter(pos);
                    google.maps.event.addListener(marker, 'mouseover', function() {
                        infoWindow.open(map,marker);
                    });
                    google.maps.event.addListener(marker, 'mouseout', function() {
                        infoWindow.close(map,marker);
                    });

                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
        }


        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
        }



    </script>

    <script src="https://maps.googleapis.com/maps/api/js?callback=myMap&key=AIzaSyCA_hrOWnYWoP_MO8-8y_35Gy1gIGtBF7I"></script>

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
