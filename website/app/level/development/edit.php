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
    $sql = "SELECT projectnr_id, project_naam, onderhoudscontract, hardware, software, begin_datum, eind_datum
     FROM projecten where projectnr_id = '$id'";
    $query = DB::query($sql);
    if(mysqli_num_rows($query) == 1){
        $row = mysqli_fetch_object($query);

        $project_naam = $row->project_naam;
        $onderhoudscontract = $row->onderhoudscontract;
        $hardware = $row->hardware;
        $software = $row->software;
        $begin_datum = $row->begin_datum;
        $eind_datum = $row->eind_datum;
        $projectnr_id = $row->projectnr_id;
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
            <input type="text" class="form-control" name="project_naam" id="project_naam" value="<?php echo $project_naam; ?>"/>
        </div>
        <div class="form-group col-md-4">
            <label for="Maintenance contract">Maintenance contract</label>
            <input type="text" class="form-control" name="project_naam" id="project_naam" value="<?php echo $onderhoudscontract; ?>"/>
        </div>
        <div class="form-group col-md-4">
            <label for="Naam">Hardware</label>
            <input type="text" class="form-control" name="project_naam" id="project_naam" <?php echo $hardware; ?>/>
        </div>
        <div class="form-group col-md-4">
            <label for="Naam">Software</label>
            <input type="text" class="form-control" name="project_naam" id="project_naam" <?php echo $software; ?>/>
        </div>
        <div class="form-group col-md-4">
            <label for="Datum">Start Date</label>
            <input type="date" class="form-control" name="begin_datum" id="begin_datum" <?php echo $begin_datum; ?>/>
        </div>
        <div class="form-group col-md-4">
            <label for="Datum">End Date</label>
            <input type="date" class="form-control" name="eind_datum" id="eind_datum" <?php echo $eind_datum; ?>/>
        </div>
        <!--<div class="form-group col-md-4">
            <label for="Customer number">Customer number</label>
            <input type="text" class="form-control" name="Klant Nummer" id="klant_nr" placeholder="Customer number"/>
        </div>
        <div class="form-group col-md-4">
            <label for="Appointments">Appointments</label>
            <input type="text" class="form-control" name="project_naam" id="project_naam" placeholder="Appointments"/>
        </div>
        <div class="form-group col-md-4">
            <label for="Status project">Status Project</label>
            <input type="text" class="form-control" name="project_naam" id="project_naam" placeholder="Status Project"/>
        </div>-->
        <input type="hidden" name="projectnr_id" value="<?php echo $projectnr_id; ?>"/>
        <div class="form-group col-md-2">
            <input class="btn btn-primary" type="submit" value="Update" name="submit"/>
        </div>
    </form>

</div>
<?php
if (isset($_POST['submit'])){
    $project_naam = Security($_POST['project_naam']);
    $onderhoudscontract = Security($_POST['onderhoudscontract']);
    $hardware = Security($_POST['hardware']);
    $software = Security($_POST['software']);
    $begin_datum = Security($_POST['begin_datum']);
    $eind_datum = Security($_POST['eind_datum']);
    /*$klant_nr = Security($_POST['klant_nr']);
    $afspraken = Security($_POST['afspraken']);
    $status_project = Security($_POST['status_project']);*/
    $projectnr_id = $_POST['projectnr_id'];
    $sql = "UPDATE projecten SET project_naam = '$project_naam',
     onderhoudscontract = '$onderhoudscontract', hardware = '$hardware', software = '$software',
      begin_datum = '$begin_datum', eind_datum = '$eind_datum' WHERE projectnr_id = '$projectnr_id'";

    if(! $query = DB::query($sql)){
        echo 'update query mislukt';
    }else{
        header('location: index.php');
    }
}
?>
