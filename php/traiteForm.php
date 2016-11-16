<?php
session_start();
include "Fonctions.php";

    if (isset($_POST['insc_submit'])){
        newRegister();
    }

    if (isset($_POST['login_submit'])){
        login();
    }
    if (isset($_GET['rq'])){
        switch($_GET['rq']){
            case 'search':search();
            break;
        }
    }

?>
