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

if( isset($_POST['submit'])){//isset $_POST voegt gegevens toe aan database
$klant                          =       Security($_POST['klant']);
$maintenance_contract 			= 		Security($_POST['maintenance_contract']); //variabele aanmaken
$hardware 		                = 	    Security($_POST['hardware']);//variabele aanmaken
$software 			            = 		Security($_POST['software']);//variabele aanmaken
$start_date 	                =       Security($_POST['start_date']);//variabele aanmaken
$end_date 	                    =       Security($_POST['end_date']);//variabele aanmaken
$appointments 	                =       Security($_POST['appointments']);//variabele aanmaken
$status_project 	            =       Security($_POST['status_project']);//variabele aanmaken

if (!$query 	= mysqli_query($con,"INSERT INTO projecten (klant_nr, onderhoudscontract, hardware, software, begin_datum,
eind_datum, afspraken, status_project)
VALUES ('$klant','$maintenance_contract', '$hardware','$software', '$start_date', '$end_date',
'$appointments', '$status_project'"))  //hier voegt hij toe waar het precies inmoet in database.

{
echo 'kan data niet toevoegen aan database'; //alshet niet lukt krijg je dit
}else{
header('location: project.php');
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
            <form action="add.php" method="POST">

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
                    <select name="maintenance_contract" class="form-control col-md-4">
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                    </select>
                </div>
                <br><br>


                <div class="form-group">
                    <label for="Hardware">Hardware</label>
                    <input type="text" class="form-control" name="hardware" id="hardware" placeholder="Hardware"/>
                </div>
                <br>
                <div class="form-group">
                    <label for="Software">Software</label>
                    <input type="text" class="form-control" name="software" id="software" placeholder="Software"/>
                </div>
                <br>
                <div class="form-group">
                    <label for="Start date">Start date</label>
                    <input type="date" class="form-control" name="start_date" id="start_date" placeholder="Start Date"/>
                </div>
                <br>


                <div class="form-group">
                    <label for="End date">End date</label>
                    <input type="date" class="form-control" name="end_date" id="end_date" placeholder="End Date"/>
                </div>
                <br>


                <div class="form-group">
                    <label for="Appointments">Appointments</label>
                    <input type="text" class="form-control" name="appointments" id="appointments" placeholder="Appointments"/>
                </div>
                <br>


                <div class="form-group">
                    <label for="Status Project">Status Project</label>
                    <input type="text" class="form-control" name="status_project" id="status_project" placeholder="Status Project"/>
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
<!--    --><?php
/*    if(isset($_POST['submit'])){

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
    }*/
include $rootlink. "/app/templates/footer.php";
    ?>
</div>
