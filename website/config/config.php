<?php

error_reporting(E_ALL);

//Portfolio class
require($_SERVER['DOCUMENT_ROOT']."/BarrocIt/website/config/classes/class.mysqli.php");


//Hostname, bijvoorbeeld: localhost of 127.0.0.1
$host = "127.0.0.1";
//Database gebruikersnaam
$dbuser = "root";
//Database wachtwoord
$dbpass = "Lolo1211";
//Database naam
$dbname = "barrocit";

$con = new DB($host,$dbuser,$dbpass,$dbname);
    
//connectie error?
if (mysqli_connect_error($con))
{
  // laat de error zien.
  die('Kan niet connecten: ' . mysqli_connect_error());
}

  
//Wesite config ophalen
$sqlconf = DB::query("SELECT * FROM site_config");
$conf = DB::fetch($sqlconf);

$link = $conf->link;
$rootlink = $_SERVER['DOCUMENT_ROOT']. $conf->rootlink;
  
//Functies
require("$rootlink/config/functions.php");
//Users class
require("$rootlink/config/classes/class.users.php");
//Portfolio class
require("$rootlink/config/classes/class.portfolio.php");


Session_start();
?>