<?php  
$page = "admin";
$id = "index";
include '../../../config/config.php';
include $rootlink. '/config/function.security.php';
require $rootlink. '/app/templates/header.php';
?>
<div class="container">
    <h1>projecten</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>naam</th>
            <th>datum</th>
            <th>beschrijving</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT projectnr_id, project_naam, begin_datum FROM projecten";
        if (! $query = DB::query($sql)){
            echo "Kan gegevens niet uit database halen";
        }
        if (DB::num_rows($query) > 0 ){
            while ($row = DB::fetch($query)){
                echo "<tr>";
                echo "<td>" . $row->project_naam . "</td>";
                echo "<td>" . $row->begin_datum . "</td>";
                echo "<td><a href='edit.php?id=". $row->projectnr_id . "'> Bewerk </a></td>";
                echo "<td><a href='delete.php?id=" . $row->projectnr_id . "'> X </a></td>";
                echo "</tr>";
            }
        }
        ?>
        </tbody>
    </table>

    <form action="index.php" method="post">
        <h2>project toevoegen</h2>
        <div class="form-group col-md-4">
            <label for="naam">Naam</label>
            <input type="text" class="form-control" name="naam" id="naam" placeholder="Naam van project"/>
        </div>
        <div class="form-group col-md-4">
            <label for="datum">Datum</label>
            <input type="date" class="form-control" name="datum" id="datum" placeholder="Datum van project"/>
        </div>
        <div class="form-group col-md-4">
            <label for="beschrijving">Beschrijving</label>
            <input type="text" class="form-control" name="beschrijving" id="beschrijving" placeholder="Beschrijving van project"/>
        </div>
        <div class="form-group col-md-4">
            <input type="submit" class="btn btn-success" value="toevoegen" name="submit"/>
        </div>
    </form>
    <?php
    if(isset($_POST['submit'])){

        if(! empty($_POST['naam']) && ! empty($_POST['datum']) && ! empty($_POST['beschrijving'])){
            $naam = mysqli_real_escape_string($con, $_POST['naam']);
            $datum = mysqli_real_escape_string($con, $_POST['datum']);
            $beschrijving = mysqli_real_escape_string($con, $_POST['beschrijving']);

            $sql = "INSERT INTO projecten (naam, datum, beschrijving) VALUES ('$naam', '$datum', '$beschrijving')";

            if (! $query = DB::query($sql)){
                echo 'Film toevoegen is niet gelukt. <a href="index.php"> Klik hier om terug te keren</a>';
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
