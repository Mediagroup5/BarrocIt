<?php
error_reporting(E_ALL);
Session_start();

//Wesite config ophalen. Omdat we met andere mappen structuren werken.
if(!isset($_SESSION['link']))
{
    $dbconfig = mysqli_connect("127.0.0.1","root","","barroc_it");
    $sqlconf = $dbconfig->query("SELECT * FROM site_config");
    $conf = mysqli_fetch_object($sqlconf);

    $link = $conf->link;
    $rootlink = $_SERVER['DOCUMENT_ROOT']. $conf->rootlink;
    $_SESSION['link'] = $link;
    $_SESSION['rootlink'] = $rootlink;
}
else
{
    $link = $_SESSION['link'];
    $rootlink = $_SESSION['rootlink'];
}

require("$rootlink/config/classes/class.mysqli.php");


//Hostname, bijvoorbeeld: localhost of 127.0.0.1
$host = "127.0.0.1";
//Database gebruikersnaam
$dbuser = "root";
//Database wachtwoord
$dbpass = "";
//Database naam
$dbname = "barroc_it";

$con = new DB($host,$dbuser,$dbpass,$dbname);
    
//connectie error?
if (mysqli_connect_error($con))
{
  // laat de error zien.
  die('Kan niet connecten: ' . mysqli_connect_error());
}

  
//Functies
require("$rootlink/config/functions.php");
//Users class
require("$rootlink/config/classes/class.users.php");
//Portfolio class
require("$rootlink/config/classes/class.portfolio.php");


?>