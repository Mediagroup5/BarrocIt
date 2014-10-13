<?php

error_reporting(E_ALL);

<<<<<<< HEAD
$link = 'http://127.0.0.1/mg5/BarrocIt/website/app';
=======
$link = 'http://127.0.0.1/med/BarrocIt/website/app';
$rootlink = $_SERVER['DOCUMENT_ROOT']. '/med/BarrocIt/website/';
>>>>>>> origin/master
//Database verbinding

function get_my_db()
{
static $con;

if (!$con) 
{

//Hostname, bijvoorbeeld: localhost of 127.0.0.1
$host = "127.0.0.1";
//Database gebruikersnaam
$dbuser = "root";
//Database wachtwoord
$dbpass = "";
//Database naam
$dbname = "barroc_it";

$con = new mysqli($host,$dbuser,$dbpass,$dbname);
}

return $con;
}
// haald connectie op
$con = get_my_db();

//connectie error?
if (mysqli_connect_error($con))
  {
  // laat de error zien.
  die('Kan niet connecten: ' . mysqli_connect_error());
  }

  
  
  
//Functies
require("$rootlink/config/functions.php");
 
//Users class
require("$rootlink/config/class.users.php");

Session_start();
?>