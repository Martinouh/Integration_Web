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
        $html[]="<a href='profil.php' class='dash' style='border-right: solid 1px; color: white;'>".$_SESSION['user'][0]['prenom'].' '.$_SESSION['user'][0]['nom']."</a>";
        $html[]="<a href='deconnexion.php'><img src='images/decoIcon.png' style='width: 2%'/></a>";

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
    }
    return implode("\n",$html);

}

function sendMailMdpPerdu(){
}

function search(){
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
    $requete = htmlspecialchars($_GET['requete']);
    $query = $db->query("SELECT * FROM professionnels WHERE nom LIKE '$requete%' ORDER BY nom");
    $nbResultats = $query->rowCount();
    if($nbResultats !=0){
        $html[] = '<meta charset="UTF-8">';
        $html[] = '<h2>Résultat de votre recherche.</h2>';
        $html[] = '<p>Nous avons trouvé '.$nbResultats;
        $html[] =  $nbResultats > 1 ? ' résultats' : ' résultat'.' dans notre base de données. Voici le(s) médedecin(s) que nous avons trouvé(s) :<br/>';
            while($données = $query->fetch(PDO::FETCH_ASSOC)){
                $html[] =  '<a href="medecin.php?id='.$données['id'].'">'.$données['prenom'].' '.$données['nom'].'</a>';
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
    $req = $db->query('select nom,prenom,semence,mdp,telephone,email,group_concat(id_profil separator "," ) as profilid from utilisateurs left join profil_utilisateur on id_utilisateur=utilisateurs.id where email="'.$_POST['email'].'" group by utilisateurs.id');
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
        if ($retour[0]['mdp'] == $mdp) {
            $_SESSION['user'] = $retour;
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
?>
