<?php
    $requete = $_GET['q'];
    $select = $_GET['select'];

    $hint=array();
    if($requete) {
        $dsn = 'mysql:dbname=db7;host=137.74.43.201';
        $user = 'rcharlier';
        $password = 'qe9hm2kx';
        try {
            $db = new PDO($dsn, $user, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            printf('Erreur' . $e->getMessage());
        }

        $query = $db->query("SELECT id,nom FROM professionnels WHERE nom LIKE '$requete%' and type='$select' ORDER BY nom");
        $nbResultats = $query->rowCount();
        if ($nbResultats > 0) {
            while ($données = $query->fetch(PDO::FETCH_ASSOC)) {
                $hint[] = '<a href=./medecin.php?id='.$données['id'].'>'.$données['nom'].'</a>';
            }
            $tmp = implode("\n", $hint);
            echo $tmp;
        }
    }
?>
