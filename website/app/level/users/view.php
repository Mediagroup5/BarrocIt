<?php  
$page = "finance";
$id = "view";
include '../../../config/config.php';
require $rootlink. '/app/templates/header.php';
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
            <th>Adres</th>
            <th>Postcode</th>
            <th>Woonplaats</th>
            <th>Telefoon nummer</th>
            <th>Fax nummer</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT klant_nr, bedrijfs_naam, voorletter, voornaam, achternaam, adres,
         postcode, woonplaats, telefoon_nr, fax_nr, email FROM klantgegevens";
        if (! $query = mysqli_query($con, $sql)){
            echo "Kan gegevens niet uit database halen";
        }
        if (mysqli_num_rows($query) > 1 ){
            while ($row = mysqli_fetch_assoc($query)){
                echo "<tr>";
                echo "<td>" . $row['klant_nr'] . "</td>";
                echo "<td>" . $row['bedrijfs_naam'] . "</td>";
                echo "<td>" . $row['voorletter'] . "</td>";
                echo "<td>" . $row['voornaam'] . "</td>";
                echo "<td>" . $row['achternaam'] . "</td>";
                echo "<td>" . $row['adres'] . "</td>";
                echo "<td>" . $row['postcode'] . "</td>";
                echo "<td>" . $row['woonplaats'] . "</td>";
                echo "<td>" . $row['telefoon_nr'] . "</td>";
                echo "<td>" . $row['fax_nr'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td><a href='edit.php?id=". $row['factuur_nr'] . "'> Bewerk </a></td>";
                echo "<td><a href='delete.php?id=" . $row['factuur_nr'] . "'> X </a></td>";
                echo "</tr>";
            }
        }
        ?>
</tbody>
</table>
<?php
include $rootlink. "/app/templates/footer.php";
?>