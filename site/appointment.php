<?php
/**
 * Created by PhpStorm.
 * User: Francois
 * Date: 15/11/2016
 * Time: 12:53
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
            $.get("../php/getHint.php?q=" + hint, function (data) {
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
        function getResults(){
            event.preventDefault();
            $('#suggestions').remove();
            var requete = $('#searchBar').val();
            $.get("../php/traiteForm.php?rq=search&requete="+requete,function(data){
                $('#searchIcon').after('<div id="suggestions"></div>');
                $('#suggestions').fadeIn().html(data);
            });
        }
    </script>

</head>
<body>
    <div class="container">

    </div>
</body>