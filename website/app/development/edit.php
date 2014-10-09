<?php include 'templates/header.php';

if (! isset($_GET['id'])){
    header('location: index.php');
}else{
    $id = intval($_GET['id']);
    $sql = "SELECT projectnr_id, project_naam, begin_datum, eind_datum, klant_nr FROM projecten where projectnr_id = '$id'";
    $query = mysqli_query($con, $sql);
    if(mysqli_num_rows($query) == 1){
        $row = mysqli_fetch_assoc($query);
    }

}

?>
<div class="container">
    <div class="page-header">
        <h1>project wijzigen</h1>
    </div>
    <form action="edit.php" method="POST">
        <div class="form-group col-md-4">
            <label for="Naam">Project_naam</label>
            <input type="text" class="form-control" name="project_naam" id="project_naam" placeholder="Project Naam"/>
        </div>
        <div class="form-group col-md-4">
            <label for="Datum">Begin Datum</label>
            <input type="date" class="form-control" name="begin_datum" id="begin_datum" placeholder="Begin Datum"/>
        </div>
        <div class="form-group col-md-4">
            <label for="Datum">Eind Datum</label>
            <input type="date" class="form-control" name="eind_datum" id="eind_datum" placeholder="Begin Datum"/>
        </div>
        <div class="form-group col-md-4">
            <label for="Beschrijving">Klant Nummer</label>
            <input type="text" class="form-control" name="Klant Nummer" id="klant_nr" placeholder="Klant nummer"/>
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
    $begin_datum = mysqli_real_escape_string($con, $_POST['begin_datum']);
    $eind_datum = mysqli_real_escape_string($con, $_POST['eind_datum']);
    $klant_nr = mysqli_real_escape_string($con, $_POST['klant_nr']);
    $projectnr_id = $_POST['projectnr_id'];
    $sql = "UPDATE projecten SET project_naam = '$project_naam', begin_datum = '$begin_datum', eind_datum = '$eind_datum', klant-nr ='$klant_nr' WHERE projectnr_id = '$projectnr_id'";

    if(! $query = mysqli_query($con, $sql)){
        echo 'update query mislukt';
    }else{
        header('location: index.php');
    }
}
?>
