<?php  
$page = "sales";
$id = "afspraak";
include '../../../config/config.php';
include $rootlink. '/config/function.security.php';
require $rootlink. '/app/templates/header.php';



if (! isset($_GET['id'])){
    header('location: afspraak.php');
}else{
    $id = intval($_GET['id']);
    $sql = "SELECT afspraken_id, datum, naam, tijd, plaats, opmerkingen FROM afspraken where afspraken_id = '$id'";
    $query = DB::query($sql);
    if(DB::num_rows($query) == 1){
        $row = mysqli_fetch_assoc($query);
    }

}

?>
<div class="container">
    <div class="page-header">
        <h1>Edit Appointments</h1>
    </div>
    <form action="editafspraak.php" method="POST">
        
        <div class="form-group col-md-4">
            <label for="datum">Date</label>
            <input type="date" class="form-control" value='<?php echo $row['datum'];?>' name="datum" id="datum" placeholder="datum van project"/>
            	
        </div>
        <div class="form-group col-md-4">
            <label for="naam">Name</label>
            <input type="text" class="form-control" value='<?php echo $row['naam'];?>'name="naam" id="naam" placeholder="naam van contact persoon"/>
            
        </div>
        <div class="form-group col-md-4">
            <label for="tijd">Time</label>
            <input type="text" class="form-control" value='<?php echo $row['tijd'];?>'name="tijd" id="tijd" placeholder="tijd "/>
        </div>
        
        <div class="form-group col-md-4">
            <label for="plaats">Place</label>
            <input type="text" class="form-control" value='<?php echo $row['plaats'];?>'name="plaats" id="plaats" placeholder="plaats "/>
        </div>
        
           <div class="form-group col-md-8">
            <label for="opmerkingen">Remarks</label>
            <input type="text" class="form-control" value='<?php echo $row['opmerkingen'];?>'name="opmerkingen" id="opmerkingen" placeholder="opmerkingen "/>
        </div>
        
        <input type="hidden" name="afspraken_id" value="<?php echo $row['afspraken_id']; ?>"/>
        <div class="form-group col-md-4">
            <input class="btn btn-primary" type="submit" value="Update" name="submit"/>
        </div>
    </form>

</div>
<?php
if (isset($_POST['submit'])){
    $datum = mysqli_real_escape_string($con, $_POST['datum']);
    $naam = mysqli_real_escape_string($con, $_POST['naam']);
    $tijd = mysqli_real_escape_string($con, $_POST['tijd']);
    $plaats = mysqli_real_escape_string($con, $_POST['plaats']);
    $opmerkingen = mysqli_real_escape_string($con, $_POST['opmerkingen']);
    $afspraken_id = $_POST['afspraken_id'];
    $sql = "UPDATE afspraken SET datum = '$datum', naam = '$naam', tijd = '$tijd', plaats = '$plaats', opmerkingen = '$opmerkingen' WHERE afspraken_id = '$afspraken_id'";

    if(! $query = DB::query($sql)){
        echo 'update query mislukt';
    }else{
        header('location: afspraak.php');
    }
}
?>
