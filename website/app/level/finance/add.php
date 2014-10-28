<?php  
$page = "finance";
$id = "add";
include '../../../config/config.php';
include $rootlink. '/config/function.security.php';
require $rootlink. '/app/templates/header.php';

if(isset($_POST['submit'])){

//$a = strtotime($_POST['factuur_duur'], '%Y-%m-%d');
//$timestamp = mktime(0, 0, 0, $a['tm_mon']+1, $a['tm_mday'], $a['tm_year']+1900);

//die($timestamp);


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
            header('location: index.php');
        }
    }else{
        header('location: index.php');
    }
}
?>

    <form action="add.php" method="post" class="form col-md-12">
        <h2 class="ha2">Factuur toevoegen</h2>
        <div class="form-group col-md-6">
            <label for="Klant nummer">Klant nummer</label>
            <input type="number" class="form-control" name="klant_nr" id="klant_nr" placeholder="hallo"/>
        </div>
        <div class="form-group col-md-6">
            <label for="Bedrag">Bedrag</label>
            <input type="number" class="form-control" name="bedrag" id="bedrag" placeholder="Bedrag"/>
        </div>
        <div class="form-group col-md-6">
            <label for="Project nummer">Project nummer</label>
            <input type="number" class="form-control" name="project_nr" id="project_nr" placeholder="nummer van project"/>
        </div>
        <div class="form-group col-md-6">
            <label for="Btw">BTW</label>
            <input type="number" class="form-control" name="btw" id="btw" placeholder="BTW"/>
        </div>
        <div class="form-group col-md-6">
            <label for="Factuur duur">Factuur t/m</label>
            <input type="date" class="form-control" name="factuur_duur" id="factuur_duur" placeholder="Factuur t/m"/>
        </div>
        <div class="form-group col-md-6">
            <label for="Hoeveelheid">Hoeveelheid</label>
            <input type="number" class="form-control" name="hoeveelheid" id="hoeveelheid" placeholder="Hoeveelheid"/>
        </div>
        <div class="form-group col-md-6">
            <label for="Beschrijving">Beschrijving</label>
            <input type="number" class="form-control" name="beschrijving" id="beschrijving" placeholder="Beschrijving van project"/>
        </div>
        <div class="form-group col-md-6">
            <label for="Aantal">Aantal</label>
            <input type="number" class="form-control" name="aantal" id="aantal" placeholder="Aantal"/>
        </div>
        <div class="form-group col-md-6">
            <label for="Status">Status</label>
            <input type="number" class="form-control" name="datum" id="datum" placeholder="Datum van project"/>
        </div>
        <div class="form-group col-md-6 ">
            <input type="submit" class="btn btn-warning" value="toevoegen" name="submit"/>
        </div>

    </form>
<?php

include $rootlink. "/app/templates/footer.php";
