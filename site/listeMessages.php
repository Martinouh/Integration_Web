<?php
/**
 * Created by PhpStorm.
 * User: Rom
 * Date: 17/11/2016
 * Time: 13:27
 */
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


$query = $db->query("SELECT * FROM messages");
$messages=$query->fetchAll(PDO::FETCH_ASSOC);

?>

<table>
    <caption><b>Liste des messages</b></caption>
    <pre>
        <?php print_r($messages)?>
    </pre>
    <?php foreach($messages as $key => $value){
            foreach($value as $k => $v){
            }
        }?>
</table>

