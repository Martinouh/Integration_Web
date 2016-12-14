<?php
function isActiv(){
    return $_SESSION['is']['activ'];
}

function isAdmin(){
    return $_SESSION['is']['admin'];
}

function isAnonym(){
    return $_SESSION['is']['anonym'];
}

function isMembre(){
    return $_SESSION['is']['membre'];
}


function isPro(){
    return $_SESSION['is']['pro'];
}


function anonyme(){
    $_SESSION['is']['anonym']=1;
    $_SESSION['is']['activ']=false;
    $_SESSION['is']['membre']=false;
    $_SESSION['is']['pro']=false;
    $_SESSION['is']['admin']=false;
}


function genereStatuts(){
    $_SESSION['is']['anonym']=false;
    foreach($_SESSION['user'][0]['profilid'] as $key=>$value) {
        switch ($value){
            case'activation':        $_SESSION['is']['activ']=1;
                break;
            case 'membre':        $_SESSION['is']['membre']=1;$_SESSION['is']['authentified']=1;$_SESSION['is']['edit']=1;
                break;
            case'admin':        $_SESSION['is']['admin']=1;$_SESSION['is']['authentified']=1;$_SESSION['is']['edit']=1;
                break;
        }
    }
}

function enregistreMessage(){
    $dsn = 'mysql:dbname=db7;host=137.74.43.201';
    $user = 'rcharlier';
    $password = 'qe9hm2kx';
    $date = date('Y-m-d H:i:s');
    global $json;
    try {
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        printf('Erreur'. $e->getMessage());
    }
    $req1 = $db->prepare('INSERT INTO messages (sujet, corps, dateCreation, email) VALUES (:sujet, :corps, :dateCreation, :email)');
    if($req1->execute(array(
        'sujet' => $_POST['sujet'],
        'corps' => $_POST['message'],
        'dateCreation' => $date,
        'email' => $_POST['email']
    ))){
        $json['contact']='Merci pour votre message! Nous y répondrons dès que possible.';
    }else{
        $json['contact']='Erreur inconnue';
    }
    die(json_encode($json));

}

function favoris()
{
    $idMedecin = $_GET['idMed'];
    $dsn = 'mysql:dbname=db7;host=137.74.43.201';
    $user = 'rcharlier';
    $password = 'qe9hm2kx';
    $isFav=-1;
    try {
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        printf('Erreur' . $e->getMessage());
    }
    foreach ($_SESSION['user']['favoris'] as $key => $value) {
            if ($value == $idMedecin) {
                $isFav=1;
                unset($_SESSION['user']['favoris'][$key]);
            }
    }

    if($isFav==-1){
        $req2 = $db->prepare('INSERT INTO favoris (idUtilisateur, idPro) VALUES (:idUtilisateur, :idPro)');
        $req2->execute(array(
            'idUtilisateur' => $_SESSION['user'][0]['id'],
            'idPro' => $idMedecin
        ));
        array_push($_SESSION['user']['favoris'],$idMedecin);
        echo '0';
    }
    else{
        $db->query("DELETE FROM favoris WHERE idPro='$idMedecin'");
        echo '1';
    }
}
function genereMenu($page){
    $menuAnonyme=array('Accueil'=>'index.php','Recherche'=>'recherche.php','A propos de nous'=>'about.php','Nous contacter'=>'contact.php','Connexion'=>'connexion.php');
    $menuMembre=array('Accueil'=>'index.php','Recherche'=>'recherche.php','A propos de nous'=>'about.php','Nous contacter'=>'contact.php');
    $html = array();
    $compteur=0;
    if(isAnonym()){
        foreach($menuAnonyme as $key => $value){
            $html[]="<li class='dropdown #$compteur'><a href='$value'>$key</a></li>";
            $compteur++;

        }
    }
    if(isMembre() || isActiv()) {
        foreach ($menuMembre as $key => $value) {
            $html[] = "<li class='dropdown  #$compteur' ><a href='$value'>$key</a></li>";
            $compteur++;
        }
        $html[]="<div id='dash'><a href='profil.php' id='profil' #$compteur class='dash' style='border-right: solid 1px; color: white;  #$compteur'>".$_SESSION['user'][0]['prenom'].' '.$_SESSION['user'][0]['nom']."</a>";
        $html[]="<a href='deconnexion.php'><img src='./images/decoIcon.png' style='width: 2%'/></a></div>";

    }
    if(isPro()){
        foreach ($menuMembre as $key => $value) {
            $html[] = "<li class='dropdown  #$compteur' ><a href='$value'>$key</a></li>";
            $compteur++;
        }
        $html[]="<div id='dash'><a href='profilPro.php' id='profil' #$compteur class='dash' style='border-right: solid 1px; color: white;  #$compteur'>".$_SESSION['user'][0]['prenom'].' '.$_SESSION['user'][0]['nom']."</a>";
        $html[]="<a href='deconnexion.php'><img src='./images/decoIcon.png' style='width: 2%'/></a></div>";

    }
    switch($page){
        case 'accueil': $html=str_replace("#0","active",$html);
            break;
        case 'recherche': $html=str_replace("#1","active",$html);
            break;
        case 'about': $html=str_replace("#2","active",$html);
            break;
        case 'contact': $html=str_replace("#3","active",$html);
            break;
        case 'connexion': $html=str_replace("#4","active",$html);
            break;
        case 'profil': $html=str_replace("#4","color: #B02A9A; border-color: white;",$html);
    }
    return implode("\n",$html);
    print_r($_SESSION);


}

