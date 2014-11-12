<?php
//Beveiliging tegen injecties
 function Security($input) {
	$output = $input;
	$output = addslashes($output);
	$output = DB::escape($output);
	$output = htmlspecialchars($output);
	
	return $output;
}

 function GetRootLink()
 {
 
 $dbconfig = mysqli_connect("127.0.0.1","root","","barroc_it");
//Wesite config ophalen
 $sqlconf = $dbconfig->query("SELECT * FROM site_config");
 $conf = mysqli_fetch_object($sqlconf);

 $link = $conf->link;
 $rootlink = $_SERVER['DOCUMENT_ROOT']. $conf->rootlink;
 $_SESSION['link'] = $link;
 $_SESSION['rootlink'] = $rootlink;
 
 }
//eigen gebruiker veranderd? Update de sessie.
	function UpdateUser($id)
	{
	$sql = DB::query("SELECT * FROM users WHERE id = '".$id."' LIMIT 1");
	$data = DB::fetch($sql);
	$_SESSION['userdata'] = $data;
	return true;
	}
	
	//hash
function Jordyhash($string) {
	$output = sha1($string);
	
	return $output;
}

//redirecten naar de goede link.
    function redirect($rank, $link)
    {
//	die($link);
	 switch($rank)
     {
     case 1:
	    header("location: $link/level/finance/index.php");
        break;
	 
	 case 2:
	    header("location: $link/level/development/index.php");
        break;
	 
	 case 3:
         header("location: $link/level/sales/index.php");
         break;
		 
     case 4:
         header("location: $link/level/admin/index.php");
         break;
		
	 default:
	    header("location: $link/login.php");
	    break;
     }
 
    }

?>