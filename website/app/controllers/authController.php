<?php
require '../../config/config.php';
//handelt de inlogform af...
if (isset($_POST['authUser']))
{
$username = Security($_POST['username']);
$password = sha1($_POST['password']);



$sql = "SELECT username, password, gebruikersrol FROM gebruikers WHERE username = '$username'";
if (! $query =  DB::query($sql)){
trigger_error('check de sql op fouten');
	}
			
			if (DB::num_rows($query) == 1){		
			$row = DB::fetch($query);
					
					if ($password == $row->password) {
				
					session_start();
					$_SESSION['name'] = $row;
					redirect($row->gebruikersrol, $link);
					}
			else {
			        //error meegeven via sessie
					$_SESSION['error'] = 'Username or Password is Incorrect';
					header('location: ../login.php');
				 }
			}
			else
			{
			//error meegeven via sessie
			   $_SESSION['error'] = 'User not Found';
			    header('location: ../login.php');
			}
			
}
	//handelt de uitlog af...
			if(isset($_GET['logout']))
			{
			    var_dump($_GET);
			    session_start();
			    session_destroy();
			    $_SESSION['error'] = "Succesfully Log Out";
		    	header('location:../login.php');
			}