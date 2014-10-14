<?php
include("./config/config.php");
if (isset($_SESSION['name'])) {
    header('location: '.$link.'/index.php');
} else {
    header('location: '.$link.'/login.php');
}
?>