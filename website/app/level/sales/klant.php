<?php  
$page = "sales";
$id = "klant";
include '../../../config/config.php';
include $rootlink. '/config/function.security.php';
require $rootlink. '/app/templates/header.php';
?>

    <div class="banner">
        <h1 class="bannertxt">Sales</h1>
    </div>
    <h2 class="ha2">Klanten</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Klant nummer</th>
            <th>Bedrijfsnaam</th>
            <th>Voorletter</th>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th>Adres</th>
            <th>Adres 2</th>
            <th>Postcode</th>
            <th>Postcode 2</th>
            <th>Residentie</th>
            <th>Residentie 2</th>
            <th>Woonplaats</th>
            <th>Telefoonnummer</th>
            <th>Telefoonnummer 2</th>
            <th>Fax nummer</th>
            <th>Email</th>
            <th>Offerte nummers</th>
            <th>inkomsten hoeveelheid</th>
            <th>Offerte Status</th>
            <th>Uitzondering</th>
            <th>Begin datum</th>
            <th>Afspraken</th>
            <th>intern contact person</th>
            <th>bankrekeningnummer</th>
            <th>crediet</th>
            <th>saldo</th>
            <th>aantal facturen</th>
            <th>omzetbedrag</th>
            <th>limiet</th>
            <th>grootboekrekeningnummer</th>
            <th>BTW code</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT klant_nr, bedrijfs_naam, voorletters, voornaam, achternaam FROM klantgegevens";
        if (! $query = mysqli_query($con, $sql)){
            echo "Kan gegevens niet uit database halen";
        }

        
        if (mysqli_num_rows($query) > 0 ){
            while ($row = mysqli_fetch_object($query)){
                echo "<tr>";
                echo "<td>" . $row->klant_nr . "</td>";
                echo "<td>" . $row->bedrijfs_naam . "</td>";
                echo "<td>" . $row->voorletter . "</td>";
                echo "<td>" . $row->voornaam . "</td>";
                echo "<td>" . $row->achternaam . "</td>";
          
                echo "<td><a href='project.php?id=". $row->klant_nr . "'> Project bekijk </a></td>";
                echo "<td><a href='klant.php?id=" . $row->klant_nr . "'> Klant gegevens </a></td>";
                echo "</tr>";
            }
        }
        ?>
        </tbody>
    </table>
<!--    <a href="add.php">add</a>-->
    <?php
    include "templates/footer.php";
    ?>
</div>