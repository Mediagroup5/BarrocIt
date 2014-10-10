<?php include 'templates/header.php';

if (! isset($_GET['id'])){
    header('location: index.php');
}else{
    $id = intval($_GET['id']);
    $sql = "SELECT factuur_nr, klant_nr, datum, bedrag, project_nr  FROM factuur where factuur_nr = '$id'";
    $query = mysqli_query($con, $sql);
    if(mysqli_num_rows($query) == 1){
        $row = mysqli_fetch_assoc($query);
    }

}
?>
<div class="container">
    <div class="page-header">
        <h1>Factuur wijzigen</h1>
    </div>
    <form action="edit.php" method="POST">
        <div class="form-group col-md-4">
            <label for="Klant nummer">Klant nummer</label>
            <input type="int" class="form-control" name="klant_nr" id="klant_nr" value="<?php $row['klant_nr'] ?>" placeholder="Klant nummer"/>
        </div>
        <div class="form-group col-md-4">
            <label for="Datum">Datum</label>
            <input type="date" class="form-control" name="datum" id="datum" placeholder="Datum"/>
        </div>
        <div class="form-group col-md-4">
            <label for="Bedrag">Bedrag</label>
            <input type="int" class="form-control" name="bedrag" id="bedrag" placeholder="Bedrag"/>
        </div>
        <div class="form-group col-md-4">
            <label for="Project nummer">Project nummer</label>
            <input type="int" class="form-control" name="project_nr" id="project_nr" placeholder="Project nummer"/>
        </div>
        <input type="hidden" name="id" value="<?php echo $row['factuur_nr']; ?>"/>
        <div class="form-group col-md-2">
            <input class="btn btn-warning" type="submit" value="Update" name="submit"/>
        </div>
    </form>

</div>
<?php
if (isset($_POST['submit'])){
    $klant_nr = mysqli_real_escape_string($con, $_POST['klant_nr']);
    $datum = mysqli_real_escape_string($con, $_POST['datum']);
    $bedrag = mysqli_real_escape_string($con, $_POST['bedrag']);
    $project_nr = mysqli_real_escape_string($con, $_POST['project_nr']);
    $id = $_POST['id'];
    $sql = "UPDATE factuur SET klant_nr = '$klant_nr', datum = '$datum', bedrag = '$bedrag', project_nr = '$project_nr'
     WHERE factuur_nr = '$id'";

    if(! $query = mysqli_query($con, $sql)){
        echo 'update query mislukt';
    }else{
        header('location: index.php');
    }
}
?>
