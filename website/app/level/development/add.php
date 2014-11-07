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
$project_naam                   =       Security($_POST['project_naam']);
$klant_nr                       =       Security($_POST['klant_nr']);
$onderhoudscontract 			= 		Security($_POST['onderhoudscontract']); //variabele aanmaken
$hardware 		                = 	    Security($_POST['hardware']);//variabele aanmaken
$software 			            = 		Security($_POST['software']);//variabele aanmaken
$begin_datum	                =       Security($_POST['begin_datum']);//variabele aanmaken
$eind_datum 	                =       Security($_POST['eind_datum']);//variabele aanmaken
$afspraken 	                    =       Security($_POST['afspraken']);//variabele aanmaken
$status_project 	            =       Security($_POST['status_project']);//variabele aanmaken

if (!$query 	= mysqli_query($con,"INSERT INTO projecten (project_naam, klant_nr, onderhoudscontract, hardware, software, begin_datum,
eind_datum, afspraken, status_project)
VALUES ('".$project_naam."', '".$klant_nr."', '".$onderhoudscontract."', '".$hardware."','".$software."', '".$begin_datum."',  '".$eind_datum."',
'".$afspraken."', '".$status_project."')"))  //hier voegt hij toe waar het precies inmoet in database.

{
echo 'kan data niet toevoegen aan database'.mysqli_error($con); //alshet niet lukt krijg je dit
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

                <label for="klant_nr">Client</label>
                <select  class="form-control" name="klant_nr">
                    <?php
                    $sql = $con->query("SELECT klant_nr,bedrijfs_naam FROM klantgegevens");
                    while($row = mysqli_fetch_object($sql))

                        echo'<option value="'.$row->klant_nr.'">'.$row->bedrijfs_naam.'</option>';
                    ?>
                </select>
                <br>

                <div class="form-group">
                    <label for="onderhoudscontract">Maintenance contract</label>
                    <select name="onderhoudscontract" class="form-control col-md-4">
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                    </select>
                </div>
                <br><br>

                <div class="form-group">
                    <label for="project_naam">Project Naam</label>
                    <input type="text" class="form-control" name="project_naam" id="project_naam" placeholder="Project Naam"/>
                </div>
                <br>

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
                    <label for="begin_datum">Start date</label>
                    <input type="date" class="form-control" name="begin_datum" id="begin_datum" placeholder="Start Date"/>
                </div>
                <br>


                <div class="form-group">
                    <label for="eind_datum">End date</label>
                    <input type="date" class="form-control" name="eind_datum" id="eind_datum" placeholder="Eind Datum"/>
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
//     if(isset($_POST['submit'])){

//         if (! empty($_POST['project_naam'])
//             && ! empty($_POST['onderhoudscontract'])
//             && ! empty($_POST['hardware'])
//             && ! empty($_POST['software'])
//             && ! empty($_POST['begin_datum'])
//             && ! empty($_POST['eind_datum'])
//             && ! empty($_POST['klant_nr'])
//             && ! empty($_POST['afspraken'])
//             && ! empty($_POST['status_project'])){
//             $project_naam = mysqli_real_escape_string($con, $_POST['project_naam']);
//             $onderhoudscontract = mysqli_real_escape_string($con, $_POST['onderhoudscontract']);
//             $hardware = mysqli_real_escape_string($con, $_POST['hardware']);
//             $software = mysqli_real_escape_string($con, $_POST['software']);
//             $begin_datum = mysqli_real_escape_string($con, $_POST['begin_datum']);
//             $eind_datum = mysqli_real_escape_string($con, $_POST['eind_datum']);
//             $klant_nr = mysqli_real_escape_string($con, $_POST['klant_nr']);
//             $afspraken = mysqli_real_escape_string($con, $_POST['afspraken']);
//             $status_project = mysqli_real_escape_string($con, $_POST['status_project']);

//             $sql = "INSERT INTO projecten (project_naam, onderhoudscontract, hardware, software, begin_datum, eind_datum, klant_nr, afspraken, status_project) VALUES ('$project_naam','$onderhoudscontract','$hardware', '$software', '$begin_datum', '$eind_datum', '$klant_nr', '$afspraken')";

//             if (! $query = mysqli_query($con, $sql)){
//                 echo 'Failed to add project <a href="index.php"> click here to return to the home page</a>';
//             }else{
//                 header('location: index.php');
//             }
//         }else{
//             header('location: index.php');
//         }
//     }
include $rootlink. "/app/templates/footer.php";
    ?>
</div>
