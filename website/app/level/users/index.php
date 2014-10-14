<?php  
$id = "users_index";
include '../../../config/config.php';
require $rootlink. '/app/templates/header.php';
?>
  
		
  
    <h2 class="ha2">Portfolio</h2>
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
       $query = $con->query("SELECT * FROM portfolio");
        if (mysqli_num_rows($query) > 0 ){
            while ($row = mysqli_fetch_object($query)){
                echo "<tr>";
                echo "<td>----</td>";
                echo "<td>" . $row->type . "</td>";
                echo "<td>" . $row->omschrijving . "</td>";
                echo "<td>" . $row->aanv_datum . "</td>";
                echo "<td>" . $row->eind_datum . "</td>";
                echo "<td>" . $row->opmerking . "</td>";
                echo "<td><a href='edit.php?id=". $row->port_id . "'> portfolio bewerken </a></td>";
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