function listeFavoris(){
    $html = array();
    $dsn = 'mysql:dbname=db7;host=137.74.43.201';
    $user = 'rcharlier';
    $password = 'qe9hm2kx';
    try {
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        printf('Erreur'. $e->getMessage());
    }
    foreach($_SESSION['user']['favoris'] as $key=>$value) {
        $query = $db->query("SELECT nom,prenom  FROM professionnels WHERE id='$value' ");
        $retour = $query->fetchAll(PDO::FETCH_ASSOC);
        $html[]='<tr>';
                $html[]='<td><a href = "../site/medecin?id='.$value.'">'.$retour[0]['prenom'].' '.$retour[0]['nom'].'</a></td>';
                $html[]='<td><a href="deleteFavoris"><img src="images/deleteIcon2.png" class="icon" alt="'.$value.'" id="deleteFavoris"/></a></td >';
                $html[]='</tr>';
    }
    return implode("\n",$html);
}

function mdpPerdu(){
    $dsn = 'mysql:dbname=db7;host=137.74.43.201';
    $user = 'rcharlier';
    $password = 'qe9hm2kx';
    $email = $_POST['email'];
    $html = array();
    try {
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        printf('Erreur'. $e->getMessage());
    }
    $query = $db->query("SELECT * FROM utilisateurs WHERE email = '$email'");
    $nbResultats = $query->rowCount();
    if($nbResultats!=0){
        $html[] = '<h2>Confirmation</h2>';
        $html[] = '<p>Un email vous a été envoyé à l\'adresse: <b>'.$_POST['email'].'</b>.</p>';
        $html[] = '<p>Pour réinitialiser votre mot de passe, veuillez suivre le lien indiqué dans l\'email.</p>';
        sendMailConfirmation();

    }
    echo implode("\n",$html);
}


function sendMailConfirmation(){
    $to = $_POST['email'];
    $msg='test';
    $subject = '@EWR-Récupération de votre mot de passe.';
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset="UTF-8"' . "\r\n";
    $headers .= 'To: <'.$_POST['email'].'>' . "\r\n";
    $headers .= 'From: <martinouh@easywaitingroom.be>' . "\r\n";
    $headers .= 'Reply-To: <noReply@easywaitingroom.be>' . "\r\n";
    mail($to, $subject, $msg, $headers);
}

