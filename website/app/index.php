<?php 

require '../config/config.php';

if(! isset($_SESSION['name'])){
    $_SESSION['error'] = 'U dient ingelogd te zijn';
    header('location: $link/app/login.php?msg=' . $msg);
}

$role = User::GetUserData("gebruikersrol");

redirect($role,$link);

?>