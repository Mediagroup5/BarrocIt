<?php  
$page = "sales";
$id = "index";
include '../../../config/config.php';
include $rootlink. '/config/function.security.php';
require $rootlink. '/app/templates/header.php';
	
	

	if (!$con){
		echo 'Kan geen connectie maken met database';
		die();
			  }  	//als hij geen connectie maakt dan doet hij dit.
	
	if( isset($_POST['submit'])){				     //isset $_POST voegt gegevens toe aan database  	
		$datum 			= $_POST['datum'];		    //variabele aanmaken
		$naam 			= $_POST['naam'];    	   //variabele aanmaken
		$tijd 			= $_POST['tijd'];	      //variabele aanmaken
		$plaats 		= $_POST['plaats'];      //variabele aanmaken
		$opmerkingen 	= $_POST['opmerkingen'];//variabele aanmaken

	if (!$query = mysqli_query($con,"INSERT INTO barroc_it(datum, naam, tijd, plaats, opmerkingen) 
											VALUES 		('$datum', '$naam','$tijd', '$plaats', '$opmerkingen')"))  //hier voegt hij toe waar het precies inmoet in database.
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
    <h2 class="ha2">Afspraak toevoegen</h2>
    <table class="table table-striped">
<thead>
			<tr>
			<form action="" method="POST">
				<label for="datum">datum</label>
				<input type="date" name="datum" id="datum" required>

				

				<label for="naam">naam</label>
				<input type="text" name="naam" id="naam" required>


				<label for="tijd">tijd</label>
				<input type="time" name="tijd" id="tijd" required>

				
				

				<label for="plaats">plaats</label>
				<input type="text" name="plaats" id="plaats" required>


				<label for="opmerkingen">opmerkingen</label>
				<textarea name="opmerkingen" id="opmerkingen" cols="30" required></textarea>
				
				<input name="submit" type="submit" value="toevoegen">
		
				</form>
				
			</tr>
</thead>

	</div>
</body>
</html>	