function getXmlCoordsFromAdress($address)
{
    $coords=array();
    $base_url="http://maps.googleapis.com/maps/api/geocode/xml?";
    $request_url = $base_url . "address=" . urlencode($address).'&sensor=false';
    $xml = simplexml_load_file($request_url) or die("url not loading");
    $coords['lat']=$coords['lon']='';
    $coords['status'] = $xml->status ;
    if($coords['status']=='OK')
    {
        $coords['lat'] = $xml->result->geometry->location->lat ;
        $coords['lon'] = $xml->result->geometry->location->lng ;
    }
    return $coords;
}

function capacite_med($nbre_pers,$cap_max){
    $pourcentage=0;
    if($nbre_pers==0){
        return '<b style="color:green; font-size:1.5em;"> 0 personne ( capacité max :'.$cap_max.' personnes )</b>';
    }else {
        $pourcentage=(($nbre_pers/$cap_max));
        if($pourcentage<0.25){
            return '<b style="color:green; font-size:1.5em;">'.plural_personne($nbre_pers).' ( max :'.$cap_max.' personnes )</b>';
        }else if($pourcentage<0.50){
            return '<b style="color:green; font-size:1.5em;">'.plural_personne($nbre_pers).' ( max :'.$cap_max.' personnes )</b>';
        }else if($pourcentage<0.75){
            return '<b style="color:orange; font-size:1.5em;">'.plural_personne($nbre_pers).' ( max :'.$cap_max.' personnes )</b>';
        }else{
            return '<b style="color:red; font-size:1.5em;">'.plural_personne($nbre_pers).'  ( max :'.$cap_max.' personnes )</b>';
        }
    }
}

function search(){
    $dsn = 'mysql:dbname=db7;host=137.74.43.201';
    $user = 'rcharlier';
    $password = 'qe9hm2kx';
    $capacite='';
    $pourcentage=0;
    $html = array();
    $info = array();
    $coord = array();
    $jour=date('N');
    $i=0;
    try {
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        printf('Erreur'. $e->getMessage());
    }
    error_reporting(0);
    $requete = htmlspecialchars($_GET['barre']);
    if($_GET['select']){
        $select = $_GET['select'];
        $query = $db->query("SELECT * FROM professionnels WHERE nom LIKE '$requete%'and type='$select' ORDER BY nom");
    }else{
        $query = $db->query("SELECT * FROM professionnels WHERE nom LIKE '$requete%' ORDER BY nom");
    }
    $nbResultats = $query->rowCount();
    if($nbResultats !=0){
        $html[] = '<meta charset="UTF-8">';
        $html[] = '<h2 >Résultat de votre recherche:<input type="image"  style="width:2%;margin-left: 54%" src="./images/updateIcon.png" onclick="refreshPage()"></h2>';
        $html[] = '<p style="border-bottom: solid 1px lightgrey; padding: 1%">Nous avons trouvé '.$nbResultats;
        $html[] =  $nbResultats > 1 ? ' résultats' : ' résultat'.' dans notre base de données. Voici le(s) médedecin(s) que nous avons trouvé(s) :<br/>';
        while($données = $query->fetch(PDO::FETCH_ASSOC)){
            $id=$données['id'];
            if($données['avatar']){
                $avatar = 'images/'.$données['avatar'];
            }else{
                $avatar= 'images/avatar/unknownIcon.png';
            }
            $coord[$i]['lattitude'] = $données['lattitude'];
            $coord[$i]['longitude'] = $données['longitude'];
            $i++;
            $nbre_pers=$données['nbre_pers'];
            $cap_max=$données['capacite_max'];
            $capacite=capacite_med($nbre_pers,$cap_max);     //récupère la capacité
            $info[] = '<div id="iw-container"><div class="iw-title">'.$données['prenom'].' '.$données['nom'].'</div><img src="'.$avatar.'" style="width:100px; height: 100px; padding: 1%;float: left"/>'.$capacite.'</div>';
            $query2 = $db->query("SELECT * FROM horaire WHERE idPro = $id ");
            $query3 = $db->query("SELECT * FROM adresse WHERE idPro = $id ");
            $horaire = $query2->fetchAll();
            $adresse = $query3->fetch(PDO::FETCH_ASSOC);
            $html[] =  '<div style="float:left;padding:1%"> ';
            $html[] =  '<h4><u><a href="medecin.php?id=' .$données['id'].'&lat='.$données['lattitude'].'&long='.$données['longitude'].'">'.$données['prenom'].' '.$données['nom'].'</a></u></h4>';
            $html[] =  '<p><img class="icon" src="./images/mapIcon3.png"/>'.$adresse['num'].','.$adresse['rue'].','.$adresse['ville'].'</p>';
            if($horaire[0][$jour]) {
                $html[] = '<p><img class="icon" src="./images/compteurIcon.png"/>Ouvert aujourd\' hui de '. $horaire[0][$jour] . '</p>';
            }else{
                $html[] = '<p><img class="icon" src="./images/compteurIcon.png"/>Fermé aujourd\'hui</p>';
            }
            $html[] =  '<p>'.$capacite.'</p>';
            $html[] =  '</div> ';

        }
    }else{
        $html[] = 'Désolé, aucune concordance trouvée dans notre base de données.';
    }
    $_POST['coord'] = json_encode($coord);
    $_POST['info'] = json_encode($info);
    echo implode('',$html);
}

