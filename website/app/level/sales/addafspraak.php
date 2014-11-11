<?php  
$page = "sales";
$id = "afspraak";
include '../../../config/config.php';
include $rootlink. '/config/function.security.php';
require $rootlink. '/app/templates/header.php';
	
	

	if (!$con){
		echo 'Kan geen connectie maken met database';
		die();
	}  	//als hij geen connectie maakt dan doet hij dit.
	
	

	
	
	
	if( isset($_POST['submit'])){				//isset $_POST voegt gegevens toe aan database  	
		$datum 			= 		Security($_POST['datum']); //variabele aanmaken
		$naam 		= 	Security($_POST['naam']);//variabele aanmaken
		$tijd 			= 		Security($_POST['tijd']);//variabele aanmaken
		$klant = Security($_POST['klant']);
		$plaats 	= Security($_POST['plaats']);//variabele aanmaken
		$opmerkingen 	= Security($_POST['opmerkingen']);//variabele aanmaken

		if (!$query 	= DB::query("INSERT INTO afspraken (datum, klant_nr, naam, tijd, plaats, opmerkingen) 
											VALUES ('$datum', '".$klant."', '$naam','$tijd', '$plaats', '$opmerkingen')"))  //hier voegt hij toe waar het precies inmoet in database.

		{
			echo 'kan data niet toevoegen aan database'; //alshet niet lukt krijg je dit 
		}else{
			header('location: afspraak.php');   //blijft op zelfde pagina.
		}
	}


?>



<!DOCTYPE html>
<html>
<head>

<div class="container">
    <div class="banner">
        <h1 class="bannertxt">Sales</h1>
    </div>
    <h2 class="ha2">New Appointment</h2>
    <table class="table table-striped">
<thead>
			<tr>
			<form action="" method="POST">
				
				<label for="klant">Client</label>
<select  class="form-control" name="klant">
<?php
$sql = $con->query("SELECT klant_nr,bedrijfs_naam FROM klantgegevens");
while($row = DB::fetch($sql))
				
  echo'<option value="'.$row->klant_nr.'">'.$row->bedrijfs_naam.'</option>';
  ?>
</select>
<br><br>
				
				<label for="datum">Date</label>
				<input class="form-control" type="date" name="datum" id="datum" required>
                <br><br>
				

				<label for="naam">Name</label>
				<input  class="form-control" type="text" name="naam" id="naam" required>
				<br><br>
				

				<label for="tijd">Time</label>
				<input  class="form-control" type="time" name="tijd" id="tijd" required>

				
				<br><br>

				<label for="plaats">Place</label>
				<input  class="form-control" type="text" name="plaats" id="plaats" required>
                <br><br>

				<label for="opmerkingen">remarks</label>
				<textarea  class="form-control" name="opmerkingen" id="opmerkingen" cols="30" required></textarea>
				<br><br>
				<input  class="btn btn-primary" name="submit" type="submit" value="toevoegen">
		
				</form>
				
				</tr>
</thead>

	</div>
</body>
</html>	