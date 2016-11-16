<?php
/**
 * Created by PhpStorm.
 * User: Rom
 * Date: 12/11/2016
 * Time: 22:43
 */
session_start();
session_destroy();
header('Location: index.php');
?>


