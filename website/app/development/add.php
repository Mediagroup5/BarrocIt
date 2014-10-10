<?php
include "templates/header.php";
?>
<!--<link rel="stylesheet" href="development.css"/>-->
<link rel="stylesheet" type="text/css" href="http://bootswatch.com/paper/bootstrap.min.css"/>
<div class="container">
    <div class="banner">
        <h1 class="bannertxt">Development</h1>
    
    <form action="add.php" method="post" class="form col-md-12">
        <h2 class="ha2">Project toevoegen</h2>
        <div class="form-group col-md-4">
            <label for="Naam">Project Naam</label>
            <input type="text" class="form-control" name="project_naam" id="project_naam" placeholder="Project Naam"/>
        </div>
        <div class="form-group col-md-4 col-md-offset-4">
            <label for="Datum">Begin datum</label>
            <input type="date" class="form-control" name="begin_datum" id="begin_datum" placeholder="Begin datum"/>
        </div>
        <div class="form-group col-md-4 col-md-offset-4">
            <label for="Datum">Eind datum</label>
            <input type="date" class="form-control" name="eind_datum" id="eind_datum" placeholder="Eind datum"/>
        </div>
        <div class="form-group col-md-12">
            <label for="Beschrijving">Klant nummer</label>
            <input type="text" class="form-control" name="klant_nr" id="klant_nr" placeholder="Klant nummer"/>
        </div>
        <div class="form-group col-md-2">
            <input type="submit" class="btn" value="toevoegen" name="submit"/>
        </div>
    </form>
    <?php
    if(isset($_POST['submit'])){

        if (! empty($_POST['project_naam']) && ! empty($_POST['begin_datum']) && ! empty($_POST['eind_datum']) && ! empty($_POST['klant_nr'])){
            $project_naam = mysqli_real_escape_string($con, $_POST['project_naam']);
            $begin_datum = mysqli_real_escape_string($con, $_POST['begin_datum']);
            $eind_datum = mysqli_real_escape_string($con, $_POST['eind_datum']);
            $klant_nr = mysqli_real_escape_string($con, $_POST['klant_nr']);

            $sql = "INSERT INTO projecten (project_naam, begin_datum, eind_datum, klant_nr) VALUES ('$project_naam', '$begin_datum', '$eind_datum', '$klant_nr')";

            if (! $query = mysqli_query($con, $sql)){
                echo 'project toevoegen is niet gelukt. <a href="index.php"> Klik hier om terug te keren</a>';
            }else{
                header('location: index.php');
            }
        }else{
            header('location: index.php');
        }
    }
    include "templates/footer.php";
    ?>
</div>
