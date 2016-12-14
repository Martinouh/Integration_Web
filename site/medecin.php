<?php
session_start();
include './php/Fonctions.php';
$dsn = 'mysql:dbname=db7;host=137.74.43.201';
$user = 'rcharlier';
$password = 'qe9hm2kx';
$html = array();
try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    printf('Erreur'. $e->getMessage());
}
$id = $_GET['id'];
$query = $db->query("SELECT * FROM professionnels WHERE id=$id");
$query2 = $db->query("SELECT * FROM adresse WHERE idPro=$id");
$medecin = $query->fetchAll(PDO::FETCH_ASSOC);
$adresse =  $query2->fetchAll(PDO::FETCH_ASSOC);
$medecin = $medecin[0];
$adresse = $adresse[0];
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

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Palatino+Linotype" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <link href="styles/custom.css" rel="stylesheet" type="text/css" />
    <script src="scripts/jquery.min.js"></script>
    <script src="scripts/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="scripts/default.js" type="text/javascript"></script>
    <script src="scripts/carousel/jquery.carouFredSel-6.2.0-packed.js" type="text/javascript"></script><script type="text/javascript">$('#list_photos').carouFredSel({ responsive: true, width: '100%', scroll: 2, items: {width: 320,visible: {min: 2, max: 6}} });</script>
    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script>

           $(function () {
               $("#tabs").tabs();
           });
           function favoris(){
               var idMedecin = <?php echo $_GET['id']?> ;
               $.post('php/traiteForm.php?rq=favoris&idMed='+idMedecin, function (data) {
                   if (data==0){
                       $('#favIcon').attr('src','images/favIcon5.png');
                   }
                   else{
                       $('#favIcon').attr('src','images/favIcon4.png');
                   }
               });
           }

    </script>
    <title>Ma recherche</title>
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
                                    <?php echo genereMenu('recherche') ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="breadcrumbs">
                    <a href="index.html">Home</a> &nbsp;/&nbsp; <span>Recherche</span>
                </div>

<div id="content">
    <div id="tabs">
        <ul>
            <li><a href="#tab-1">Informations générales</a></li>
            <li><a href="#tabs-2">Photos</a></li>
        </ul>
        <div id="tab-1">
                <div id="infoGenerales">
                    <?php if($medecin['avatar']){
                        echo '<img src="images/'.$medecin['avatar'].'" style="width:220px; height: 220px;"/>';

                    }else{
                        echo '<img src="images/avatar/unknownIcon.png" />';
                    }
                    if(isMembre() || isActiv() || isAdmin())
                        if(in_array($_GET['id'],$_SESSION['user']['favoris'])){
                            echo '<input type="image" id="favIcon"  src="images/favIcon5.png" onclick="favoris()"/>';
                        }else{
                            echo '<input type="image" id="favIcon"  src="images/favIcon4.png" onclick="favoris()"/>';
                        }
                    ?>
                    <p id="nomMedecin"><img src="images/peopleIcon.jpg"/><?php echo $medecin['prenom'].' '.$medecin['nom']?></p>
                    <p id="telMedecin"><img src="images/telIcon.png"/><?php echo $medecin['telephone']?></p>
                    <p id="mailMedecin"><img src="images/mailIcon_00000.jpg"/><?php echo $medecin['mail']?></p>
                    <p id="adresseMedecin"><img src="images/mapIcon4.png"/><?php echo $adresse['num'].','.$adresse['rue'].','.$adresse['cp'].' '.$adresse['ville']?></p>
                    <p id="siteMedecin"><img src="images/webIcon2.png"/><a href=http://www.<?php echo $medecin['site']?>><?php echo $medecin['site']?></p>
                    <div id="map" style="border-left:solid 1px;border-right:solid 1px;width:50%;height:300px; position: absolute;top: 100px; left:500px "></div>
                </div>

        </div>
    </div>
</div>
                <script>
                    function myMap() {
                        var mapCanvas = document.getElementById("map");
                        var mapOptions = {
                            center: new google.maps.LatLng(50.4669, 4.86746),
                            zoom: 8
                        };
                        var lat = <?php echo $_GET['lat'];?>;
                        var long = <?php echo $_GET['long'];?>;
                        var map = new google.maps.Map(mapCanvas, mapOptions);
                         marker = new google.maps.Marker(
                         {
                         map: map,
                         position: new google.maps.LatLng(lat, long),
                         });
                         google.maps.event.addListener(marker, 'click', (function (marker, i) {
                         return function () {
                         infoWindow.setContent(myArray[i]);
                         infoWindow.open(map, marker);
                         }
                         })(marker, i));
                         var infoWindow = new google.maps.InfoWindow(), marker, i;
                    }

                </script>
                <script src="https://maps.googleapis.com/maps/api/js?callback=myMap&key=AIzaSyCA_hrOWnYWoP_MO8-8y_35Gy1gIGtBF7I"></script>

</body>
