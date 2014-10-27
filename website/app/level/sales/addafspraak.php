<?php  
$page = "sales";
$id = "addafspraak";
include '../../../config/config.php';
include $rootlink. '/config/function.security.php';
require $rootlink. '/app/templates/header.php';

?>

<?php

if (! isset($_GET['id'])){
    header('location: addafspraak.php');
}else{
    $id = intval($_GET['id']);
    $sql = "SELECT afspraken_id, datum, klant_nr FROM afspraken where afspraken_id = '$id'";
    $query = mysqli_query($con, $sql);
    if(mysqli_num_rows($query) == 0){
        $row = mysqli_fetch_object($query);
    }

}

?>
<div class="container">
    <div class="page-header">
        <h1>afspraken wijzigen</h1>
    </div>
    <form action="edit.php" method="POST">
        
        <div class="form-group col-md-4">
            <label for="datum">datum</label>
            <input type="date" class="form-control" value='<?php echo $row->datum;?>' name="datum" id="datum" placeholder="datum van project"/>
            	
        </div>

        <div class="form-group col-md-4">
            <label for="klant_nr">klant nummer</label>
            <input type="text" class="form-control" value='<?php echo $row->klant_nr;?>'name="klant_nr" id="klant_nr" placeholder="klant nummer"/>
        </div>
        <input type="hidden" name="afspraken_id" value="<?php echo $row->afspraken_id; ?>"/>
        <div class="form-group col-md-2">
            <input class="btn btn-warning" type="submit" value="Update" name="submit"/>
        </div>
    </form>

</div>