<?php

require '../../config/config.php';

if ( isset($_POST['createUser']) ) 
{
	$voornaam      =mysqli_real_escape_string($con, $_POST['voornaam']);
	$tussenvoegsel =mysqli_real_escape_string($con, $_POST['tussenvoegsel']);
	$achternaam    =mysqli_real_escape_string($con, $_POST['achternaam']);
	$username      =mysqli_real_escape_string($con, $_POST['username']);
	$email         =mysqli_real_escape_string($con, $_POST['email']);
	$rol           =mysqli_real_escape_string($con, $_POST['rol']);
	
	// GROVE FOUT HIERONDER!!!!!!!!!! gaan we straks fixen!!
	$password      =mysqli_real_escape_string($con, $_POST['password']);

	/*
	* Verandering voor bij de laatste oefening:
	*
	*/

	//$hashed = password_hash($password, PASSWORD_DEFAULT);


	// voor de laatste oefening, verander de $password naar $hashed.
	
	$sql = "INSERT INTO users (voornaam, tussenvoegsel, achternaam, username, email, gebruikersrol, password)
			VALUES (
					'$voornaam',
					'$tussenvoegsel',
					'$achternaam',
					'$username',
					'$email',
					'$rol',
					'$password'
				)";

	$query = mysqli_query($con, $sql);

	if (!$query) {
		$msg = urlencode(trigger_error('query niet gelukt. geprobeerde query was ' . $sql));
		header('location: ../createUser.php?msg='.$msg);	
	}

	$msg = urlencode('Gebruiker <b>' . $username . '</b> is succesvol toegevoegd.');
	header ('location: ../createUser.php?msg='.$msg);
}

