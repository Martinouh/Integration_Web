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



function genereStatuts(){
    $_SESSION['is']['anonym']=false;
    $_SESSION['is']['activ']=false;
    $_SESSION['is']['membre']=false;
    $_SESSION['is']['admin']=false;
    foreach($_SESSION['user'][0]['profilid'] as $key=>$value) {
        switch ($value){
            case'anonyme':        $_SESSION['is']['anonym']=1;
                break;
            case'activation':        $_SESSION['is']['activ']=1;
                break;
            case 'membre':        $_SESSION['is']['membre']=1;$_SESSION['is']['authentified']=1;$_SESSION['is']['edit']=1;
                break;
            case'admin':        $_SESSION['is']['admin']=1;$_SESSION['is']['authentified']=1;$_SESSION['is']['edit']=1;
                break;
        }
    }
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
    $requete = htmlspecialchars($_POST['searchbar']);
    $query = $db->query("SELECT * FROM professionnels WHERE nom LIKE '$requete%' ORDER BY nom");
    $nbResultats = $query->rowCount();
    if($nbResultats !=0){
        $html[] = '<meta charset="UTF-8">';
        $html[] = '<h1>Résultat de votre recherche.</h1>';
        $html[] = '<p>Nous avons trouvé '.$nbResultats;
        $html[] =  $nbResultats > 1 ? ' résultats' : ' résultat'.' dans notre base de données. Voici le(s) médedecin(s) que nous avons trouvé(s) :<br/>';
            while($données = $query->fetch(PDO::FETCH_ASSOC)){
                $html[] =  $données['prenom'].' '.$données['nom'];
            }
    }else{
        $html[] = 'Pas de resultat';
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
    $req = $db->query('select nom,prenom,semence,mdp,question,reponse,telephone,email,group_concat(id_profil separator "," ) as profilid from utilisateurs left join profil_utilisateur on id_utilisateur=utilisateurs.id where email="'.$_POST['email'].'" group by utilisateurs.id');
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
            printf('Bienvenue ' . $retour[0]['prenom']);
            $_SESSION['user'] = $retour;
            genereStatuts();
            print_r($_SESSION);
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
    $req1 = $db->prepare('INSERT INTO utilisateurs (nom, prenom, semence, mdp, question, reponse, telephone, dateCreation, email) VALUES (:nom, :prenom, :semence, :mdp, :question, :reponse, :telephone, :dateCreation, :email)');
    $req2 = $db->prepare('INSERT INTO profil_utilisateur (id_utilisateur, id_profil) VALUES (:id_utilisateur, :id_profil)');
    if($req1->execute(array(
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prénom'],
        'semence' => $semence,
        'mdp' => $mdp,
        'question' => $_POST['question'],
        'reponse' => $_POST['reponse'],
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
