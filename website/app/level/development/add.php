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
    <h2 class="ha2">New Project</h2>
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
                <br>

                <div class="form-group">
                    <label for="Maintenance contract">Maintenance contract</label>
                    <select class="form-control col-md-4">
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                    </select>
                </div>
                <br><br>


                <div class="form-group">
                    <label for="Hardware">Hardware</label>
                    <input type="text" class="form-control" name="project_naam" id="project_naam" placeholder="Hardware"/>
                </div>
                <br>
                <div class="form-group">
                    <label for="Software">Software</label>
                    <input type="text" class="form-control" name="project_naam" id="project_naam" placeholder="Software"/>
                </div>
                <br>
                <div class="form-group">
                    <label for="Start date">Start date</label>
                    <input type="date" class="form-control" name="begin_datum" id="begin_datum" placeholder="Start Date"/>
                </div>
                <br>


                <div class="form-group">
                    <label for="End date">End date</label>
                    <input type="date" class="form-control" name="eind_datum" id="eind_datum" placeholder="End Date"/>
                </div>
                <br>


                <div class="form-group">
                    <label for="Customer number">Customer number</label>
                    <input type="text" class="form-control" name="Klant Nummer" id="klant_nr" placeholder="Customer number"/>
                </div>
                <br>


                <div class="form-group">
                    <label for="Appointments">Appointments</label>
                    <input type="text" class="form-control" name="project_naam" id="project_naam" placeholder="Appointments"/>
                </div>
                <br>


                <div class="form-group">
                    <label for="Status Project">Status Project</label>
                    <input type="text" class="form-control" name="project_naam" id="project_naam" placeholder="Status Project"/>
                </div>
                <br>


                <div class="form-group ">
                    <input type="submit" class="btn btn-primary col-md-1" value="Add" name="submit"/>
                </div>

            </form>

        </tr>
        </thead>

</div>
</body>
</html>
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
