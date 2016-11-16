<?php
/**
 * Created by PhpStorm.
 * User: Francois
 * Date: 15/11/2016
 * Time: 12:53
 * script sql
 * create table rdv (doctor_name VARCHAR(255),rdv_date DATETIME,email_client VARCHAR(20),objet VARCHAR(255),message VARCHAR(255));
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
        $( document ).ready( function() {
            $('#datetimepicker').datetimepicker();
        });
    </script>
    <!-- CDN for datetimepicker -->
    <link rel="stylesheet" type="text/css" href="../js/datetimepicker/jquery.datetimepicker.css"/ >
    <script src="../js/datetimepicker/jquery.js"></script>
    <script src="../js/datetimepicker/jquery.datetimepicker.full.min.js"></script>

</head>
<body>
    <div class="container">

        <div class="breadcrumbs">
            <a href="index.html">Home</a> &nbsp;/&nbsp; <span>Prendre rendez-vous</span>
        </div>
        <div id="content">
            <form id="formAppointment" method="post" action="../php/traiteForm.php">
                <h1>Prendre un rendez-vous</h1>
                <label for="doctor-name">Nom du Docteur : </label>
                <input id="doctor-name" type="text" name="doctor-name"  placeholder="Quel docteur souhaitez-vous rencontrer ?"><br>
                <label for="appointment-date">Date souhaitée : </label>
                <input id="datetimepicker" type="text" name="appointment-date"  placeholder="Date souhaitée pour le rendez-vous"><br>
                <label for="email-client">Votre adresse e-mail: </label>
                <input id="email-client" type="text" name="email-client"  placeholder="Pour vous contacter"><br>
                <label for="objet">Objet du rendez-vous : </label>
                <input id="objet" type="text" name="objet"  placeholder="Objet du rendez-vous"><br>
                <label for="message">Message : </label>
                <textarea id="message" name="message"  placeholder="Message, remarques, commentaires, ..." rows="4"></textarea><br>
                <input id="soumettre-rdv" name="soumettre-rdv" type="submit" value="Soumettre" class="btn btn-inverse" >
                <input type="reset" value="Annuler" class="btn btn-danger">
            </form>
        </div>

    </div>
</body>