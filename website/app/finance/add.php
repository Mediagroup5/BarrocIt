<?php
include "templates/header.php";
?>
    <form action="add.php" method="post" class="form col-md-12">
        <h2 class="ha2">Factuur toevoegen</h2>
        <div class="form-group col-md-6">
            <label for="Klant nummer">Klant nummer</label>
            <input type="int" class="form-control" name="klant_nr" id="klant_nr" placeholder="Klant nummer"/>
        </div>
        <div class="form-group col-md-6">
            <label for="Datum">Datum</label>
            <input type="date" class="form-control" name="datum" id="datum" placeholder="Datum van project"/>
        </div>
        <div class="from-group col-md-6">
            <label for="Bedrag">Bedrag</label>
            <textarea type="int" class="form-control" name="bedrag" id="bedrag"></textarea>
        </div>
        <div class="form-group col-md-6">
            <label for="Project nummer">Project nummer</label>
            <input type="int" class="form-control" name="project_nr" id="project_nr" placeholder="nummer van project"/>
        </div>
        <div class="form-group">
            <input type="submit" class="btn" value="toevoegen" name="submit"/>
        </div>

    </form>
<?php
if(isset($_POST['submit'])){

    if(! empty($_POST['klant_nr']) && ! empty($_POST['datum']) && ! empty($_POST['bedrag']) && ! empty($_POST['project_nr'])){
        $klant_nr = mysqli_real_escape_string($con, $_POST['klant_nr']);
        $datum = mysqli_real_escape_string($con, $_POST['datum']);
        $bedrag = mysqli_real_escape_string($con, $_POST['bedrag']);
        $project_nr = mysqli_real_escape_string($con, $_POST['project_nr']);

        $sql = "INSERT INTO factuur (klant_nr, datum, bedrag, project_nr)
            VALUES ('$klant_nr', '$datum', '$bedrag', '$project_nr')";

        if (! $query = mysqli_query($con, $sql)){
            echo 'Factuur toevoegen is niet gelukt...</a>';
        }else{
            header('location: index.php');
        }
    }else{
        header('location: index.php');
    }
}
include "templates/footer.php";