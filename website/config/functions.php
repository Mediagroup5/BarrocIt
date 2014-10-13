<?php
//Beveiliging tegen injecties
 function Security($input) {
	$output = $input;
	$mysqli = get_my_db();
	$output = addslashes($output);
	$output = $mysqli->real_escape_string($output);
	$output = htmlspecialchars($output);
	
	return $output;
}

//eigen gebruiker veranderd? Update de sessie.
	function UpdateUser($id)
	{
	$con = get_my_db();
	$sql = $con->query("SELECT * FROM users WHERE id = '".$id."' LIMIT 1");
	$data = mysqli_fetch_object($sql);
	$_SESSION['userdata'] = $data;
	return true;
	}
	
	//hash
function Jordyhash($string) {
	$output = sha1($string);
	
	return $output;
}

//redirecten naar de goede link.
    function redirect($rank)
    {
//	die($link);
	 switch($rank)
     {
     case 1:
	    header("location: ./finance/index.php");
        break;
	 
	 case 2:
	    header("location: ./development/index.php");
        break;
	 
	 case 3:
         header("location: ./sales/index.php");
         break;
		 
     case 4:
         header("location: ./admin/index.php");
         break;
		
	 default:
	    header("location: ./login.php");
	    break;
     }
 
    }

?>