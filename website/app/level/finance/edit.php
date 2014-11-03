<?php  
$page = "finance";
$id = "edit";
include '../../../config/config.php';
include $rootlink. '/config/function.security.php';
require $rootlink. '/app/templates/header.php';

if (! isset($_GET['id'])){
    header('location: index.php');
}else{
    $id = intval($_GET['id']);
    $sql = "SELECT factuur_nr, klant_nr, bedrag, project_nr, btw, factuur_tot, hoeveelheid, beschrijving,
    aantal, status FROM factuur where factuur_nr = '$id'";
    $query = mysqli_query($con, $sql);
    if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_object($query);
    }

}
?>
<div class="container">
    <div class="page-header">
        <h1>Invoices</h1>
    </div>
    <form action="edit.php" method="POST">
        <div class="form-group col-md-4 ">
            <label for="bedrijfs_naam">Company Name</label>
            <input type="number" class="form-control" name="bedrijfs_naam" id="bedrijf_naam"
                   value="<?php echo $row->klant_nr; ?>" placeholder="Klant nummer"/>
        </div>
        <div class="form-group col-md-4">
            <label for="Bedrag">Amount</label>
            <input type="number" class="form-control" name="bedrag" id="bedrag"
                   value="<?php echo $row->bedrag; ?>" placeholder="Bedrag"/>
        </div>


        <div class="form-group col-md-4">
            <label for="Factuur duur">Invoice last date</label>
            <input type="date" class="form-control" name="factuur_tot" id="factuur_tot"
                   value="<?php echo $row->factuur_tot; ?>" placeholder="Factuur t/m"/>
        </div>

        <div class="form-group col-md-4">
            <label for="Beschrijving">Description</label>
            <input type="date" class="form-control" name="beschrijving" id="beschrijving"
                   value="<?php echo $row->beschrijving; ?>" placeholder="Beschrijving"/>
        </div>

<!--         <div class="form-group col-md-4">
            <label for="Status">Status</label>
            <input type="enum" class="form-control" name="status" id="status"
                   value="<?php echo $row->status; ?>" placeholder="Status"/>
        </div> -->
        <input type="hidden" name="id" value=""/>
        <div class="form-group col-md-2">
            <input class="btn btn-warning" type="submit" value="Update" name="submit"/>
        </div>
    </form>

</div>
<?php
if (isset($_POST['submit'])){
    $klant_nr = mysqli_real_escape_string($con, $_POST['klant_nr']);
    $bedrag = mysqli_real_escape_string($con, $_POST['bedrag']);
    $project_nr = mysqli_real_escape_string($con, $_POST['project_nr']);
    $btw = mysqli_real_escape_string($con, $_POST['btw']);
    $factuur_duur = mysqli_real_escape_string($con, $_POST['factuur_tot']);
    $hoeveelheid = mysqli_real_escape_string($con, $_POST['hoeveelheid']);
    $beschrijving = mysqli_real_escape_string($con, $_POST['beschrijving']);
    $aantal = mysqli_real_escape_string($con, $_POST['aantal']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $id = $_POST['id'];

    $sql = "UPDATE factuur SET klant_nr = '$klant_nr', bedrag = '$bedrag', project_nr = '$project_nr',
    btw = '$btw', factuur_tot = '$factuur_tot', hoeveelheid = '$hoeveelheid', beschrijving = '$beschrijving',
    aantal = '$aantal', status = '$status'
     WHERE factuur_nr = '$id'";

    if(! $query = mysqli_query($con, $sql)){
        echo 'update query mislukt';
    }else{
        header('location: index.php');
    }
}
?>
