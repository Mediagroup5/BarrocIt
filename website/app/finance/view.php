<?php
include "templates/header.php";
?>
<div class="banner">
        <h1 class="bannertxt">Finance</h1>
    </div>
    <h2 class="ha2">Klantjes</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Klant nummer</th>
            <th>Bedrijfs naam</th>
            <th>Voorletter</th>
            <th>Voornaam</th>
            <th>Project nummer</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT factuur_nr, klant_nr, datum, bedrag, project_nr FROM klantgegevens";
        if (! $query = mysqli_query($con, $sql)){
            echo "Kan gegevens niet uit database halen";
        }
        if (mysqli_num_rows($query) > 1 ){
            while ($row = mysqli_fetch_assoc($query)){
                echo "<tr>";
                echo "<td>" . $row['factuur_nr'] . "</td>";
                echo "<td>" . $row['klant_nr'] . "</td>";
                echo "<td>" . $row['datum'] . "</td>";
                echo "<td>" . $row['bedrag'] . "</td>";
                echo "<td>" . $row['project_nr'] . "</td>";
                echo "<td><a href='edit.php?id=". $row['factuur_nr'] . "'> Bewerk </a></td>";
                echo "<td><a href='delete.php?id=" . $row['factuur_nr'] . "'> X </a></td>";
                echo "</tr>";
            }
        }
        ?>
</tbody>
</table>
<?php
include "templates/footer.php";
?>