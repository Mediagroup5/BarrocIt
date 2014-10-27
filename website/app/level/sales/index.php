<?php  
$page = "sales";
$id = "index";
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
            <th>Voorletters</th>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th>Project bekijken</th>
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
               echo "<td>" . $row->klant_nr . "</td>";
                echo "<td>" . $row->bedrijfs_naam . "</td>";
                echo "<td>" . $row->voorletters . "</td>";
                echo "<td>" . $row->voornaam . "</td>";
                echo "<td>" . $row->achternaam . "</td>";
                echo "<td><a href='project.php?id=". $row->klant_nr . "'> Bekijk/Bewerk </a></td>";

	
                echo "</tr>";
            }
        }
        ?>
        </tbody>
    </table>
<!--    <a href="add.php">add</a>-->
</div>

   