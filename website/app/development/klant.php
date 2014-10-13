<?php
include "templates/header.php";
?>
<link rel="stylesheet" href="development.css"/>
<link rel="stylesheet" type="text/css" href="http://bootswatch.com/paper/bootstrap.min.css"/>
<div class="container">
<div class="container">
    <div class="banner">
        <h1 class="bannertxt">Development</h1>
    </div>
    <h2 class="ha2">Klantgegevens</h2>
    <table class="table table-condensed">
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
        $sql = "SELECT klant_nr, bedrijfs_naam, voorletter, voornaam, achternaam, adres, adres2, postcode, postcode2, residentie, residentie2, woonplaats, telefoon_nr, telefoonnummer2, fax_nr, email, offer_numbers, inkomsten_hoeveelheid, offer_status, prospect, date_action, last_contact_date, next_action, sale_percentage, creditworthy, maintenance_contract, open_projects, applications, hardware, software, appointments, internal_contact_person, bankrekeningnummer, crediet, saldo, aantal_facturen, omzetbedrag, limiet, grootboekrekeningnummer, btw_code FROM klantgegevens WHERE klant_nr = 1";
        if (! $query = mysqli_query($con, $sql)){
            echo "Kan gegevens niet uit database halen";
        }
        if (mysqli_num_rows($query) klant_nr  ){
            while ($row = mysqli_fetch_assoc($query)){
                echo "<tr>";
                echo "<td>" . $row['klant_nr'] . "</td>";
                echo "<td>" . $row['bedrijfs_naam'] . "</td>";
                echo "<td>" . $row['voorletter'] . "</td>";
                echo "<td>" . $row['voornaam'] . "</td>";
                echo "<td>" . $row['achternaam'] . "</td>";
                echo "<td>" . $row['adres'] . "</td>";
                echo "<td>" . $row['adres2'] . "</td>";
                echo "<td>" . $row['postcode'] . "</td>";
                echo "<td>" . $row['postcode2'] . "</td>";
                echo "<td>" . $row['residentie'] . "</td>";
                echo "<td>" . $row['residentie2'] . "</td>";
                echo "<td>" . $row['woonplaats'] . "</td>";
                echo "<td>" . $row['telefoon_nr'] . "</td>";
                echo "<td>" . $row['telefoonnummer2'] . "</td>";
                echo "<td>" . $row['fax_nr'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['offer_numbers'] . "</td>";
                echo "<td>" . $row['inkomsten_hoeveelheid'] . "</td>";
                echo "<td>" . $row['offer_status'] . "</td>";
                echo "<td>" . $row['prospect'] . "</td>";
                echo "<td>" . $row['date_action'] . "</td>";
                echo "<td>" . $row['last_contact_date'] . "</td>";
                echo "<td>" . $row['next_action'] . "</td>";
                echo "<td>" . $row['sale_percentage'] . "</td>";
                echo "<td>" . $row['creditworthy'] . "</td>";
                echo "<td>" . $row['maintenance_contract'] . "</td>";
                echo "<td>" . $row['open_projects'] . "</td>";
                echo "<td>" . $row['applications'] . "</td>";
                echo "<td>" . $row['internal_contact_person'] . "</td>";
                echo "<td>" . $row['bankrekeningnummer'] . "</td>";
                echo "<td>" . $row['crediet'] . "</td>";
                echo "<td>" . $row['saldo'] . "</td>";
                echo "<td>" . $row['aantal_facturen'] . "</td>";
                echo "<td>" . $row['omzetbedrag'] . "</td>";
                echo "<td>" . $row['limiet'] . "</td>";
                echo "<td>" . $row['grootboekrekeningnummer'] . "</td>";
                echo "<td>" . $row['btw_code'] . "</td>";

                
                echo "<td><a href='project.php?id=". $row['klant_nr'] . "'> Project bekijk </a></td>";
                echo "<td><a href='klant.php?id=" . $row['klant_nr'] . "'> Klant gegevens </a></td>";
                echo "<td><a href='inactive.php?id=" . $row['klant_nr'] . "'> inactief makenr </a></td>";
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