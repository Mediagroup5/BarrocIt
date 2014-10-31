<?php  
$page = "finance";
$id = "facturen";
include '../../../config/config.php';
include $rootlink. '/config/function.security.php';
require $rootlink. '/app/templates/header.php';
?>

<style>
    .rood {
        background-color: indianred !important;
        color: lightgray !important;
}

</style>

<div class="container">
    <h2 class="ha2">Factuur</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Klant nummer</th>
            <th>Factuur nummer</th>
            <th>Bedrag</th>
            <th>Project nummer</th>
            <th>BTW</th>
            <th>Begin Datum</th>
            <th>Verval Datum</th>
            <th>Offer status</th>
            <th>Hoeveelheid</th>
            <th>Beschrijving</th>
            <th>Aantal</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if(isset($_GET['id']))
        {
        $sql = "SELECT * FROM factuur WHERE klant_nr = '".Security($_GET['id'])."'";
        }
        else
        {
         $sql = "SELECT * FROM factuur";
      

        }
        if (! $query = mysqli_query($con, $sql)){
            echo "Kan gegevens niet uit database halen";
        }
      
        if (mysqli_num_rows($query) > 0 ){
            while ($row = mysqli_fetch_object($query)){
                echo "<tr>";

        
          if($row->factuur_tot < time())
                {
                echo "<td class='rood'>" . $row->klant_nr . "</td>";
                echo "<td class='rood'>" . $row->factuur_nr . "</td>";
                echo "<td class='rood'>" . $row->bedrag . "</td>";
                echo "<td class='rood'>" . $row->project_nr . "</td>";
                echo "<td class='rood'>" . $row->btw . "</td>";
                echo "<td class='rood'>" . $row->factuur_begin . "</td>";
                echo "<td class='rood'>" . $row->factuur_tot . "</td>";
                echo "<td class='rood'>" . $row->hoeveelheid . "</td>";
                echo "<td class='rood'>" . $row->beschrijving . "</td>";
                echo "<td class='rood'>" . $row->aantal . "</td>";
                echo "<td class='rood'>" . $row->status . "</td>";
                // echo "<td class='rood'><a href='edit.php?id=". $row->klant_nr . "'> Bewerk </a></td>";
                // echo "<td class='rood'><a href='delete.php?id=" . $row->klant_nr . "'> X </a></td>";
                }
                else
                {
              
                


                echo "<td>" . $row->klant_nr . "</td>";
                echo "<td>" . $row->factuur_nr . "</td>";
                echo "<td>" . $row->bedrag . "</td>";
                echo "<td>" . $row->project_nr . "</td>";
                echo "<td>" . $row->btw . "</td>";
                echo "<td>" . $row->factuur_begin . "</td>";
                echo "<td>" . $row->factuur_tot . "</td>";
                echo "<td>" . $row->hoeveelheid . "</td>";
                echo "<td>" . $row->beschrijving . "</td>";
                echo "<td>" . $row->aantal . "</td>";
                echo "<td>" . $row->status . "</td>";
                echo "<td><a href='edit.php?id=". $row->klant_nr . "'> Bewerk </a></td>";
                echo "<td><a href='delete.php?id=" . $row->klant_nr . "'> X </a></td>";

                }


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
