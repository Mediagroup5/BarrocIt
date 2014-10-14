<?php  
$id = "users_index";
include '../../../config/config.php';
require $rootlink. '/app/templates/header.php';
?>
  
		
  
    <h2 class="ha2">Klanten</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Medewerker</th>
            <th>Portfiliotype</th>
            <th>omschrijving</th>
            <th>Aanvangsdatum</th>
            <th>Einddatum</th>
            <th>Opmerking</th>
        </tr>
        </thead>
        <tbody>
        <?php
       $query = $con->query("SELECT * FROM portflio");
        if (mysqli_num_rows($query) > 0 ){
            while ($row = mysqli_fetch_object($query)){
                echo "<tr>";
                echo "<td>" . $row->klant_nr . "</td>";
                echo "<td>" . $row->bedrijfs_naam . "</td>";
                echo "<td>" . $row->bankrekeningnummer . "</td>";
                echo "<td>" . $row->crediet . "</td>";
                echo "<td>" . $row->inkomsten . "</td>";
                echo "<td>" . $row->limiet . "</td>";
                echo "<td>" . $row->grootboekrekeningnummer . "</td>";
                echo "<td>" . $row->bkr . "</td>";
                echo "<td>" . $row->activated_facturen . "</td>";
                echo "<td>" . $row->deactivated_facturen . "</td>";
                echo "<td>" . $row->voorletter . "</td>";
                echo "<td>" . $row->voornaam . "</td>";
                echo "<td>" . $row->achternaam . "</td>";
                echo "<td><a href='facturen.php?id=". $row->klant_nr . "'> Factuur bekijk </a></td>";
                echo "<td><a href='klant.php?id=" . $row->klant_nr . "'> Klant gegevens </a></td>";
                echo "</tr>";
            }
        }
        ?>
        </tbody>
    </table>
 <?php
include $rootlink. "/app/templates/footer.php";
?>
</div>