function plural_personne($int){
    if ($int>1){
        return $int.' personnes';
    }else return $int.' personne';
}

function login_parti(){
    $dsn = 'mysql:dbname=db7;host=137.74.43.201';
    $user = 'rcharlier';
    $password = 'qe9hm2kx';
    global $json;
    try {
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        printf('Erreur' . $e->getMessage());
    }
        $req = $db->query('select id,nom,prenom,semence,mdp,telephone,email,group_concat(id_profil separator "," ) as profilid from utilisateurs left join profil_utilisateur on id_utilisateur=utilisateurs.id where email="' . $_POST['email'] . '" group by utilisateurs.id');
        $retour = $req->fetchAll(PDO::FETCH_ASSOC);
        $profilId = array();
        if (isset($retour[0])) {
            foreach ($retour as $key => $value) {
                $retour[$key]['profilid'] = array();
                foreach ($value as $k => $v) {
                    if (isset($value['profilid'])) {
                        $profilId[] = explode(',', $value['profilid']);
                        unset($value['profilid']);
                    }
                }
                foreach ($profilId[$key] as $index => $id) {
                    switch ($id) {
                        case '1':
                            $retour[$key]['profilid'][$id] = 'anonyme';
                            break;
                        case '2':
                            $retour[$key]['profilid'][$id] = 'activation';
                            break;
                        case '3':
                            $retour[$key]['profilid'][$id] = 'membre';
                            break;
                        case '4':
                            $retour[$key]['profilid'][$id] = 'admin';
                            break;
                    }
                }
            }
            $mdp = md5($retour[0]['semence'] . $_POST['mdp']);
            $tabFavoris = array();
            if ($retour[0]['mdp'] == $mdp) {
                $_SESSION['user'] = $retour;
                $idUser = $_SESSION['user'][0]['id'];
                $req2 = $db->query("select idPro from favoris where idUtilisateur ='$idUser'");
                $favoris = $req2->fetchAll(PDO::FETCH_ASSOC);
                foreach ($favoris as $key => $value) {
                    foreach ($value as $k => $v) {
                        $tabFavoris[] = $v;
                    }
                }
                $_SESSION['user']['favoris'] = $tabFavoris;
                genereStatuts();
                $json['connexion'] = '<div style="margin-top: 17%"> <h3>Connexion réussie!</h3> <p>Bienvenue ' . $_SESSION['user'][0]['prenom'] . ' ' . $_SESSION['user'][0]['nom'] . '</p></div>';
            } else {
                $json['erreurConnexion'] = 'Mot de passe et/ou login érroné(s)';
            }
        }
    die(json_encode($json));

}

