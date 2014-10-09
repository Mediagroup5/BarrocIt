<?php
include "templates/header.php";
?>
<link rel="stylesheet" href="development.css"/>
<link rel="stylesheet" type="text/css" href="http://bootswatch.com/paper/bootstrap.min.css"/>
<div class="container">
    <div class="banner">
        <h1 class="bannertxt">Development</h1>
    </div>
    <h2 class="ha2">Projecten</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Project Naam</th>
            <th>Begin Datum</th>
            <th>Eind Datum</th>
            <th>Klant nummer</th>
        </tr>
        </thead>
        <tbody>
        <?php
<<<<<<< HEAD
        $sql = "SELECT projectnr_id, project_naam, begin_datum, eind_datum, klant_nr FROM projecten";
=======
        $sql = "SELECT id, naam, datum, beschrijving FROM projecten";
>>>>>>> FETCH_HEAD
        if (! $query = mysqli_query($con, $sql)){
            echo "Kan gegevens niet uit database halen";
        }
        if (mysqli_num_rows($query) > 1 ){
            while ($row = mysqli_fetch_assoc($query)){
                echo "<tr>";
                echo "<td>" . $row['project_naam'] . "</td>";
                echo "<td>" . $row['begin_datum'] . "</td>";
                echo "<td>" . $row['eind_datum'] . "</td>";
                echo "<td>" . $row['klant_nr'] . "</td>";
                echo "<td><a href='edit.php?id=". $row['projectnr_id'] . "'> Bewerk </a></td>";
                echo "<td><a href='delete.php?id=" . $row['projectnr_id'] . "'> X </a></td>";
                echo "</tr>";
            }
        }
        ?>
        </tbody>
    </table>

    <form action="index.php" method="post" class="form col-md-12">
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
