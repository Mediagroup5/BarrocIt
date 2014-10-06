<?php
include "templates/header.php";
?>
<link rel="stylesheet" href="rd.css"/>
<link rel="stylesheet" type="text/css" href="http://bootswatch.com/paper/bootstrap.min.css"/>
<div class="container">
    <div class="banner">
        <h1 class="bannertxt">Development</h1>
    </div>
    <h2 class="ha2">Projecten</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Naam</th>
            <th>Datum</th>
            <th>Beschrijving</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT id, naam, datum, beschrijving FROM projecten";
        if (! $query = mysqli_query($con, $sql)){
            echo "Kan gegevens niet uit database halen";
        }
        if (mysqli_num_rows($query) > 1 ){
            while ($row = mysqli_fetch_assoc($query)){
                echo "<tr>";
                echo "<td>" . $row['naam'] . "</td>";
                echo "<td>" . $row['datum'] . "</td>";
                echo "<td>" . $row['beschrijving'] . "</td>";
                echo "<td><a href='edit.php?id=". $row['id'] . "'> Bewerk </a></td>";
                echo "<td><a href='delete.php?id=" . $row['id'] . "'> X </a></td>";
                echo "</tr>";
            }
        }
        ?>
        </tbody>
    </table>

    <form action="index.php" method="post" class="form col-md-12">
        <h2 class="ha2">Project toevoegen</h2>
        <div class="form-group col-md-4">
            <label for="Naam">Naam</label>
            <input type="text" class="form-control" name="naam" id="naam" placeholder="Naam van project"/>
        </div>
        <div class="form-group col-md-4 col-md-offset-4">
            <label for="Datum">Datum</label>
            <input type="date" class="form-control" name="datum" id="datum" placeholder="Datum van project"/>
        </div>
        <div class="from-group col-md-12">
            <label for="Beschrijving">Beschrijving</label>
            <textarea type="text" class="form-control" name="beschrijving" id="beschrijving"></textarea>
        </div>
        <div class="form-group col-md-2">
            <input type="submit" class="btn" value="toevoegen" name="submit"/>
        </div>
    </form>
    <?php
    if(isset($_POST['submit'])){

        if(! empty($_POST['naam']) && ! empty($_POST['datum']) && ! empty($_POST['beschrijving'])){
            $naam = mysqli_real_escape_string($con, $_POST['naam']);
            $datum = mysqli_real_escape_string($con, $_POST['datum']);
            $beschrijving = mysqli_real_escape_string($con, $_POST['beschrijving']);

            $sql = "INSERT INTO projecten (naam, datum, beschrijving) VALUES ('$naam', '$datum', '$beschrijving')";

            if (! $query = mysqli_query($con, $sql)){
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