function login_pro()
{
    $dsn = 'mysql:dbname=db7;host=137.74.43.201';
    $user = 'rcharlier';
    $password = 'qe9hm2kx';
    global $json;
    try {
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        printf('Erreur' . $e->getMessage());
    }
    $req3 = $db->query('select * from professionnels where mail="' . $_POST['email'] . '" ');
    $retour2 = $req3->fetchAll(PDO::FETCH_ASSOC);
    if (isset($retour2[0])) {
        //$mdp = md5($retour2[0]['semence'] . $_POST['mdp']);
        $mdp = $_POST['mdp'];
        if ($retour2[0]['mdp'] == $mdp) {
            $req4 = $db->query('select * from adresse where idPro="' . $retour2[0]['id'] . '" ');
            $adresse = $req4->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION['is']['anonym'] = false;
            $_SESSION['is']['pro'] = 1;
            $_SESSION['user'] = $retour2;
            $_SESSION['user']['adresse'] = $adresse;
            $json['connexion'] = '<div style="margin-top: 17%"> <h3>Connexion réussie!</h3> <p>Bienvenue ' . $_SESSION['user'][0]['prenom'] . ' ' . $_SESSION['user'][0]['nom'] . '</p></div>';
        } else {
            $json['erreurConnexion'] = 'Mot de passe et/ou login érroné(s)';
        }

        die(json_encode($json));
    }
}

function updateProfilPro(){
    $dsn = 'mysql:dbname=db7;host=137.74.43.201';
    $user = 'rcharlier';
    $password = 'qe9hm2kx';
    $id = $_SESSION['user'][0]['id'];
    try {
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        printf('Erreur'. $e->getMessage());
    }
    if($req1=$db->query('UPDATE professionnels SET nom="'.$_POST['nom'].'", prenom="'.$_POST['prenom'].'", telephone="'.$_POST['telephone'].'",mail="'.$_POST['mail'].'",site="'.$_POST['site'].'" where id="'.$id.'" ')
       && $req2=$db->query('UPDATE adresse SET num="'.$_POST['num'].'", rue="'.$_POST['rue'].'", cp="'.$_POST['cp'].'", ville="'.$_POST['ville'].'" where idPro="'.$id.'"') ){
        echo 'Mise à jour réussie';
        $_SESSION['user'][0]['nom'] = $_POST['nom'];
        $_SESSION['user'][0]['prenom'] = $_POST['prenom'];
        $_SESSION['user'][0]['telephone'] = $_POST['telephone'];
        $_SESSION['user'][0]['mail'] = $_POST['mail'];
        $_SESSION['user'][0]['site'] = $_POST['site'];
        $_SESSION['user']['adresse'][0]['num']= $_POST['num'];
        $_SESSION['user']['adresse'][0]['rue']= $_POST['rue'];
        $_SESSION['user']['adresse'][0]['cp']= $_POST['cp'];
        $_SESSION['user']['adresse'][0]['ville']= $_POST['ville'];
        $adresse = $_POST['num'].' '.$_POST['rue'].', '.$_POST['cp'].' '.$_POST['ville'];
        $coords=getXmlCoordsFromAdress($adresse);
        if($coords['status']=='OK') {
            $query = $db->query('UPDATE professionnels SET lattitude="'.$coords['lat'].'", longitude="'.$coords['lon'].'" WHERE id="'.$id.'"');
        }else{
            echo 'Une erreur est survenue, réessayez plus tard.';
        }

    }else{
        echo 'Une erreur s\'est produite, réessayez plus tard';
    }

}
function newRegister()
{
    $dsn = 'mysql:dbname=db7;host=137.74.43.201';
    $user = 'rcharlier';
    $password = 'qe9hm2kx';
    $date = date('Y-m-d H:i:s');
    $secret = '6Ld3lw4UAAAAAOfAaZ8SKgLfUbcMGx0fL8vRZbWp';
    global $json;
    try {
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        printf('Erreur' . $e->getMessage());
    }
    $semence = md5(time());
    $mdp = md5($semence . $_POST['mdp']);
    $req1 = $db->prepare('INSERT INTO utilisateurs (nom, prenom, semence, mdp, telephone, dateCreation, email) VALUES (:nom, :prenom, :semence, :mdp, :telephone, :dateCreation, :email)');
    $req2 = $db->prepare('INSERT INTO profil_utilisateur (id_utilisateur, id_profil) VALUES (:id_utilisateur, :id_profil)');
    try {
        $req1->execute(array(
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'semence' => $semence,
            'mdp' => $mdp,
            'telephone' => $_POST['telephone'],
            'dateCreation' => $date,
            'email' => $_POST['mail']
        )) && $req2->execute(array(
            'id_utilisateur' => $db->lastInsertId(),
            'id_profil' => '2'
        ));

    } catch (PDOException $e) {
        if ($e->getCode() == '23000')
            $json['inscriptionErreur'] = 'L\'adresse mail existe déjà dans la base de données';
            die(json_encode($json));
    }
    $json['inscription'] = '<div style="margin-top: 17%"><h3>Merci de votre inscription!</h3><p>Vous disposez maintenant de votre page de profil. <a href="./connexion.php">Me connecter?</a></p></div>';
    die(json_encode($json));

}


