<?php 

require '../config/config.php';
require 'templates/header.php';

if(! isset($_SESSION['name'])){
    $_SESSION['error'] = 'U dient ingelogd te zijn';
    header('location: login.php?msg=' . $msg);
}

$role = User::GetUserData("gebruikersrol");

redirect($role,$link);

?>