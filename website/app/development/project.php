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
            <th>Onderhoudscontract</th>
            <th>Hardware</th>
            <th>Software</th>
            <th>Begin Datum</th>
            <th>Eind Datum</th>
            <th>Klant nummer</th>
            <th>Afspraken</th>
            <th>Status Project</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT projectnr_id, project_naam, onderhoudscontract, hardware, software, begin_datum, eind_datum, klant_nr, afspraken, status_project FROM projecten";
        if (! $query = mysqli_query($con, $sql)){
            echo "Kan gegevens niet uit database halen";
        }
        if (mysqli_num_rows($query) > 1 ){
            while ($row = mysqli_fetch_assoc($query)){
                echo "<tr>";
                echo "<td>" . $row['project_naam'] . "</td>";
                echo "<td>" . $row['onderhoudscontract'] . "</td>";
                echo "<td>" . $row['hardware'] . "</td>";
                echo "<td>" . $row['software'] . "</td>";
                echo "<td>" . $row['begin_datum'] . "</td>";
                echo "<td>" . $row['eind_datum'] . "</td>";
                echo "<td>" . $row['klant_nr'] . "</td>";
                echo "<td>" . $row['afspraken'] . "</td>";
                echo "<td>" . $row['status_project'] . "</td>";
                echo "<td><a href='edit.php?id=". $row['projectnr_id'] . "'> Bewerk </a></td>";
                echo "<td><a href='delete.php?id=" . $row['projectnr_id'] . "'> X </a></td>";
                echo "</tr>";
            }
        }
        ?>
        </tbody>

    </table>

      <a href="add.php">Toevoegen</a>
    <?php
    include "templates/footer.php";
    ?>
</div>

   