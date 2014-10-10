<?php
include "templates/header.php";
?>
<link rel="stylesheet" href="sales.css"/>
<link rel="stylesheet" type="text/css" href="http://bootswatch.com/paper/bootstrap.min.css"/>
<div class="container">
    <div class="banner">
        <h1 class="bannertxt">Sales</h1>
    </div>
    <h2 class="ha2">Afspraken</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Datum</th>
            <th>Contact personen</th>
            <th>klant nummer</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT id, klant_nr, bedrijfs_naam, voorletters, voornaam, achternaam FROM klantgegevens";
        if (! $query = mysqli_query($con, $sql)){
            echo "Kan gegevens niet uit database halen";
        }
        if (mysqli_num_rows($query) > 1 ){
            while ($row = mysqli_fetch_assoc($query)){
                echo "<tr>";
                echo "<td>" . $row['datum'] . "</td>";
                echo "<td>" . $row['contact_persoon'] . "</td>";
                echo "<td>" . $row['klant_nr'] . "</td>";
                echo "<td><a href='edit.php?id=". $row['afspraken_id'] . "'> Bewerk </a></td>";
                echo "<td><a href='delete.php?id=" . $row['afspraken_id'] . "'> X </a></td>";
                
                echo "</tr>";
            }
        }
        ?>
        </tbody>
    </table>

    <form action="index.php" method="post" class="form col-md-12">
        <h2 class="ha2">Afspraak toevoegen</h2>
        <div class="form-group col-md-4">
            <label for="Naam">Datum</label>
            <input type="date" class="form-control" name="datum" afspraken_id="datum" placeholder="datum van project"/>
        </div>
        <div class="form-group col-md-4 col-md-offset-4">
            <label for="Datum">Contactpersoon</label>
            <input type="text" class="form-control" name="contact_persoon" afspraken_id="contact_persoon" placeholder="naam van contact persoon"/>
        </div>
        <div class="from-group col-md-12">
            <label for="Beschrijving">klant nummer</label>
            <input type="text" class="form-control" name="klant_nr" afspraken_id="klant_nr" placeholder="klant nummer"/>
        </div>
        <div class="form-group col-md-2">
            <input type="submit" class="btn" value="toevoegen" name="submit"/>
        </div>
    </form>
    <?php
    if(isset($_POST['submit'])){

        if(! empty($_POST['datum']) && ! empty($_POST['contact_persoon']) && ! empty($_POST['klant_nr'])){
            $datum = mysqli_real_escape_string($con, $_POST['datum']);
            $contact_persoon = mysqli_real_escape_string($con, $_POST['contact_persoon']);
            $klant_nr = mysqli_real_escape_string($con, $_POST['klant_nr']);

            $sql = "INSERT INTO afspraken ( datum, contact_persoon, klant_nr) VALUES ('$datum', '$contact_persoon', '$klant_nr')";

            if (! $query = mysqli_query($con, $sql)){
                echo 'Afspraak toevoegen is niet gelukt. <a href="index.php"> Klik hier om terug te keren</a>';
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
