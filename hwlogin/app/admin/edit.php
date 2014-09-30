<?php include 'templates/header.php';

if (! isset($_GET['id'])){
    header('location: index.php');
}else{
    $id = intval($_GET['id']);
    $sql = "SELECT id, naam, datum, beschrijving FROM projecten where id = '$id'";
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
            <label for="naam">naam</label>
            <input type="text" class="form-control" name="naam" id="naam" placeholder="naam van project"/>
        </div>
        <div class="form-group col-md-4">
            <label for="datum">datum</label>
            <input type="date" class="form-control" name="datum" id="datum" placeholder="datum van project"/>
        </div>
        <div class="form-group col-md-4">
            <label for="beschrijving">beschrijving</label>
            <input type="text" class="form-control" name="beschrijving" id="beschrijving" placeholder="beschrijving van project"/>
        </div>
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
        <div class="form-group col-md-2">
            <input class="btn btn-warning" type="submit" value="Update" name="submit"/>
        </div>
    </form>

</div>
<?php
if (isset($_POST['submit'])){
    $naam = mysqli_real_escape_string($con, $_POST['naam']);
    $datum = mysqli_real_escape_string($con, $_POST['datum']);
    $beschrijving = mysqli_real_escape_string($con, $_POST['beschrijving']);
    $id = $_POST['id'];
    $sql = "UPDATE projecten SET naam = '$naam', datum = '$datum', beschrijving = '$beschrijving' WHERE id = '$id'";

    if(! $query = mysqli_query($con, $sql)){
        echo 'update query mislukt';
    }else{
        header('location: index.php');
    }
}
?>
