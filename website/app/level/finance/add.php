<?php  
$page = "finance";
$id = "add";
include '../../../config/config.php';
include $rootlink. '/config/function.security.php';
require $rootlink. '/app/templates/header.php';

if(isset($_POST['submit'])){


    if(! empty($_POST['klant_nr']) && ! empty($_POST['bedrag']) && ! empty($_POST['project_nr']) && ! empty($_POST['btw'])
    && ! empty($_POST['factuur_duur']) && ! empty($_POST['hoeveelheid']) && ! empty($_POST['beschrijving'])
        && ! empty($_POST['aantal']) && ! empty($_POST['status'])){
        $klant_nr = mysqli_real_escape_string($con, $_POST['klant_nr']);
        $bedrag = mysqli_real_escape_string($con, $_POST['bedrag']);
        $project_nr = mysqli_real_escape_string($con, $_POST['project_nr']);
        $btw = mysqli_real_escape_string($con, $_POST['btw']);
        $factuur_duur = mysqli_real_escape_string($con, $_POST['factuur_duur']);
        $hoeveelheid = mysqli_real_escape_string($con, $_POST['hoeveelheid']);
        $beschrijving = mysqli_real_escape_string($con, $_POST['beschrijving']);
        $aantal = mysqli_real_escape_string($con, $_POST['aantal']);
        $status = mysqli_real_escape_string($con, $_POST['status']);

        $sql = "INSERT INTO factuur (klant_nr, bedrag, project_nr, btw, factuur_duur, hoeveelheid,
beschrijving, aantal, status) VALUES ('$klant_nr', '$bedrag', '$project_nr', '$btw',
 '$factuur_duur', '$hoeveelheid', '$beschrijving', '$aantal', '$status' )";

        if (! $query = mysqli_query($con, $sql)){
            echo 'Factuur toevoegen is niet gelukt...</a>';
        }else{
            header('location: facturen.php');
        }
    }else{
        header('location: facturen.php');
    }
}
?>

    <form action="add.php" method="post" class="form col-md-12">
        <h2 class="ha2">Add Invoices</h2>

        <div class="form-group col-md-6">
            <label for="Klant nummer">Company Name</label>
            <input type="number" class="form-control" name="bedrijfs_naam" id="bedrijfs_naam" placeholder="hallo"/>
        </div>
        <div class="form-group col-md-6">
            <label for="Bedrag">Amount</label>
            <input type="number" class="form-control" name="bedrag" id="bedrag" placeholder="Bedrag"/>
        </div>
        <div class="form-group col-md-6">
            <label for="Factuur duur">Invoice Last date</label>
            <input type="date" class="form-control" name="factuur_duur" id="factuur_duur" placeholder="Factuur t/m"/>
        </div>
        <div class="form-group col-md-6">
            <label for="Beschrijving">Description</label>
            <input type="text" class="form-control" name="beschrijving" id="beschrijving" placeholder="Beschrijving van project"/>
        </div>
        <div class="form-group col-md-6 ">
            <input type="submit" class="btn btn-warning" value="Submit" name="submit"/>
        </div>

    </form>
<?php

include $rootlink. "/app/templates/footer.php";