function updateAccount(){
    $mdp=md5($_SESSION['user'][0]['semence'].$_POST['mdp']);
    if($mdp==$_SESSION['user'][0]['mdp']){
    }else{

    }


}

function soumissionRDV(){
    $dsn = 'mysql:dbname=db7;host=137.74.43.201';
    $user = 'rcharlier';
    $password = 'qe9hm2kx';
    try {
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        printf('Erreur'. $e->getMessage());
    }
    $doctor_name=$_POST['doctor-name'];
    $req_doc_id = $db->prepare("SELECT id FROM professionnels WHERE nom LIKE '%:name%' ");
    $req_doc_id->bindParam(':name',$doctor_name, PDO::PARAM_STR);
    $req_doc_id->execute();
    $doc_id = $req_doc_id->fetch(PDO::FETCH_ASSOC);
//    $doc_mail = $db->query("SELECT mail FROM professionnels WHERE nom LIKE '$doctor_name'");
    $doc_mail = "francois2401@gmail.com";
    print_r($doc_id);
//    $myTime = strtotime($_POST['appointment-date']);
//    $rdv_date= date("Y-m-d H:i:s", $myTime);
    $rdv_date= $_POST['appointment-date'];
    $email_client=$_POST['email-client'];
    $objet=$_POST['objet'];
    $message=$_POST['message'];

    $req = $db->prepare('INSERT INTO rdv (date,id_utilisateur,id_professionnel) VALUES (:date,:id_utilisateur :id_professionnel)');
    if($req->execute(array(
            'date' => $rdv_date,
//            'id_utilisateur' => $_SESSION['user'][0]['id'],
            'id_utilisateur' => 25,
            'id_professionnel' => $doc_id
        ))){
        echo '<meta charset="UTF-8">Demande de rendez-vous soumise.';
        $to = $doc_mail;
        $subject = $objet;
        $msg = $message;
        $headers = 'From: '.$email_client. "\r\n" .
            'Reply-To: '. $email_client . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        if(mail($to, $subject, $msg,$headers)) {
            header('Location: appointment.php');
        }
    }else{
        echo 'Erreur';
    }
}

?>
