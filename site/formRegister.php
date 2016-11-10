<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>S'inscrire</title>
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

<body>
  <div id="decorative2">
  <div class="container">

      <div class="divPanel topArea notop nobottom">
          <div class="row-fluid">
              <div class="span12">

                  <div id="divLogo" class="pull-left">
                      <a href="index.html" id="divSiteTitle">Groupe 7</a><br />
                      <a href="index.html" id="divTagLine">MED</a>
                  </div>

  <div id="divMenuRight" class="pull-right">
  <div class="navbar">
      <button type="button" class="btn btn-navbar-highlight btn-large btn-primary" data-toggle="collapse" data-target=".nav-collapse">
          NAVIGATION <span class="icon-chevron-down icon-white"></span>
      </button>
      <div class="nav-collapse collapse">
          <ul class="nav nav-pills ddmenu">
              <li class="dropdown active"><a href="index.html">Accueil</a></li>
              <li class="dropdown"><a href="recherche.html">Recherche</a></li>
              <li class="dropdown"><a href="about.html">A propos</a></li>
              <li class="dropdown"><a href="contact.php">Contact</a></li>
              <li class="dropdown"><a href="formLogIn.html">Connexion</a></li>
          </ul>
      </div>
  </div>
  </div>
  </div>
  <div class="breadcrumbs">
          <a href="index.html">Home</a> &nbsp;/&nbsp; <span>inscription</span>
      </div>
<div id="contentRegister">
    <form id="formRegister" method="post" action="../php/traiteForm.php">
        <h1 id="registerFormH1">Inscription</h1>
        <label for="nom">Nom :</label>
        <input id="nom" name="nom" required type="text" placeholder="Votre nom"><br>
        <label for="prenom">Prénom :</label>
        <input id="prenom" required name="prenom" type="text" placeholder="Votre prénom"><br>
        <label for="mail">Email :</label>
        <input id="mail" required type="email" name="mail" placeholder="Votre mail"><br>
        <label for="telephone">Tel :</label>
        <input id="telephone" type="tel" name="telephone" placeholder="Votre numéro de téléphone"><br>
          <label for="mdp2">Mot de passe :</label>
        <input id="mdp2" required type="password" name="mdp" placeholder="Votre mot de passe"><br>
        <br>
        <input  id="validation" name="insc_submit" type="submit" value="S'inscrire">
    </form>
</div>
<footer id="footer">

</footer>
</body>
</html>
