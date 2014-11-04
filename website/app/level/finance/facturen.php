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
    <h2 class="ha2">Invoices</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Customer number</th>
            <th>Invoice number</th>
            <th>Amount</th>
            <th>Project number</th>
            <th>BTW(incl)</th>
            <th>Start Date</th>
            <th>Last Date</th>
            <th>Quantity</th>
            <th>Description</th>
            <th>Number</th>
            <th>Status</th>
            <th>Manipulate</th>
            <th>Remove</th>
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

        
          if($row->factuur_tot > time())
                {
                echo "<td class='rood'>" . $row->klant_nr . "</td>";
                echo "<td class='rood'>" . $row->factuur_nr . "</td>";
                echo "<td class='rood'>" . $row->bedrag . "</td>";
                echo "<td class='rood'>" . $row->project_nr . "</td>";
                $BTW = 0;
                $sqlfact = $con->query("SELECT * FROM factuur WHERE klant_nr = '".$row->klant_nr."'");
                while($factrow = mysqli_fetch_object($sqlfact))

                {
                   $BTW = $BTW + $factrow->bedrag /100 * 121;    
                }
                echo "<td class='rood'>" . $BTW . "</td>";
                echo "<td class='rood'>" . $row->factuur_begin . "</td>";
                echo "<td class='rood'>" . $row->factuur_tot . "</td>";
                echo "<td class='rood'>" . $row->hoeveelheid . "</td>";
                echo "<td class='rood'>" . $row->beschrijving . "</td>";
                echo "<td class='rood'>" . $row->aantal . "</td>";
                echo "<td class='rood'>" . $row->status . "</td>";
                echo "<td class='rood'><a href='edit.php?id=". $row->klant_nr . "'>  </a></td>";
                echo "<td class='rood'><a href='delete.php?id=" . $row->klant_nr . "'>  </a></td>";
                }
                else
                {
              
                


                echo "<td>" . $row->klant_nr . "</td>";
                echo "<td>" . $row->factuur_nr . "</td>";
                echo "<td>" . $row->bedrag . "</td>";
                echo "<td>" . $row->project_nr . "</td>";
                $BTW = 0;
                $sqlfact = $con->query("SELECT * FROM factuur WHERE klant_nr = '".$row->klant_nr."'");
                while($factrow = mysqli_fetch_object($sqlfact))

                {
                   $BTW = $BTW + $factrow->bedrag /100 * 121;   
                }
                echo "<td>" . $BTW . "</td>";
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
