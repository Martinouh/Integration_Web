<?php
session_start();
include "Fonctions.php";

if (isset($_POST['insc_submit'])){
    newRegister();
}
if(isset($_POST['updateButton'])){
    updateAccount();
}

if (isset($_POST['login_submit']) or isset($_POST['login_submit_pro'])){
    login();
}
if (isset($_GET['rq'])){
    switch($_GET['rq']){
        case 'search':search();
            break;
        case 'submitContact':enregistreMessage();
            break;
        case 'favoris':favoris();
            break;
        case 'mdpPerdu':mdpPerdu();
            break;
        case 'update_profil_pro': updateProfilPro();
            break;
    }
}
?>
