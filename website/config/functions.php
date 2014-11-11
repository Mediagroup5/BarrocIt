<?php
//Beveiliging tegen injecties
 function Security($input) {
	$output = $input;
	$output = addslashes($output);
	$output = DB::escape($output);
	$output = htmlspecialchars($output);
	
	return $output;
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