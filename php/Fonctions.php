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


function anonyme(){
    $_SESSION['is']['anonym']=1;
    $_SESSION['is']['activ']=false;
    $_SESSION['is']['membre']=false;
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
        echo 'msg enregistré';
    }


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
        $html[]="<a href='deconnexion.php'><img src='images/decoIcon.png' style='width: 2%'/></a></div>";

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
        echo $key.' '.$value;
        /*$query = $db->query("SELECT nom,prenom  FROM professionnels WHERE id='$value' ");
        $retour = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r($retour);
        /*$html[]='<tr>';
                $html[]='<td><a href = "../php/medecin.php?'.$value.'">'.$retour['prenom'].' '.$retour['nom'].'</a></td >';
                $html[]='</tr>';

            return implode("\n",$html);*/
    }
}

function sendMailMdpPerdu(){
}

function search(){
    $dsn = 'mysql:dbname=db7;host=137.74.43.201';
    $user = 'rcharlier';
    $password = 'qe9hm2kx';
    $html = array();
    $jour=date('N');
    try {
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        printf('Erreur'. $e->getMessage());
    }
    $requete = htmlspecialchars($_GET['requete']);
    $query = $db->query("SELECT * FROM professionnels WHERE nom LIKE '$requete%' ORDER BY nom");
    $nbResultats = $query->rowCount();
    if($nbResultats !=0){
        $html[] = '<meta charset="UTF-8">';
        $html[] = '<h2 >Résultat de votre recherche:</h2>';
        $html[] = '<p style="border-bottom: solid 1px lightgrey; padding: 1%">Nous avons trouvé '.$nbResultats;
        $html[] =  $nbResultats > 1 ? ' résultats' : ' résultat'.' dans notre base de données. Voici le(s) médedecin(s) que nous avons trouvé(s) :<br/>';
        while($données = $query->fetch(PDO::FETCH_ASSOC)){
            $id=$données['id'];
            $query2 = $db->query("SELECT * FROM horaire WHERE idPro = $id ");
            $horaire = $query2->fetchAll();
            $html[] =  '<h4><u><a href="../site/medecin.php?id=' .$données['id'].'">'.$données['prenom'].' '.$données['nom'].'</a></u></h4>';
            $html[] =  '<p><img class="icon" src="../site/images/mapIcon3.png"/>'.$données['adresse'].'</p>';
            if($horaire[0][$jour]) {
                $html[] = '<p><img class="icon" src="../site/images/compteurIcon.png"/>Ouvert aujourd\' hui de '. $horaire[0][$jour] . '</p>';
            }else{
                $html[] = '<p><img class="icon" src="../site/images/compteurIcon.png"/>Fermé aujourd\'hui</p>';
            }
            $html[] =  '<p>'.$données['nbre_pers'].' personnes dans la salle d\'attente</p>';
        }
    }else{
        $html[] = 'Désolé, aucune concordance trouvée dans notre base de données.';
    }
    echo implode('',$html);
}


function login()
{
    $dsn = 'mysql:dbname=db7;host=137.74.43.201';
    $user = 'rcharlier';
    $password = 'qe9hm2kx';
    try {
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        printf('Erreur' . $e->getMessage());
    }
    $req = $db->query('select id,nom,prenom,semence,mdp,telephone,email,group_concat(id_profil separator "," ) as profilid from utilisateurs left join profil_utilisateur on id_utilisateur=utilisateurs.id where email="'.$_POST['email'].'" group by utilisateurs.id');
    $retour = $req->fetchAll(PDO::FETCH_ASSOC);
    $profilId = array();
    foreach ($retour as $key => $value) {
        $retour[$key]['profilid'] = array();
        foreach ($value as $k => $v) {
            if (isset($value['profilid'])) {
                $profilId[] = explode(',', $value['profilid']);
                unset($value['profilid']);
            }
        }
        foreach ($profilId[$key] as $index => $id){
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
    if (isset($retour[0])) {
        $mdp = md5($retour[0]['semence'] . $_POST['mdp']);
        $tabFavoris=array();
        if ($retour[0]['mdp'] == $mdp) {
            $_SESSION['user'] = $retour;
            $idUser = $_SESSION['user'][0]['id'];
            $req2 = $db->query("select idPro from favoris where idUtilisateur ='$idUser'");
            $favoris =  $req2->fetchAll(PDO::FETCH_ASSOC);
            foreach($favoris as $key=>$value){
                foreach($value as $k=>$v){
                    $tabFavoris[]=$v;
                }
            }
            $_SESSION['user']['favoris'] = $tabFavoris;
            genereStatuts();
            header('Location: ../site/index.php');
        }else {
            echo 'Connexion refusée';
        }
    }else{
        echo 'Connexion refusée';
    }
}
function newRegister(){
    $dsn = 'mysql:dbname=db7;host=137.74.43.201';
    $user = 'rcharlier';
    $password = 'qe9hm2kx';
    $date = date('Y-m-d H:i:s');
    try {
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        printf('Erreur'. $e->getMessage());
    }
    $semence = md5(time());
    $mdp = md5($semence.$_POST['mdp']);
    $req1 = $db->prepare('INSERT INTO utilisateurs (nom, prenom, semence, mdp, telephone, dateCreation, email) VALUES (:nom, :prenom, :semence, :mdp, :telephone, :dateCreation, :email)');
    $req2 = $db->prepare('INSERT INTO profil_utilisateur (id_utilisateur, id_profil) VALUES (:id_utilisateur, :id_profil)');
    if($req1->execute(array(
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'semence' => $semence,
            'mdp' => $mdp,
            'telephone' => $_POST['telephone'],
            'dateCreation' => $date,
            'email' => $_POST['mail']
        )) &&$req2->execute(array(
            'id_utilisateur' => $db->lastInsertId(),
            'id_profil' => '2'
        ))){
        echo '<meta charset="UTF-8">Inscription réussie';
    }else{
        echo 'Erreur';
    }


}

function chargeTemplate($t){
    $file = file('../HTML/'.$t.'.html');
    return implode('',$file);
}

function traiteRequete($rq){
    global $envoi;
    switch($rq){
        case 'form_register': $envoi['formInscription'] = chargeTemplate($rq);
    }

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
    $myTime = strtotime($_POST['appointment-date']);
    $rdv_date= date("Y-m-d H:i:s", $myTime);
    $email_client=$_POST['email-client'];
    $objet=$_POST['objet'];
    $message=$_POST['message'];

    $req = $db->prepare('INSERT INTO rdv (doctor_name, rdv_date, email_client,objet,message) VALUES (:doctor_name, :rdv_date, :email_client, :objet, :message)');
    if($req->execute(array(
            'doctor_name' => $doctor_name,
            'rdv_date' => $rdv_date,
            'email_client' => $email_client,
            'objet' => $objet,
            'message' => $message
        ))){
        echo '<meta charset="UTF-8">Demande de rendez-vous soumise.';
        $to = "example@example.com";
        $subject = 'le sujet';
        $msg = 'Bonjour !';
        $headers = 'From: example@example.com' . "\r\n" .
            'Reply-To: example@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $msg,$headers);
    }else{
        echo 'Erreur';
    }

}

?>
