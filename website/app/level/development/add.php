<?php  
$page = "development";
$id = "add";
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

if (!$query 	= mysqli_query($con,"INSERT INTO afspraken (datum, klant_nr, naam, tijd, plaats, opmerkingen)
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
                    while($row = mysqli_fetch_object($sql))

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

<h2>Add project</h2>
    <form action="add.php" method="post">
        <div class="form-group col-md-4">
            <label for="Naam">Maintenance contract</label>
            <input type="text" class="form-control" name="project_naam" id="project_naam" placeholder="Onderhoudscontract"/>
        </div>
        <div class="form-group col-md-4">
            <label for="Naam">Hardware</label>
            <input type="text" class="form-control" name="project_naam" id="project_naam" placeholder="Hardware"/>
        </div>
        <div class="form-group col-md-4">
            <label for="Naam">Software</label>
            <input type="text" class="form-control" name="project_naam" id="project_naam" placeholder="Software"/>
        </div>
        <div class="form-group col-md-4">
            <label for="Datum">Start date</label>
            <input type="date" class="form-control" name="begin_datum" id="begin_datum" placeholder="Begin Datum"/>
        </div>
        <div class="form-group col-md-4">
            <label for="Datum">End date</label>
            <input type="date" class="form-control" name="eind_datum" id="eind_datum" placeholder="Eind Datum"/>
        </div>
        <div class="form-group col-md-4">
            <label for="Beschrijving">Customer number</label>
            <input type="text" class="form-control" name="Klant Nummer" id="klant_nr" placeholder="Klant nummer"/>
        </div>
        <div class="form-group col-md-4">
            <label for="Naam">Appointments</label>
            <input type="text" class="form-control" name="project_naam" id="project_naam" placeholder="Afspraken"/>
        </div>
        <div class="form-group col-md-4">
            <label for="Naam">Status Project</label>
            <input type="text" class="form-control" name="project_naam" id="project_naam" placeholder="Status Project"/>
        </div>
        <div class="form-group col-md-3">
            <input type="submit" class="btn btn-primary col-md-4" value="Add" name="submit"/>
        </div>
    </form>
    <?php
    if(isset($_POST['submit'])){

        if (! empty($_POST['project_naam'])
            && ! empty($_POST['onderhoudscontract'])
            && ! empty($_POST['hardware'])
            && ! empty($_POST['software'])
            && ! empty($_POST['begin_datum'])
            && ! empty($_POST['eind_datum'])
            && ! empty($_POST['klant_nr'])
            && ! empty($_POST['afspraken'])
            && ! empty($_POST['status_project'])){
            $project_naam = mysqli_real_escape_string($con, $_POST['project_naam']);
            $onderhoudscontract = mysqli_real_escape_string($con, $_POST['onderhoudscontract']);
            $hardware = mysqli_real_escape_string($con, $_POST['hardware']);
            $software = mysqli_real_escape_string($con, $_POST['software']);
            $begin_datum = mysqli_real_escape_string($con, $_POST['begin_datum']);
            $eind_datum = mysqli_real_escape_string($con, $_POST['eind_datum']);
            $klant_nr = mysqli_real_escape_string($con, $_POST['klant_nr']);
            $afspraken = mysqli_real_escape_string($con, $_POST['afspraken']);
            $status_project = mysqli_real_escape_string($con, $_POST['status_project']);

            $sql = "INSERT INTO projecten (project_naam, onderhoudscontract, hardware, software, begin_datum, eind_datum, klant_nr, afspraken, status_project) VALUES ('$project_naam','$onderhoudscontract','$hardware', '$software', '$begin_datum', '$eind_datum', '$klant_nr', '$afspraken')";

            if (! $query = mysqli_query($con, $sql)){
                echo 'Failed to add project <a href="index.php"> click here to return to the home page</a>';
            }else{
                header('location: index.php');
            }
        }else{
            header('location: index.php');
        }
    }
include $rootlink. "/app/templates/footer.php";
    ?>
</div>
