<?php  
$page = "development";
$id = "add";
include '../../../config/config.php';
include $rootlink. '/config/function.security.php';
require $rootlink. '/app/templates/header.php';
?>
<!--<link rel="stylesheet" href="development.css"/>-->
<!-- <link rel="stylesheet" type="text/css" href="http://bootswatch.com/paper/bootstrap.min.css"/> -->
<div class="container">

    <div class="banner">
       
    <form action="add.php" method="post" class="form col-md-12">
        <h2 class="ha2">Project toevoegen</h2>
        <div class="form-group col-md-4">
            <label for="Naam">Onderhoudscontract</label>
            <input type="text" class="form-control" name="project_naam" id="project_naam" placeholder="Onderhoudscontract"/>
        </div>
        <div class="form-group col-md-4">
            <label for="Naam">Hardware</label>
            <input type="text" class="form-control" name="project_naam" id="project_naam" placeholder="Hardware"/>
        </div>
        <div class="form-group col-md-4">
            <label for="Naam">Software</label>
            <input type="text" class="form-control" name="project_naam" id="project_naam" placeholder="Software"/>
        </div>
        <div class="form-group col-md-4">
            <label for="Datum">Begin Datum</label>
            <input type="date" class="form-control" name="begin_datum" id="begin_datum" placeholder="Begin Datum"/>
        </div>
        <div class="form-group col-md-4">
            <label for="Datum">Eind Datum</label>
            <input type="date" class="form-control" name="eind_datum" id="eind_datum" placeholder="Eind Datum"/>
        </div>
        <div class="form-group col-md-4">
            <label for="Beschrijving">Klant Nummer</label>
            <input type="text" class="form-control" name="Klant Nummer" id="klant_nr" placeholder="Klant nummer"/>
        </div>
        <div class="form-group col-md-4">
            <label for="Naam">Afspraken</label>
            <input type="text" class="form-control" name="project_naam" id="project_naam" placeholder="Afspraken"/>
        </div>
        <div class="form-group col-md-4">
            <label for="Naam">Status Project</label>
            <input type="text" class="form-control" name="project_naam" id="project_naam" placeholder="Status Project/>
        </div>
        <div class="form-group col-md-4">
            <input type="submit" class="btn btn-warning" value="Toevoegen" name="submit"/>
        </div>
    </form>
    <?php
    if(isset($_POST['submit'])){

        if (! empty($_POST['project_naam'])
            && ! empty($_POST['onderhoudscontract'])
            && ! empty($_POST['hardware'])
            && ! empty($_POST['software'])
            && ! empty($_POST['begin_datum'])
            && ! empty($_POST['eind_datum'])
            && ! empty($_POST['klant_nr'])
            && ! empty($_POST['afspraken'])
            && ! empty($_POST['status_project'])){
            $project_naam = mysqli_real_escape_string($con, $_POST['project_naam']);
            $onderhoudscontract = mysqli_real_escape_string($con, $_POST['onderhoudscontract']);
            $hardware = mysqli_real_escape_string($con, $_POST['hardware']);
            $software = mysqli_real_escape_string($con, $_POST['software']);
            $begin_datum = mysqli_real_escape_string($con, $_POST['begin_datum']);
            $eind_datum = mysqli_real_escape_string($con, $_POST['eind_datum']);
            $klant_nr = mysqli_real_escape_string($con, $_POST['klant_nr']);
            $afspraken = mysqli_real_escape_string($con, $_POST['afspraken']);
            $status_project = mysqli_real_escape_string($con, $_POST['status_project']);

            $sql = "INSERT INTO projecten (project_naam, onderhoudscontract, hardware, software, begin_datum, eind_datum, klant_nr, afspraken, status_project) VALUES ('$project_naam','$onderhoudscontract','$hardware', '$software', '$begin_datum', '$eind_datum', '$klant_nr', '$afspraken')";

            if (! $query = mysqli_query($con, $sql)){
                echo 'project toevoegen is niet gelukt. <a href="index.php"> Klik hier om terug te keren</a>';
            }else{
                header('location: index.php');
            }
        }else{
            header('location: index.php');
        }
    }
include $rootlink. "/app/templates/footer.php";
    ?>
</div>
