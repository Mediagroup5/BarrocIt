<?php  
$page = "development";
$id = "afspraak";
include '../../../config/config.php';
include $rootlink. '/config/function.security.php';
require $rootlink. '/app/templates/header.php';
?>


<div class="container">
    <div class="banner">
        <h1 class="bannertxt">Sales</h1>
    </div>
    <h2 class="ha2">Appointments</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Date</th>
            <th>Time</th>
            <th>Name</th>
             <th>Place</th>
                       

        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT afspraken_id, datum, tijd, naam, plaats FROM afspraken WHERE klant_nr = '".Security($_GET['id'])."'";
        if (! $query = mysqli_query($con, $sql)){
            echo "Kan gegevens niet uit database halen";
        }
        if (mysqli_num_rows($query) > 0 ){
            while ($row = mysqli_fetch_assoc($query)){
                echo "<tr>";
                echo "<td>" . $row['datum'] . "</td>";
                echo "<td>" . $row['tijd'] . "</td>";
                echo "<td>" . $row['naam'] . "</td>";
                echo "<td>" . $row['plaats'] . "</td>";

                                
                
                echo "</tr>";
            }
        }
        ?>
        </tbody>
    </table>

