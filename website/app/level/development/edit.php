<?php  
$page = "development";
$id = "project";
include '../../../config/config.php';
include $rootlink. '/config/function.security.php';
require $rootlink. '/app/templates/header.php';

if (! isset($_GET['id'])){
    header('location: edit.php');
}else{
    $id = intval($_GET['id']);
    $sql = "SELECT projectnr_id, project_naam, onderhoudscontract, hardware, software, begin_datum, eind_datum, klant_nr, afspraken, status_project FROM projecten where projectnr_id = '$id'";
    $query = mysqli_query($con, $sql);
    if(mysqli_num_rows($query) == 1){
        $row = mysqli_fetch_assoc($query);
    }

}

?>
<div class="container">
    <div class="page-header">
        <h1>Edit project</h1>
    </div>
    <form action="edit.php" method="POST">
        <div class="form-group col-md-4">
            <label for="Project name">Project Name</label>
            <input type="text" class="form-control" name="project_naam" id="project_naam" placeholder="Project Name"/>
        </div>
        <div class="form-group col-md-4">
            <label for="Naam">Onderhoudscontract</label>
            <input type="text" class="form-control" name="project_naam" id="project_naam" placeholder="Maintenance contract"/>
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
            <label for="Datum">Begin Datum</label>
            <input type="date" class="form-control" name="begin_datum" id="begin_datum" placeholder="Start Date"/>
        </div>
        <div class="form-group col-md-4">
            <label for="Datum">Eind Datum</label>
            <input type="date" class="form-control" name="eind_datum" id="eind_datum" placeholder="End Datum"/>
        </div>
        <div class="form-group col-md-4">
            <label for="Beschrijving">Klant Nummer</label>
            <input type="text" class="form-control" name="Klant Nummer" id="klant_nr" placeholder="Customer number"/>
        </div>
        <div class="form-group col-md-4">
            <label for="Naam">Afspraken</label>
            <input type="text" class="form-control" name="project_naam" id="project_naam" placeholder="Appointments"/>
        </div>
        <div class="form-group col-md-4">
            <label for="Naam">Status Project</label>
            <input type="text" class="form-control" name="project_naam" id="project_naam" placeholder="Status Project"/>
        </div>
        <input type="hidden" name="projectnr_id" value="<?php echo $row['projectnr_id']; ?>"/>
        <div class="form-group col-md-2">
            <input class="btn btn-warning" type="submit" value="Update" name="submit"/>
        </div>
    </form>

</div>
<?php
if (isset($_POST['submit'])){
    $project_naam = mysqli_real_escape_string($con, $_POST['project_naam']);
    $onderhoudscontract = mysqli_real_escape_string($con, $_POST['onderhoudscontract']);
    $hardware = mysqli_real_escape_string($con, $_POST['hardware']);
    $software = mysqli_real_escape_string($con, $_POST['software']);
    $begin_datum = mysqli_real_escape_string($con, $_POST['begin_datum']);
    $eind_datum = mysqli_real_escape_string($con, $_POST['eind_datum']);
    $klant_nr = mysqli_real_escape_string($con, $_POST['klant_nr']);
    $afspraken = mysqli_real_escape_string($con, $_POST['afspraken']);
    $status_project = mysqli_real_escape_string($con, $_POST['status_project']);
    $projectnr_id = $_POST['projectnr_id'];
    $sql = "UPDATE projecten SET project_naam = '$project_naam', onderhoudscontract = '$onderhoudscontract', hardware = '$hardware', software = '$software', begin_datum = '$begin_datum', eind_datum = '$eind_datum', klant-nr ='$klant_nr', afspraken = '$afspraken', status_project = '$status_project' WHERE projectnr_id = '$projectnr_id'";

    if(! $query = mysqli_query($con, $sql)){
        echo 'update query mislukt';
    }else{
        header('location: index.php');
    }
}
?>
