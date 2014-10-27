<?php  
$page = "finance";
$id = "facturen";
include '../../../config/config.php';
include $rootlink. '/config/function.security.php';
require $rootlink. '/app/templates/header.php';
?>
<div class="container">
    <h2 class="ha2">Facturen</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Klant nummer</th>
            <th>Factuur nummer</th>
            <th>Bedrag</th>
            <th>Project nummer</th>
            <th>BTW</th>
            <th>Offer status</th>
            <th>Hoeveelheid</th>
            <th>Beschrijving</th>
            <th>Aantal</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM factuur WHERE klant_nr = '".Security($_GET['id'])."'";
        if (! $query = mysqli_query($con, $sql)){
            echo "Kan gegevens niet uit database halen";
        }

        if (mysqli_num_rows($query) > 0 ){
            while ($row = mysqli_fetch_object($query)){
                echo "<tr>";
                echo "<td>" . $row->klant_nr . "</td>";
                echo "<td>" . $row->factuur_nr . "</td>";
                echo "<td>" . $row->bedrag . "</td>";
                echo "<td>" . $row->project_nr . "</td>";
                echo "<td>" . $row->btw . "</td>";
                echo "<td>" . $row->factuur_tot . "</td>";
                echo "<td>" . $row->hoeveelheid . "</td>";
                echo "<td>" . $row->beschrijving . "</td>";
                echo "<td>" . $row->aantal . "</td>";
                echo "<td>" . $row->status . "</td>";
                echo "<td><a href='edit.php?id=". $row->klant_nr . "'> Bewerk </a></td>";
                echo "<td><a href='delete.php?id=" . $row->klant_nr . "'> X </a></td>";
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
