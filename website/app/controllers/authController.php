<?php
require '../../config/config.php';
//handelt de inlogform af...
if (isset($_POST['authUser']))
{
session_start();
$username = mysqli_real_escape_string($con, $_POST['username']) ;

$password = mysqli_real_escape_string($con, $_POST['password']);



$sql = "SELECT username, password, gebruikersrol FROM gebruikers WHERE username = '$username'";
if (! $query =  mysqli_query($con, $sql)){
trigger_error('check de sql op fouten');
	}
			
			if (mysqli_num_rows($query) == 1){		
			$row = mysqli_fetch_object($query);
					
					if ($password == $row->password) {
				
					session_start();
					$_SESSION['name'] = $row;
					redirect($row->gebruikersrol, $link);
					}
			else {
			        //error meegeven via sessie
					$_SESSION['error'] = 'gebruikersnaam of wachtwoord is onjuist';
					header('location: ../login.php');
				 }
			}
			else
			{
			//error meegeven via sessie
			   $_SESSION['error'] = 'Gebruikers niet gevonden';
			    header('location: ../login.php');
			}
			
}
	//handelt de uitlog af...
			if(isset($_GET['logout']))
			{
			var_dump($_GET);
			session_start();
			session_destroy();
			$msg = urlencode("u bent succesvol uigelogd");
			header('location:../login.php?msg=' .$msg);
			
			
			}