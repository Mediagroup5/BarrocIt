<?php  
$page = "finance";
$id = "edit";
include '../../../config/config.php';
include $rootlink. '/config/function.security.php';

//submit form
if (isset($_POST['submit'])){
    //alle variables defineren
    $klant_nr = Security($_POST['klant_nr']);
    $bedrag = Security($_POST['bedrag']);
    $project_nr = Security($_POST['project_nr']);
    $btw = Security($_POST['btw']);
    $factuur_duur = Security($_POST['factuur_tot']);
    $hoeveelheid = Security($_POST['hoeveelheid']);
    $beschrijving = Security($_POST['beschrijving']);
    $aantal = Security($_POST['aantal']);
    $status = Security($_POST['status']);
    $id = Security($_POST['id']);
    //update query
    $sql = "UPDATE factuur SET klant_nr = '$klant_nr', bedrag = '$bedrag', project_nr = '$project_nr',
    btw = '$btw', factuur_tot = '$factuur_tot', hoeveelheid = '$hoeveelheid', beschrijving = '$beschrijving',
    aantal = '$aantal', status = '$status'
     WHERE factuur_nr = '$id'";
    //query uitvoeren
    if(! $query = DB::query($sql)){
        die('update query mislukt');
    }else{
        header('location: index.php');
    }
}

require $rootlink. '/app/templates/header.php';

if (! isset($_GET['id'])){
    header('location: index.php');
}else{
    $id = intval($_GET['id']);//Get the number value of a variable
    $sql = "SELECT factuur_nr, klant_nr, bedrag, project_nr, btw, factuur_tot, hoeveelheid, beschrijving,
    aantal, status FROM factuur where factuur_nr = '$id'";
    $query = DB::query($sql);
    if(DB::num_rows($query) > 0){//
        $row = DB::fetch($query);
    }

}


?>
<div class="container">
    <div class="page-header">
        <h1>Invoices</h1>
    </div>
    <form action="edit.php" method="POST">
<!--         <div class="form-group col-md-4 ">
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
            <label for="Factuur duur">Start date</label>
            <input type="date" class="form-control" name="factuur_begin" id="factuur_begin"
                   value="<?php echo $row->factuur_tot; ?>" placeholder="Factuur t/m"/>
        </div>

        <div class="form-group col-md-4">
            <label for="Factuur duur">Invoice last date</label>
            <input type="date" class="form-control" name="factuur_tot" id="factuur_tot"
                   value="<?php echo $row->factuur_tot; ?>" placeholder="Factuur t/m"/>
        </div>

        <div class="form-group col-md-4">
            <label for="Beschrijving">Description</label>
            <input type="text" class="form-control" name="beschrijving" id="beschrijving"
                   value="<?php echo $row->beschrijving; ?>" placeholder="Beschrijving"/>
        </div> -->
        <div class="form-group col-md-6">
            <label for="Bedrag">Amount</label>
            <input type="number" class="form-control" name="bedrag" id="bedrag"  style="color:black;" placeholder="Bedrag"/>
        </div>
        <div class="form-group col-md-6">
            <label for="Factuur duur">Quantity</label>
            <input type="number" class="form-control" name="hoeveelheid" id="hoeveelheid" placeholder="Quantity"/>
        </div>
        <div class="form-group col-md-6">
            <label for="Beschrijving">Description</label>
            <input type="text" class="form-control" name="beschrijving" id="beschrijving" placeholder="Description"/>
        </div>
         <div class="form-group col-md-6">
            <label for="pr_nr">Project Number</label>
            <input type="number" class="form-control" name="pr_nr" id="pr_nr" placeholder="Project number"/>
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
